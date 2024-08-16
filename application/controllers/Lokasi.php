<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('lokasi_model');
	}

	public function index()
	{
		$data['title'] = 'Lokasi';
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('lokasi', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Lokasi';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_lokasi');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'namaLokasi' => $this->input->post('namaLokasi'),
				'negara' => $this->input->post('negara'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
			);

            $response = $this->lokasi_model->insert_data($data, 'lokasi');

			if ($response['status'] == 'success') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('lokasi');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Gagal Ditambahkan!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('lokasi');
			}
		}

	}

	public function edit($id)
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id' => $id,
				'namaLokasi' => $this->input->post('namaLokasi'),
				'negara' => $this->input->post('negara'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
			);

            $response = $this->lokasi_model->update_data($data, 'lokasi');

			if ($response['status'] == 'success') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('lokasi');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Gagal Diupdate!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('lokasi');
			}
		}
	}

	public function delete($id){

		$data = array(
			'id' => $id
		);

		$response = $this->lokasi_model->delete_data($data, 'lokasi');

		if ($response) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" 
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('lokasi');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Gagal Dihapus!<button type="button" class="close" data-dismiss="alert" 
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('lokasi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('namaLokasi', 'Nama Lokasi', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('negara', 'Negara', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array (
			'required' => '%s harus diisi !!'
		));
	}

}
