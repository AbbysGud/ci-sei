<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('proyek_model');
		$this->load->model('lokasi_model');
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['proyek'] = $this->proyek_model->get_data('proyek');
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

}
