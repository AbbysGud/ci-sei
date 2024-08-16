<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('proyek_model');
		$this->load->model('lokasi_model');
	}

	public function index()
	{
		$data['title'] = 'Proyek';
		$data['proyek'] = $this->proyek_model->get_data('proyek');
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('proyek', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Proyek';
		$data['lokasi'] = $this->lokasi_model->get_data('lokasi');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_proyek', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'namaProyek' => $this->input->post('namaProyek'),
				'client' => $this->input->post('client'),
				'tglMulai' => $this->input->post('tglMulai'),
				'tglSelesai' => $this->input->post('tglSelesai'),
				'pimpinanProyek' => $this->input->post('pimpinanProyek'),
				'keterangan' => $this->input->post('keterangan'),
				'lokasiId' => (int) $this->input->post('lokasiId')
			);

            $response = $this->proyek_model->insert_data($data, 'proyek');

			if ($response['status'] == 'success') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('proyek');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Gagal Ditambahkan!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('proyek');
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
				'namaProyek' => $this->input->post('namaProyek'),
				'client' => $this->input->post('client'),
				'tglMulai' => $this->input->post('tglMulai'),
				'tglSelesai' => $this->input->post('tglSelesai'),
				'pimpinanProyek' => $this->input->post('pimpinanProyek'),
				'keterangan' => $this->input->post('keterangan'),
				'lokasiId' => (int) $this->input->post('lokasiId')
			);

            $response = $this->proyek_model->update_data($data, 'proyek');

			if ($response['status'] == 'success') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('proyek');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Data Gagal Diupdate!<button type="button" class="close" data-dismiss="alert" 
					aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('proyek');
			}
		}
	}

	public function delete($id){

		$data = array(
			'id' => $id
		);

		$response = $this->proyek_model->delete_data($data, 'proyek');

		if ($response) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" 
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('proyek');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Gagal Dihapus!<button type="button" class="close" data-dismiss="alert" 
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('proyek');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('client', 'Client', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('tglMulai', 'Tanggal Mulai', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('tglSelesai', 'Tanggal Selesai', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('pimpinanProyek', 'Pimpinan Proyek', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array (
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('lokasiId', 'Lokasi', 'required', array (
			'required' => '%s harus dipilih !!'
		));
	}

}
