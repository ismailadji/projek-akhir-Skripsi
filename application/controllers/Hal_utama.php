<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hal_utama extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_hal_utama');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Utama Perpus UA';
        $this->load->view('Hal_utama/v_hal_utama');

    }

    
}
