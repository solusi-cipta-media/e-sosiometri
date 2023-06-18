<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sosiometri extends CI_Controller
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
    }

    public function index()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Dashboard';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('dashboard', $data);
    }

    public function konselor()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Data Konselor';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $this->load->view('konselor', $data);
    }

    public function smail()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();
        $a = $this->crud->get_all('set_email')->row_array();

        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $data['title'] = $d['nama_usaha'] . ' | Setting Email';
        $data['favicon'] = $d['favicon'];

        $data['host'] = $a['host'];
        $data['username'] = $a['username'];
        $data['password'] = $a['password'];
        $data['secure'] = $a['secure'];
        $data['port'] = $a['port'];
        $data['emailfrom'] = $a['emailfrom'];
        $data['nama_pengirim'] = $a['nama_pengirim'];

        $this->load->view('smail', $data);
    }

    public function aktivitas()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $data['title'] = $d['nama_usaha'] . ' | Aktivitas Sosiometri';
        $data['favicon'] = $d['favicon'];

        $this->load->view('aktivitas_sosiometri', $data);
    }

    public function batch_detil($batch)
    {
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $data['title'] = $d['nama_usaha'] . ' | Aktivitas Sosiometri';
        $data['favicon'] = $d['favicon'];
        $data['batch'] = $batch;

        $this->load->view('batch_detil', $data);
    }

    public function ajax_table_aktivitas()
    {
        $table = 'tbl_sosiometri'; //nama tabel dari database
        $column_order = array('id', 'id_konselor', 'nama_konselor', 'sekolah', 'tema', 'kelas', 'jumlah_siswa', 'link', 'batch', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'id_konselor', 'nama_konselor', 'sekolah', 'tema', 'kelas', 'jumlah_siswa', 'link', 'batch', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, id_konselor, nama_konselor, sekolah, tema, kelas, jumlah_siswa, link, batch, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['id_konselor'] = $key->id_konselor;
            $row['data']['nama_konselor'] = $key->nama_konselor;
            $row['data']['sekolah'] = $key->sekolah;
            $row['data']['tema'] = $key->tema;
            $row['data']['kelas'] = $key->kelas;
            $row['data']['jumlah_siswa'] = $key->jumlah_siswa;
            $row['data']['link'] = $key->link;
            $row['data']['batch'] = $key->batch;
            $row['data']['date_created'] = date('d-M-Y', strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_konselor()
    {
        $where = array(
            'role_id' => 1
        );
        $table = 'user'; //nama tabel dari database
        $column_order = array('id', 'name', 'nik', 'pekerjaan', 'phone', 'photo', 'sekolah', 'alamat', 'kota', 'provinsi', 'telp_sekolah', 'email', 'logo_sekolah', 'is_active', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'name', 'nik', 'pekerjaan', 'phone', 'photo', 'sekolah', 'alamat', 'kota', 'provinsi', 'telp_sekolah', 'email', 'logo_sekolah', 'is_active', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, name, nik, pekerjaan, phone, photo, sekolah, alamat, kota, provinsi, telp_sekolah, email, logo_sekolah, is_active, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['name'] = $key->name;
            $row['data']['nik'] = $key->nik;
            $row['data']['pekerjaan'] = $key->pekerjaan;
            $row['data']['phone'] = $key->phone;
            $row['data']['photo'] = $key->photo;
            $row['data']['sekolah'] = $key->sekolah;
            $row['data']['alamat'] = $key->alamat;
            $row['data']['kota'] = $key->kota;
            $row['data']['provinsi'] = $key->provinsi;
            $row['data']['telp_sekolah'] = $key->telp_sekolah;
            $row['data']['email'] = $key->email;
            $row['data']['logo_sekolah'] = $key->logo_sekolah;
            $row['data']['is_active'] = $key->is_active;
            $row['data']['date_created'] = date('d-M-Y', strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_table_batch()
    {
        $where = array(
            'batch' => $this->input->post('batch')
        );
        $table = 'tbl_siswa_kuesioner'; //nama tabel dari database
        $column_order = array('id', 'no_absen', 'nama', 'kelas', 'jenis_kelamin', 'status_kuesioner', 'batch', 'date_created'); //field yang ada di table user
        $column_search = array('id', 'no_absen', 'nama', 'kelas', 'jenis_kelamin', 'status_kuesioner', 'batch', 'date_created'); //field yang diizin untuk pencarian 
        $select = 'id, no_absen, nama, kelas, jenis_kelamin, status_kuesioner, batch, date_created';
        $order = array('id' => 'asc'); // default order 
        $list = $this->crud->get_datatables($table, $select, $column_order, $column_search, $order, $where);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row['data']['no'] = $no;
            $row['data']['id'] = $key->id;
            $row['data']['no_absen'] = $key->no_absen;
            $row['data']['nama'] = $key->nama;
            $row['data']['kelas'] = $key->kelas;
            $row['data']['jenis_kelamin'] = $key->jenis_kelamin;
            $row['data']['status_kuesioner'] = date('d-M-Y h:i:s', strtotime($key->status_kuesioner));
            $row['data']['batch'] = $key->batch;
            $row['data']['date_created'] = date('d-M-Y', strtotime($key->date_created));

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->crud->count_all($table),
            "recordsFiltered" => $this->crud->count_filtered($table, $select, $column_order, $column_search, $order, $where),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        //output to json format
        echo json_encode($output);
    }

    public function insert_data_aktivitas()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $data['batch'] = uniqid();
        $data['id_konselor'] = $this->session->userdata('id');
        $data['nama_konselor'] = $this->session->userdata('name');
        $data['sekolah'] = $this->session->userdata('sekolah');

        $data['link'] = base_url('kuesioner/link/') . $data['batch'];

        $insert_data = $this->crud->insert($table, $data);


        if ($insert_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_data_peserta()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        //cek dulu apakah data sudah ada di server
        $b = $this->crud->get_where('tbl_siswa_kuesioner', ['no_absen' => $data['no_absen']])->row_array();
        if ($b != null) {
            $response = ['status' => 'error', 'message' => 'Data sudah ada!'];
            echo json_encode($response);
            die;
        }

        //ambil data
        $a = $this->crud->get_where_select('tbl_sosiometri', 'sekolah,kelas', ['batch' => $data['batch']])->row_array();
        $data['sekolah'] = $a['sekolah'];
        $data['kelas'] = $a['kelas'];

        $insert_data = $this->crud->insert($table, $data);


        if ($insert_data > 0) {
            //update tbl_sosiometri
            $r = $this->crud->count_where('tbl_siswa_kuesioner', ['batch' => $data['batch']]);
            $this->crud->update('tbl_sosiometri', ['jumlah_siswa' => $r], ['batch' => $data['batch']]);

            $response = ['status' => 'success', 'message' => 'Berhasil Tambah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah Data!'];

        echo json_encode($response);
    }

    public function insert_konselor()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);
        $data['password'] = password_hash('12345', PASSWORD_DEFAULT);
        $data['is_active'] = '1';
        $data['role_id'] = '1';

        //cek dulu apakah data sudah ada di server
        $b = $this->crud->get_where('user', ['userid' => $data['userid']])->row_array();
        if ($b != null) {
            $response = ['status' => 'error', 'message' => 'UserID sudah digunakan!'];
            echo json_encode($response);
            die;
        }

        $insert_data = $this->crud->insert($table, $data);


        if ($insert_data > 0) {

            $response = ['status' => 'success', 'message' => 'Berhasil Tambah User!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Tambah User!'];

        echo json_encode($response);
    }

    public function aktifkan()
    {
        $table = $this->input->post('table');
        if ($this->crud->update($table, ['is_active' => '1'], ['id' => $this->input->post('id')])) {
            $response = ['status' => 'success', 'message' => 'Success Update Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Update Data!'];

        echo json_encode($response);
    }

    public function nonaktifkan()
    {
        $table = $this->input->post('table');
        if ($this->crud->update($table, ['is_active' => '2'], ['id' => $this->input->post('id')])) {
            $response = ['status' => 'success', 'message' => 'Success Update Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Update Data!'];

        echo json_encode($response);
    }

    public function reset()
    {
        $table = $this->input->post('table');
        $data = array(
            'password' => password_hash('12345', PASSWORD_DEFAULT)
        );

        if ($this->crud->update($table, $data, ['id' => $this->input->post('id')])) {
            $response = ['status' => 'success', 'message' => 'Success Update Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Update Data!'];

        echo json_encode($response);
    }

    public function delete_data()
    {
        $table = $this->input->post('table');
        if ($this->crud->delete($table, ['id' => $this->input->post('id')])) {
            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_sosiometri()
    {
        $batch = $this->input->post('batch');
        $table = $this->input->post('table');
        if ($this->crud->delete($table, ['id' => $this->input->post('id')])) {
            $this->crud->delete('tbl_siswa_kuesioner', ['batch' => $batch]);
            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function delete_data_peserta_kuesioner()
    {
        $batch = $this->input->post('batch');
        $table = $this->input->post('table');
        if ($this->crud->delete($table, ['id' => $this->input->post('id')])) {
            //update jumlah siswa di tbl_sosiometri
            $a = $this->crud->count_where('tbl_siswa_kuesioner', ['batch' => $batch]);
            $this->crud->update('tbl_sosiometri', ['jumlah_siswa' => $a], ['batch' => $batch]);

            $response = ['status' => 'success', 'message' => 'Success Delete Data!'];
        } else
            $response = ['status' => 'failed', 'message' => 'Error Delete Data!'];

        echo json_encode($response);
    }

    public function download($excel)
    {
        force_download('template_excel/' . $excel, NULL);
    }

    public function import_excel()
    {

        $this->load->library('upload');
        $file_name = uniqid();
        $batch = $this->input->post('batch');
        $k = $this->crud->get_where_select('tbl_sosiometri', 'kelas', ['batch' => $batch])->row_array();

        $ext = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['max_size']             = 2048;
        $config['overwrite']            = true;
        $config['file_name']            = $file_name;

        // echo "<pre>";
        // var_dump($_FILES['file_excel']);
        // echo "</pre>";
        // die;
        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if (!$this->upload->do_upload('file_excel')) {
            $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
            echo json_encode($response);
            die;
        }

        $data_upload = $this->upload->data();
        if ($ext == "xls")
            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        if ($ext == "xlsx")
            $excelreader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $loadexcel = $excelreader->load('upload/'  . $file_name . '.' . $ext); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        //cek apakah data sudah ada di tabel
        $check_db = [];
        $db = $this->crud->get_where_select('tbl_siswa_kuesioner', 'no_absen', ['batch' => $batch])->result_array();
        foreach ($db as $key => $value) {
            $check_db[] = $value['no_absen'];
        }

        $check_double = [];

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();

        $numrow = 1;
        foreach ($sheet as $row) {
            if ($numrow > 1) {
                if (in_array($row['A'], $check_double)) {
                    $response = array('status' => 'error', 'message' => "NO ABSEN " . $row['A'] . " Double !");
                    echo json_encode($response);
                    die;
                }
                $check_double[] = $row['A'];
                //cek dengan server
                if (in_array($row['A'], $check_db)) {
                    $response = array('status' => 'error', 'message' => "NO ABSEN " . $row['A'] . " Sudah ada !");
                    echo json_encode($response);
                    die;
                }

                // if (!in_array($row['B'], array_column($get_nim_id, 'nim'))) {
                array_push($data, array(
                    'no_absen' => $row['A'],
                    'nama' => $row['B'],
                    'kelas' => $k['kelas'],
                    'jenis_kelamin' => $row['C'],
                    'batch' => $batch,
                    'sekolah' => $this->session->userdata('sekolah')
                ));
                // }
            }
            $numrow++; // Tambah 1 setiap kali looping
        }


        if (empty($data)) {
            $response = ['status' => 'error', 'message' => 'Tidak ada data baru!'];
            echo json_encode($response);
            die;
        }

        $insert_data = $this->db->insert_batch('tbl_siswa_kuesioner', $data);
        if ($insert_data > 0) {
            //hitung jumlah yang sukses upload dan update tbl_sosiometri (jumlah_siswa)
            $r = $this->crud->count_where('tbl_siswa_kuesioner', ['batch' => $batch]);
            $this->crud->update('tbl_sosiometri', ['jumlah_siswa' => $r], ['batch' => $batch]);

            $response = ['status' => 'success', 'message' => 'Data Berhasil Diupload!'];
        } else
            $response = ['status' => 'error', 'message' => 'Data Gagal Diupload!'];

        echo json_encode($response);
    }

    public function biodata()
    {


        $d = $this->crud->get_where('user', ['userid' => $this->session->userdata('userid')])->row_array();
        $a = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['sekolah'] . ' | Biodata Konselor';
        $data['userid'] = $d['userid'];
        $data['name'] = $d['name'];
        $data['nik'] = $d['nik'];
        $data['pekerjaan'] = $d['pekerjaan'];
        $data['phone'] = $d['phone'];
        $data['photo'] = $d['photo'];
        $data['sekolah'] = $d['sekolah'];
        $data['alamat'] = $d['alamat'];
        $data['kota'] = $d['kota'];
        $data['provinsi'] = $d['provinsi'];
        $data['telp_sekolah'] = $d['telp_sekolah'];
        $data['email'] = $d['email'];
        $data['logo_sekolah'] = $d['logo_sekolah'];

        $data['gambar_latar'] = $a['gambar_latar'];
        $data['favicon'] = $a['favicon'];
        $data['logo_dark'] = $a['logo_dark'];
        $data['logo_light'] = $a['logo_light'];

        $this->load->view('biodata', $data);
    }

    public function aplikasi()
    {
        if ($this->session->userdata('role_id') != '1') {;
            redirect('dashboard/pekerjaan');
        }

        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Setting Aplikasi';
        $data['nama_usaha'] = $d['nama_usaha'];
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['slogan'] = $d['slogan'];
        $data['gambar_depan'] = $d['gambar_depan'];
        $data['gambar_latar'] = $d['gambar_latar'];
        $data['alamat'] = $d['alamat'];
        $data['handphone'] = $d['handphone'];

        $this->load->view('aplikasi', $data);
    }


    public function update_setting_gambar_sekolah()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/sekolah/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die;

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();

            $data['logo_sekolah'] = $data_upload['file_name'];
        }

        $update = $this->crud->update($table, $data, ['id' => $this->session->userdata('id')]);

        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!', 'gambar' => $data_upload['file_name']];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function update_setting_gambar_profil()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/konselor/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die;

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();

            $data['photo'] = $data_upload['file_name'];
        }

        $update = $this->crud->update($table, $data, ['id' => $this->session->userdata('id')]);

        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!', 'gambar' => $data_upload['file_name']];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function update_setting_gambar_profil_konselor()
    {
        $table = $this->input->post("table");

        $config['upload_path']          = "assets/default/assets/images/konselor/";
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size']             = 1024;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $data = $this->input->post();
        unset($data['table']);

        $where = array(
            'id' => $data['id']
        );
        unset($data['id']);

        if (count($_FILES) > 0) {
            if (!$this->upload->do_upload('file')) {
                $response = array('status' => 'failed', 'message' => $this->upload->display_errors());
                echo json_encode($response);
                die;
            }
            $data_upload = $this->upload->data();

            $data['photo'] = $data_upload['file_name'];
        }

        $update = $this->crud->update($table, $data, $where);

        if ($update > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Edit Data!', 'gambar' => $data_upload['file_name']];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Edit Data!'];

        echo json_encode($response);
    }

    public function insert_setting_detil()
    {

        $table = $this->input->post("table");
        $data = $this->input->post();

        unset($data['table']);


        $update_data = $this->crud->update($table, $data, ['id' => $this->session->userdata('id')]);


        if ($update_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Ubah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Ubah Data!'];

        echo json_encode($response);
    }

    public function insert_setting_detil_password()
    {

        $table = $this->input->post("table");
        $data = $this->input->post();
        $password = $data['password'];

        unset($data['table']);
        unset($data['password']);

        $data['password'] = password_hash($password, PASSWORD_DEFAULT);


        $update_data = $this->crud->update($table, $data, ['id' => $this->session->userdata('id')]);


        if ($update_data > 0) {
            $response = ['status' => 'success', 'message' => 'Berhasil Ubah Data!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Ubah Data!'];

        echo json_encode($response);
    }

    public function info_konselor()
    {

        $id = $this->input->post("id");

        $where = array(
            'id' => $id
        );

        $response = $this->crud->get_where('user', $where)->row_array();

        // echo $this->db->last_query();
        // die;

        echo json_encode($response);
    }

    public function getuserid()
    {

        $userid = $this->input->post("userid");

        $where = array(
            'userid' => $userid
        );

        $update_data = $this->crud->get_where('user', $where)->row_array();

        if ($update_data > 0) {
            $response = ['status' => 'error'];
        } else
            $response = ['status' => 'success'];

        echo json_encode($response);
    }

    public function getuseriddata()
    {

        $id = $this->input->post("id");

        $where = array(
            'id' => $id
        );

        $response = $this->crud->get_where('user', $where)->row_array();

        echo json_encode($response);
    }

    public function update_konselor()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        $where = array(
            'id' => $data['id']
        );
        unset($data['id']);


        $update_data = $this->crud->update($table, $data, $where);


        if ($update_data > 0) {

            $response = ['status' => 'success', 'message' => 'Berhasil Update Informasi User!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Update Informasi User!'];

        echo json_encode($response);
    }

    public function update_set_email()
    {

        $table = $this->input->post("table");

        $data = $this->input->post();
        unset($data['table']);

        // $password = password_hash($data['password'], PASSWORD_DEFAULT);
        // unset($data['password']);

        // $data['password'] = $password;

        $where = array(
            'id' => '1'
        );


        $update_data = $this->crud->update($table, $data, $where);


        if ($update_data > 0) {

            $response = ['status' => 'success', 'message' => 'Berhasil Update Email!'];
        } else
            $response = ['status' => 'error', 'message' => 'Gagal Update Email!'];

        echo json_encode($response);
    }
}
