<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Crud", "crud");
    }

    // public function index()
    // {
    //     $d = $this->crud->get_all('setting_apps')->row_array();

    //     $data['title'] = $d['nama_usaha'] . ' | Kuesioner';
    //     $data['favicon'] = $d['favicon'];

    //     $this->load->view('kuesioner_mobile', $data);
    // }

    public function link($batch = "")
    {
        if ($batch == "") {
            redirect(base_url('Error404'));
            return;
        }
        $d = $this->crud->get_all('setting_apps')->row_array();
        $where = array(
            'batch' => $batch
        );
        $data['siswa'] = $this->crud->get_where('tbl_siswa_kuesioner', $where)->result_array();
        $data['d'] = $this->crud->get_where('tbl_sosiometri', $where)->row_array();
        $data['logo'] = $this->crud->get_where('user', ['id' => $data['d']['id_konselor']])->row_array()['logo_sekolah'] ?? '';

        if (count($data['siswa']) == 0) {
            redirect(base_url('Error404'));
            return;
        }

        $data['title'] = $d['nama_usaha'] . ' | Kuesioner';
        $data['favicon'] = $d['favicon'];

        $this->load->view('kuesioner_mobile', $data);
    }

    public function getsiswa()
    {
        $id = $this->input->post('id'); //2-Arthur Julio Risa
        $a = explode("-", $id);

        $where = array(
            'no_absen' => $a[0]
        );
        $result = $this->crud->get_where('tbl_siswa_kuesioner', $where)->row_array();

        echo json_encode($result);
    }

    public function inserttabel()
    {
        //collect data
        $batch =  $this->input->post('batch');
        $aa =  $this->input->post('nama');
        $no_absen =  $this->input->post('no_absen');
        $kelas =  $this->input->post('kelas');
        $sekolah =  $this->input->post('sekolah');
        $aa1 =  $this->input->post('nama1');
        $alasan1 =  $this->input->post('alasan1');
        $aa2 =  $this->input->post('nama2');
        $alasan2 =  $this->input->post('alasan2');
        $aa3 =  $this->input->post('nama3');
        $alasan3 =  $this->input->post('alasan3');
        //explode kode prodi dan perguruan tinggi
        $y = explode('-', $aa);
        $nama = trim($y[1]);
        $id_konseli = trim($y[2]);
        $y1 = explode('-', $aa1);
        $nama1 = trim($y1[2]);
        $y2 = explode('-', $aa2);
        $nama2 = trim($y2[2]);
        $y3 = explode('-', $aa3);
        $nama3 = trim($y3[2]);
        // $id_nama_siswa_1 = $aa1;
        // $id_nama_siswa_2 = $aa2;
        // $id_nama_siswa_3 = $aa3;

        //siapkan datanya
        $where = array(
            'batch' => $batch
        );
        $getkons = $this->Crud->get_where('tbl_sosiometri', $where)->row_array();
        $data = array(
            'id_konselor' => $getkons["id_konselor"],
            'konselor' => $getkons["nama_konselor"],
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'id_konseli' => $id_konseli,
            'konseli' => $nama,
            'no_absen' => $no_absen,
            'pilihan1' => $nama1,
            'alasan1' => $alasan1,
            'pilihan2' => $nama2,
            'alasan2' => $alasan2,
            'pilihan3' => $nama3,
            'alasan3' => $alasan3,
            'batch' => $batch,
        );

        $this->Crud->update('tbl_siswa_kuesioner', ['status_kuesioner' => date('Y-m-d H:i:s')], ['no_absen' => $no_absen]);
        $this->Crud->insert('tbl_hasil_kuesioner', $data);

        if ($this->db->affected_rows() == true) {
            $result = 200;
        } else {
            $result = 500;
        }

        echo json_encode($result);
    }

    public function cekkuesioner()
    {
        $no_absen = $this->input->post('no_absen'); //2-Arthur Julio Risa
        $batch = $this->input->post('batch'); //2-Arthur Julio Risa
        $table = $this->input->post('table'); //2-Arthur Julio Risa

        $where = array(
            'no_absen' => $no_absen,
            'batch' => $batch,
        );
        $result = $this->crud->get_where($table, $where)->row_array();

        if ($result > 0) {
            $response = ['status' => 'error', 'message' => 'Anda sudah melakukan kuesioner!'];
        } else
            $response = ['status' => 'success', 'message' => 'Lanjutkan!'];

        echo json_encode($response);
    }

    public function getpilihan()
    {
        $nama1 = $this->input->post('nama1');
        $table = $this->input->post('table');
        $batch = $this->input->post('batch');

        // $a = explode('-', $nama1);

        $where = array(
            'batch' => $batch
        );

        $select = 'id,no_absen, nama';

        $notin = array(
            $nama1
        );

        $result = $this->Crud->get_where_select_not_in($table, $select, $where, $notin)->result_array();



        echo json_encode($result);
    }


    public function getpilihan1()
    {
        $nama1 = $this->input->post('nama1');
        $table = $this->input->post('table');
        $batch = $this->input->post('batch');
        $konseli = $this->input->post('konseli');

        $a = explode('-', $nama1);

        $where = array(
            'batch' => $batch
        );

        $select = 'id,no_absen, nama';

        $notin = array(
            $a[0],
            $konseli
        );

        $result = $this->Crud->get_where_select_not_in($table, $select, $where, $notin)->result_array();

        echo json_encode($result);
    }

    public function getpilihan2()
    {
        $nama2 = $this->input->post('nama2');
        $table = $this->input->post('table');
        $batch = $this->input->post('batch');
        $konseli = $this->input->post('konseli');
        $pilihan1 = $this->input->post('pilihan1');

        // echo $pilihan1;
        // die;

        $a = explode('-', $nama2);
        $b = explode('-', $pilihan1);

        $where = array(
            'batch' => $batch
        );

        $select = 'id,no_absen, nama';

        $notin = array(
            $a[0],
            $konseli,
            $b[0]
        );

        $result = $this->Crud->get_where_select_not_in($table, $select, $where, $notin)->result_array();

        echo json_encode($result);
    }
}
