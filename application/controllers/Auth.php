<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model("Crud", "crud");
    //     $d = $this->crud->get_all('setting_apps')->row_array();
    //     $data['title'] = $d['nama_usaha'] . '| Dashboard';
    // }

    public function index()
    {

        $this->form_validation->set_rules('userid', 'Userid', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->model("Crud", "crud");
            $d = $this->crud->get_all('setting_apps')->row_array();
            $data['title'] = $d['nama_usaha'] . ' | Login';
            $data['slogan'] = $d['slogan'];
            $data['logo_light'] = $d['logo_light'];
            $data['favicon'] = $d['favicon'];
            $data['nama_usaha'] = $d['nama_usaha'];
            $data['gambar_depan'] = $d['gambar_depan'];

            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $userid = $this->input->post('userid');
        $password = $this->input->post('password');



        //ambil data dari model
        $table = 'user';
        $where = array(
            'userid' => $userid,
        );
        $user = $this->Crud->get_where($table, $where)->row_array();

        if ($user) {
            //cek dulu member aktive atau tidak
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    //jika sukses
                    $data = array(
                        'userid' => $user['userid'],
                        'role_id' => $user['role_id'],
                        'name' => $user['name'],
                        'id' => $user['id'],
                        'sekolah' => $user['sekolah']
                    );
                    //buat session
                    $this->session->set_userdata($data);
                    // redirect('dashboard');
                    if ($user['role_id'] == '1') {
                        redirect('sosiometri/aktivitas');
                    } else {
                        redirect('sosiometri');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Salah Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum diaktifkan</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Userid belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('sekolah');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda sudah keluar.</div>');
        redirect('auth');
    }
}
