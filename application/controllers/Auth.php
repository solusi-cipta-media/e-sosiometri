<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('./resources/phpmail/PHPMailer.php');
require('./resources/phpmail/Exception.php');
require('./resources/phpmail/OAuth.php');
require('./resources/phpmail/POP3.php');
require('./resources/phpmail/SMTP.php');

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
                        redirect('sosiometri/konselor');
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

    public function authreset()
    {
        $this->load->model("Crud", "crud");
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['title'] = $d['nama_usaha'] . ' | Reset Password';
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $this->load->view('auth/auth-reset', $data);
    }

    function cekmail()
    {
        $where = array(
            'email' => $this->input->post('email'),
        );

        $table = 'user';
        $this->Crud->get_where($table, $where);

        if ($this->db->affected_rows() == true) {
            //kirim email
            //buat link dan simpan
            $a = uniqid();
            $b = password_hash($a, PASSWORD_DEFAULT);
            $c = $this->input->post('email');

            $data = array(
                'email' => $c,
                'uniq' => $b,
                'aktivitas' => 'reset password'
            );
            $this->Crud->insert('reg_email', $data);
            //ambil data dari tbl_setting
            $set = $this->Crud->get_all('set_email')->result_array();
            foreach ($set as $row) {
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $secure = $row['secure'];
                $port = $row['port'];
                $emailfrom = $row['emailfrom'];
                $nama_pengirim = $row['nama_pengirim'];
            }

            //KIRIM EMAIL
            $mail = new PHPMailer;

            //Enable SMTP debugging. 
            // $mail->SMTPDebug = 3;

            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name                          
            $mail->Host = $host; //host mail server
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = $username;   //nama-email smtp          
            $mail->Password = $password;           //password email smtp
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = $secure;
            //Set TCP port to connect to 
            $mail->Port = $port;

            $mail->From = $emailfrom; //email pengirim
            $mail->FromName = $nama_pengirim; //nama pengirim



            $mail->isHTML(true);

            $mail->addAddress($this->input->post('email'), $this->input->post('email')); //email penerima
            $mail->Subject = 'Reset Password Akun sosiometri.id'; //subject
            $mail->Body    = '<p>Anda telah meminta untuk melakukan reset password terhadap akun Anda yang menggunakan email ini sebagai tautan akun.</p>

			<p>Jika memang benar aktivitas reset password ini atas permintaan Anda, silahkan klik link dibawah ini</p> 
			
			<p><a href="' . base_url('auth/changepass') . '?email=' . $c . '&ref=' . $b . '">' . base_url('auth/changepass') . '?email=' . $c . '&ref='  . $b . '</a></p> 
			
			<p>Namun apabila aktivitas reset ini bukan atas permintaan Anda, silahkan abaikan email ini.</p>
			
			
			<p>Terima Kasih</p>'; //isi email
            $mail->AltBody = "PHP mailer"; //body email (optional)
            if (!$mail->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed send email!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Link reset telah dikirim. Silahkan cek email Anda</div>');
                redirect('auth/authsuccess');
            }
        } else {
            $result = '500';
            echo json_encode($result);
        }
    }

    public function changepass()
    {
        //ambil get url
        $where = array(
            'email' => $this->input->get('email'),
            'uniq' => $this->input->get('ref')
        );

        $this->Crud->get_where('reg_email', $where);
        if ($this->db->affected_rows() == true) {
            $this->load->model("Crud", "crud");
            $d = $this->crud->get_all('setting_apps')->row_array();
            $data['title'] = $d['nama_usaha'] . ' | Reset Password';
            $data['favicon'] = $d['favicon'];
            $data['email'] = $this->input->get('email');
            $this->load->view('auth/changepass', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda tidak di ijinkan mengakses halaman ini !</div>');
            redirect('auth');
        }
    }

    public function action_change()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->model("Crud", "crud");
            $d = $this->crud->get_all('setting_apps')->row_array();
            $data['title'] = $d['nama_usaha'] . ' | Daftar Akun';
            $data['favicon'] = $d['favicon'];
            $data = array(
                'email' => $this->input->post('email')
            );
            $this->load->view('auth/changepass', $data);
        } else {
            $data = array(
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            );
            $where = array(
                'email' => $this->input->post('email')
            );
            //tulis ke table via model
            $this->Crud->update('user', $data, $where);
            // $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, Anda berhasil melakukan reset password. Silahkan login</div>');
            redirect('auth');
        }
    }

    public function signup()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan, silahkan gunakan email lain'
        ]);
        $this->form_validation->set_rules('userid', 'Userid', 'required|trim|is_unique[user.userid]', [
            'is_unique' => 'UserID sudah digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->model("Crud", "crud");
            $d = $this->crud->get_all('setting_apps')->row_array();
            $data['title'] = $d['nama_usaha'] . ' | Daftar Akun';
            $data['favicon'] = $d['favicon'];

            $this->load->view('auth/signup', $data);
        } else {
            $data = array(
                'userid' => htmlspecialchars($this->input->post('userid', true)), //menghindari xss
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 2
            );
            //tulis ke table via model
            $this->Crud->insert('user', $data);
            // kirim email

            //buat link dan simpan
            $a = uniqid();
            $b = password_hash($a, PASSWORD_DEFAULT);
            $c = htmlspecialchars($this->input->post('email', true));

            $data = array(
                'email' => $c,
                'uniq' => $b,
                'aktivitas' => 'registrasi'
            );
            $this->Crud->insert('reg_email', $data);

            //ambil data dari tbl_setting
            $set = $this->Crud->get_all('set_email')->result_array();
            foreach ($set as $row) {
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $secure = $row['secure'];
                $port = $row['port'];
                $emailfrom = $row['emailfrom'];
                $nama_pengirim = $row['nama_pengirim'];
            }

            //KIRIM EMAIL
            $mail = new PHPMailer;

            //Enable SMTP debugging. 
            // $mail->SMTPDebug = 3;

            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name                          
            $mail->Host = $host; //host mail server
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = $username;   //nama-email smtp          
            $mail->Password = $password;           //password email smtp
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = $secure;
            //Set TCP port to connect to 
            $mail->Port = $port;

            $mail->From = $emailfrom; //email pengirim
            $mail->FromName = $nama_pengirim; //nama pengirim



            $mail->isHTML(true);

            $mail->addAddress($this->input->post('email'), $this->input->post('email')); //email penerima
            $mail->Subject = 'Sosiometri.id : Registrasi Akun'; //subject
            $mail->Body    = '<p>Terima kasih telah melakukan registrasi di sosiometri.id.</p>
    
                <p>Silahkan klik link dibawah ini untuk untuk mulai menggunakan sosiometri</p> 
                <p><a href="' . base_url('auth/verifymail') . '?email=' . $c . '&ref=' . $b . '">' . base_url('auth/verifymail') . '?email=' . $c . '&ref='  . $b . '</a></p> 
                <p>Selamat menggunakan sosiometri!</p> 
                 
                
                
                <p>Terima Kasih</p>'; //isi email
            $mail->AltBody = "PHP mailer"; //body email (optional)
            if (!$mail->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed send email!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, akun Anda telah berhasil dibuat. Silahkan cek email Anda</div>');
                redirect('auth/authsuccess');
            }
        }
    }

    public function verifymail()
    {
        //ambil get url
        $where = array(
            'email' => $this->input->get('email'),
            'uniq' => $this->input->get('ref')
        );

        $this->Crud->get_where('reg_email', $where);
        if ($this->db->affected_rows() == true) {
            //update
            $this->Crud->update('user', ['is_active' => '1'], ['email' => $this->input->get('email')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Silahkan masukan username dan password Anda !</div>');
            redirect('auth');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda tidak di ijinkan mengakses halaman ini !</div>');
            redirect('auth');
        }
    }



    public function authsuccess()
    {


        $this->load->model("Crud", "crud");
        $d = $this->crud->get_all('setting_apps')->row_array();
        $data['title'] = $d['nama_usaha'] . ' | Notifikasi Sukses';
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];
        $data['nama_usaha'] = $d['nama_usaha'];

        $this->load->view('auth/auth-success', $data);
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
