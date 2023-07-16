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
    }

    public function index()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Laporan Analisa Individu';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('report/analisisindividu', $data);
    }

    public function kelompok()
    {
        $d = $this->crud->get_all('setting_apps')->row_array();

        $data['title'] = $d['nama_usaha'] . ' | Laporan Analisa Individu';
        $data['logo_dark'] = $d['logo_dark'];
        $data['logo_light'] = $d['logo_light'];
        $data['favicon'] = $d['favicon'];

        $this->load->view('report/analisiskelompok', $data);
    }
}
