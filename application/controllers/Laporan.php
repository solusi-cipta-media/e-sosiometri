<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login!</div>');
            redirect('auth');
        }
        $this->load->model("Crud", "crud");
        $this->load->model("Crud2", "crud2");
    }

    public function index()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Laporan Analisis';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('analisis', $data);
    }

    public function individu($id = null)
    {
        if (!$id) {
            redirect(base_url('Error404'));
            return;
        }
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Laporan Analisa Individu';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['data_siswa'] = $this->crud->get_where('tbl_siswa_kuesioner', ['id' => $id])->row_array();
        $data['data_sosiometri'] = $this->crud->get_where('tbl_sosiometri', ['batch' => $data['data_siswa']['batch'] ?? ''])->row_array();
        $data['data_konselor'] = $this->crud->get_where('user', ['id' => $data['data_sosiometri']['id_konselor'] ?? ''])->row_array();

        $data['peringkat'] = $this->table_sum($data['data_siswa']['batch'], null, $id)[0]['peringkat'] ?? '';
        $data['hasil'] = $this->table_sum($data['data_siswa']['batch'], $id)[0];
        $data['sum_pil_1'] = $this->sum_pilihan('pilihan1', $data['data_siswa']['batch'], $id);
        $data['sum_pil_2'] = $this->sum_pilihan('pilihan2', $data['data_siswa']['batch'], $id);
        $data['sum_pil_3'] = $this->sum_pilihan('pilihan3', $data['data_siswa']['batch'], $id);
        $data['skor'] = $data['hasil']['skor'];
        $this->load->view('report/analisisindividu', $data);
    }

    public function kelompok($batch = null)
    {
        if (!$batch) {
            redirect(base_url('Error404'));
            return;
        }
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Laporan Analisa Kelompok';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $data['data_siswa'] = $this->crud->get_where('tbl_siswa_kuesioner', ['batch' => $batch])->row_array();
        $data['data_sosiometri'] = $this->crud->get_where('tbl_sosiometri', ['batch' => $batch])->row_array();
        $data['data_konselor'] = $this->crud->get_where('user', ['id' => $data['data_sosiometri']['id_konselor'] ?? ''])->row_array();
        $data['sum_table_all'] = $this->table_sum($batch);

        $data['populer'] = $this->getCombine($this->table_sum($batch, null, null, 'up'), 'nama_siswa');
        $data['terisolir'] = $this->getCombine($this->table_sum($batch, null, null, 'terisolir'), 'nama_siswa');
        $data['neglectee'] = $this->getCombine($this->table_sum($batch, null, null, 'down'), 'nama_siswa');

        $data['mutual'] =  $this->getCombine($this->getMethodGroup($batch)['mutual'], null, 2, ['nama_konseli', 'nama_all']);
        $data['triangles'] = $this->getCombine($this->getMethodGroup($batch)['triangles'], null, 3, ['nama_konseli', 'nama_all', 'nama_p3']);
        $data['circle'] = $this->getCombine($this->getMethodGroup($batch)['circle'], null, 4, ['nama_konseli', 'nama_all', 'nama_p3', 'nama_p4']);
        $this->load->view('report/analisiskelompok', $data);
    }
    public function getCombine($array, $val = null, $count = null, $arrayCount = null)
    {
        $result = '';
        foreach ($array as $a) {
            $value = ($count == 2) ?  $a[$arrayCount[0]] . ' - ' . $a[$arrayCount[1]] : (($count == 3) ?  $a[$arrayCount[0]] . ' - ' . $a[$arrayCount[1]] . ' - ' . $a[$arrayCount[2]] : (($count == 4) ?  $a[$arrayCount[0]] . ' - ' . $a[$arrayCount[1]] . ' - ' . $a[$arrayCount[2]] . ' - ' . $a[$arrayCount[3]] : $a[$val]));
            $result .=  $value  . ', ' . (($count) ? '<br>' : '');
        }
        return substr($result, 0, (($count) ? -6 : -2));
    }
    public function sum_pilihan($pilihan, $batch, $id = null)
    {
        if (!$id) return 0;
        $data = $this->crud->get_where('tbl_hasil_kuesioner', [$pilihan => $id, 'batch' => $batch])->result_array();
        return count($data);
    }

    public function table_sum($batch = null, $id = null, $id_get_peringkat = null, $type = null)
    {
        // type  <====> up => 3 data teratas, down => 3 data terbawah, terisolir=> data yg tidak dipilih sama sekali
        $result = [];
        $where = [];
        $where['a.batch'] = $batch;
        if ($id) $where['a.id_konseli'] = $id;

        $data = $this->crud2->select_join_where(
            'a.no_absen,a.nama nama_siswa,a.jenis_kelamin,e.id_konseli,b.id id_1,c.id id_2,d.id id_3,b.nama pilihan_1,c.nama pilihan_2,d.nama pilihan_3',
            'tbl_siswa_kuesioner a',
            [
                ['tbl_hasil_kuesioner e', 'e.id_konseli=a.id', 'LEFT'],
                ['tbl_siswa_kuesioner b', 'b.id=e.pilihan1', 'LEFT'],
                ['tbl_siswa_kuesioner c', 'c.id=e.pilihan2', 'LEFT'],
                ['tbl_siswa_kuesioner d', 'd.id=e.pilihan3', 'LEFT'],
            ],
            [['a.batch' => $batch]],
            'get'
        )->result_array();
        $data1 = 0;
        $data2 = 0;
        $data3 = 0;
        $total = 0;
        foreach ($data as $dt) {
            $data1 = $this->sum_pilihan('pilihan1', $batch, $dt['id_konseli']);
            $data2 = $this->sum_pilihan('pilihan2', $batch, $dt['id_konseli']);
            $data3 = $this->sum_pilihan('pilihan3', $batch, $dt['id_konseli']);
            $total = round(($data1 * 3) + ($data2 * 2) + ($data3 * 1));
            $result[] = [
                'id_konseli' => $dt['id_konseli'],
                'no_absen' => $dt['no_absen'],
                'nama_siswa' => $dt['nama_siswa'],
                'jenis_kelamin' => $dt['jenis_kelamin'],
                'pilihan_1' => $dt['pilihan_1'],
                'pilihan_2' => $dt['pilihan_2'],
                'pilihan_3' => $dt['pilihan_3'],
                'id_1' => $dt['id_1'],
                'id_2' => $dt['id_2'],
                'id_3' => $dt['id_3'],
                'skor' => $total
            ];
            $data1 = 0;
            $data2 = 0;
            $data3 = 0;
            $total = 0;
        }
        usort($result, function ($a, $b) {
            if ($a["skor"] == $b["skor"])
                return (0);
            return (($a["skor"] > $b["skor"]) ? -1 : 1);
        });
        $final = [];
        $no = 1;
        $skor_now = '';
        $data_peringkat_3_atas = [];
        $data_peringkat_3_bawah = [];
        $data_terisolir = [];
        $just_peringkat = [];
        $all_perangkat = [];
        $semua_pilihan = [];
        $data_konseli = [];
        foreach ($result as $dt_f) {
            if ($dt_f['skor'] == $skor_now) $no--;
            $final[] = [
                'id_konseli' => $dt_f['id_konseli'],
                'no_absen' => $dt_f['no_absen'],
                'nama_siswa' => $dt_f['nama_siswa'],
                'jenis_kelamin' => $dt_f['jenis_kelamin'],
                'pilihan_1' => $dt_f['pilihan_1'],
                'pilihan_2' => $dt_f['pilihan_2'],
                'pilihan_3' => $dt_f['pilihan_3'],
                'id_1' => $dt_f['id_1'],
                'id_2' => $dt_f['id_2'],
                'id_3' => $dt_f['id_3'],
                'skor' => $dt_f['skor'],
                'peringkat' => $no
            ];
            if ($type) {
                for ($i = 1; $i <= 3; $i++) {
                    if (!in_array($dt_f['id_' . $i], $semua_pilihan))  $semua_pilihan[] = $dt_f['id_' . $i];
                }
                if (!in_array($no, $just_peringkat)) {
                    $just_peringkat[] = $no;
                    $all_perangkat[] = ['peringkat' => $no];
                }
                if (($no == 1 || $no == 2 || $no == 3) && $type == 'up') $data_peringkat_3_atas[] = ['peringkat' => $no, 'nama_siswa' => $dt_f['nama_siswa']];
            }
            $skor_now = $dt_f['skor'];
            $no++;
        }

        if ($type) {
            usort($all_perangkat, function ($a, $b) {
                if ($a["peringkat"] == $b["peringkat"])
                    return (0);
                return (($a["peringkat"] > $b["peringkat"]) ? -1 : 1);
            });
            $peringkat_3rendah = [];
            $n = 0;
            foreach ($all_perangkat as $ap) {
                if ($n <= 2) $peringkat_3rendah[] = $ap['peringkat'];
                $n++;
            }

            foreach ($final as $f) {
                if ((in_array($f['peringkat'], $peringkat_3rendah)) && $type == 'down') $data_peringkat_3_bawah[] = ['peringkat' => $f['peringkat'], 'nama_siswa' => $f['nama_siswa']];
            }

            $data_konseli = $this->crud2->select_join_where(
                'id,nama',
                'tbl_siswa_kuesioner',
                [],
                [['batch' => $batch]],
                'get'
            )->result_array();
            foreach ($data_konseli as $dk) {
                if ((!in_array($dk['id'], $semua_pilihan)) && $type == 'terisolir') $data_terisolir[] = ['nama_siswa' => $dk['nama']];
            }
        }
        $final_very_final = [];

        if ($id_get_peringkat) {
            foreach ($final as $fn) {
                if ($fn['id_konseli'] == $id_get_peringkat)
                    $final_very_final[] = [
                        'id_konseli' => $fn['id_konseli'],
                        'no_absen' => $fn['no_absen'],
                        'nama_siswa' => $fn['nama_siswa'],
                        'jenis_kelamin' => $fn['jenis_kelamin'],
                        'pilihan_1' => $fn['pilihan_1'],
                        'pilihan_2' => $fn['pilihan_2'],
                        'pilihan_3' => $fn['pilihan_3'],
                        'skor' => $fn['skor'],
                        'peringkat' => $fn['peringkat'],
                    ];
            }
        }
        usort($final, function ($a, $b) {
            if ((int) $a["no_absen"] == (int)$b["no_absen"])
                return (0);
            return (((int) $a["no_absen"] < (int)$b["no_absen"]) ? -1 : 1);
        });
        $final = $id_get_peringkat ? $final_very_final : (count($data_peringkat_3_atas) > 0 ? $data_peringkat_3_atas : (count($data_peringkat_3_bawah) > 0 ? $data_peringkat_3_bawah : (count($data_terisolir) > 0 ? $data_terisolir : $final)));
        return $final;
    }

    public function ajax_analisis()
    {
        $list = [];
        $where  = [];
        $where_NotNull = [];
        $where_orTable = [];
        $where_orA = [];
        $where_orB = [];
        $where_orColumn = [];
        $where_orC = [];
        $like1 = [];
        $like2 = [];
        $joinA = [];
        $joinA1 =  [];
        $joinB = [];
        $joinB1 =  [];
        $group_by  = [];
        $join = [];
        $select = '';
        $column_order = [];
        $column_search = [];
        $order = [];
        $table =  'tbl_siswa_kuesioner a';
        $column_order = ['a.id', 'a.no_absen', 'a.nama', 'a.kelas', 'a.sekolah', 'a.status_kuesioner', 'b.tema', 'a.batch', 'a.date_created'];
        $column_search = $column_order;
        $data_select = ['id', 'no_absen', 'nama', 'kelas', 'sekolah', 'status_kuesioner', 'tema', 'batch', 'date_created'];
        $select = "a.*,b.tema";
        $joinA = 'tbl_sosiometri b';
        $joinA1 =  'b.batch=a.batch';
        $order = array('a.id' => 'asc');
        $list = $this->crud2->get_datatables($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            foreach ($data_select as $data_key => $data_value) {
                $row['data'][$data_value] = $key->$data_value;
            }
            $row['data']['status_kuesioner'] = $key->status_kuesioner != '0000-00-00 00:00:00' ? date('d F Y H:i:s', strtotime($key->status_kuesioner)) : '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud2->count_all($table, $where),
            "recordsFiltered" => $this->crud2->count_filtered($table, $select, $join, $joinA, $joinA1, $joinB, $joinB1, $column_order, $column_search, $order, $where, $where_orTable, $where_orColumn, $where_orA, $where_orB, $where_orC, $like1, $like2, $where_NotNull, $group_by),
            "data" => $data,
            "query" => $this->db->last_query()
        );

        //output to json format
        echo json_encode($output);
    }

    public function getPilihan($id)
    {
        $result = [];
        $data = $this->crud->get_where('tbl_hasil_kuesioner', ['id_konseli' => $id])->row_array();
        $result[] = $data['pilihan1'] ?? "";
        $result[] = $data['pilihan2'] ?? "";
        $result[] = $data['pilihan3'] ?? "";
        return  $result;
    }

    public function getMethodGroup($batch = null)
    {
        $result = [];
        $data_konseli = $this->crud2->select_join_where(
            'a.id,a.nama,b.id_konseli,b.pilihan1,b.pilihan2,b.pilihan3',
            'tbl_siswa_kuesioner a',
            [['tbl_hasil_kuesioner b', 'b.id_konseli=a.id', 'LEFT']],
            [['a.batch' => $batch]],
            'get'
        )->result_array();
        $data_new = [];
        $data_new2 = [];
        $data_new3 = [];
        $data_all = [];
        $data_all2 = [];
        $data_all3 = [];
        $id_no = [];
        $id_no2 = [];
        $id_no3 = [];
        foreach ($data_konseli as $dk) {
            $id_no[] = $dk['id'];
            $data_all = $this->queryHasil($batch, $id_no);
            foreach ($data_all as $da) {
                if (in_array($da['id_konseli'], $this->getPilihan($dk['id'])) && in_array($dk['id'], $this->getPilihan($da['id_konseli']))) {

                    $data_new[] = [
                        'id_konseli' => $dk['id'],
                        'nama_konseli' => $dk['nama'],
                        'id_all' => $da['id_konseli'],
                        'nama_all' => $da['nama_siswa']
                    ];

                    $id_no2[] = $dk['id'];
                    $id_no2[] = $da['id_konseli'];
                    $data_all2 = $this->queryHasil($batch, $id_no2);
                    foreach ($data_all2 as $da2) {
                        if (
                            in_array($da2['id_konseli'], $this->getPilihan($dk['id'])) &&
                            in_array($da2['id_konseli'], $this->getPilihan($da['id_konseli'])) &&
                            in_array($dk['id'], $this->getPilihan($da2['id_konseli'])) &&
                            in_array($da['id_konseli'], $this->getPilihan($da2['id_konseli']))
                        ) {

                            $data_new2[] = [
                                'id_konseli' => $dk['id'],
                                'nama_konseli' => $dk['nama'],
                                'id_all' => $da['id_konseli'],
                                'nama_all' => $da['nama_siswa'],
                                'id_p3' => $da2['id_konseli'],
                                'nama_p3' => $da2['nama_siswa']
                            ];

                            $id_no3[] = $dk['id'];
                            $id_no3[] = $da['id_konseli'];
                            $id_no3[] = $da2['id_konseli'];
                            $data_all3 = $this->queryHasil($batch, $id_no3);
                            foreach ($data_all3 as $da3) {
                                if (
                                    in_array($da3['id_konseli'], $this->getPilihan($dk['id'])) &&
                                    in_array($da3['id_konseli'], $this->getPilihan($da['id_konseli'])) &&
                                    in_array($da3['id_konseli'], $this->getPilihan($da2['id_konseli'])) &&
                                    in_array($dk['id'], $this->getPilihan($da3['id_konseli'])) &&
                                    in_array($da['id_konseli'], $this->getPilihan($da3['id_konseli'])) &&
                                    in_array($da2['id_konseli'], $this->getPilihan($da3['id_konseli']))
                                ) {

                                    $data_new3[] = [
                                        'id_konseli' => $dk['id'],
                                        'nama_konseli' => $dk['nama'],
                                        'id_all' => $da['id_konseli'],
                                        'nama_all' => $da['nama_siswa'],
                                        'id_p3' => $da2['id_konseli'],
                                        'nama_p3' => $da2['nama_siswa'],
                                        'id_p4' => $da3['id_konseli'],
                                        'nama_p4' => $da3['nama_siswa']
                                    ];
                                }
                            }
                        }
                    }
                }
            }
        }

        $result = [
            'mutual' => $data_new,
            'triangles' => $data_new2,
            'circle' => $data_new3,
        ];

        return $result;
    }

    public function queryHasil($batch, $id = null)
    {
        $data = [];
        $where = [];
        $where['a.batch'] = $batch;
        $this->crud2->select_join_where(
            'a.no_absen,a.konseli nama_siswa,a_1.jenis_kelamin,a.id_konseli,b.id id_1,c.id id_2,d.id id_3,b.nama pilihan_1,c.nama pilihan_2,d.nama pilihan_3',
            'tbl_hasil_kuesioner a',
            [
                ['tbl_siswa_kuesioner a_1', 'a_1.id=a.id_konseli', 'LEFT'],
                ['tbl_siswa_kuesioner b', 'b.id=a.pilihan1', 'LEFT'],
                ['tbl_siswa_kuesioner c', 'c.id=a.pilihan2', 'LEFT'],
                ['tbl_siswa_kuesioner d', 'd.id=a.pilihan3', 'LEFT'],
            ],
            [$where]
        );

        if ($id) $this->db->where_not_in('a.id_konseli', $id);
        $data =  $this->db->get()->result_array();
        return $data;
    }
}
