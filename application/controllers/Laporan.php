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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Please Login!</div>');
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
    public function sum_pilihan($pilihan, $batch, $id = null)
    {
        if (!$id) return 0;
        $data = $this->crud->get_where('tbl_hasil_kuesioner', [$pilihan => $id, 'batch' => $batch])->result_array();
        return count($data);
    }

    public function table_sum($batch, $id = null, $id_get_peringkat = null)
    {
        $result = [];
        $where = [];
        $where['a.batch'] = $batch;
        if ($id) $where['a.id_konseli'] = $id;
        $this->db->select('a.no_absen,a.konseli nama_siswa,a_1.jenis_kelamin,a.id_konseli,b.id id_1,c.id id_2,d.id id_3,b.nama pilihan_1,c.nama pilihan_2,d.nama pilihan_3');
        $this->db->from('tbl_hasil_kuesioner a');
        $this->db->join('tbl_siswa_kuesioner a_1', 'a_1.id=a.id_konseli', 'LEFT');
        $this->db->join('tbl_siswa_kuesioner b', 'b.id=a.pilihan1', 'LEFT');
        $this->db->join('tbl_siswa_kuesioner c', 'c.id=a.pilihan2', 'LEFT');
        $this->db->join('tbl_siswa_kuesioner d', 'd.id=a.pilihan3', 'LEFT');
        $this->db->where($where);
        $data = $this->db->get()->result_array();

        $data1 = 0;
        $data2 = 0;
        $data3 = 0;
        $total = 0;
        foreach ($data as $dt) {
            $data1 = count($this->crud->get_where('tbl_hasil_kuesioner', ['pilihan1' => $dt['id_konseli'], 'batch' => $batch])->result_array());
            $data2 = count($this->crud->get_where('tbl_hasil_kuesioner', ['pilihan2' => $dt['id_konseli'], 'batch' => $batch])->result_array());
            $data3 = count($this->crud->get_where('tbl_hasil_kuesioner', ['pilihan3' => $dt['id_konseli'], 'batch' => $batch])->result_array());
            $total = round(($data1 * 3) + ($data2 * 2) + ($data3 * 1));
            $result[] = [
                'id_konseli' => $dt['id_konseli'],
                'no_absen' => $dt['no_absen'],
                'nama_siswa' => $dt['nama_siswa'],
                'jenis_kelamin' => $dt['jenis_kelamin'],
                'pilihan_1' => $dt['pilihan_1'],
                'pilihan_2' => $dt['pilihan_2'],
                'pilihan_3' => $dt['pilihan_3'],
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
                'skor' => $dt_f['skor'],
                'peringkat' => $no
            ];
            $skor_now = $dt_f['skor'];
            $no++;
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
        $final = $id_get_peringkat ? $final_very_final : $final;

        return $final;
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
        $this->load->view('report/analisiskelompok', $data);
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
}
