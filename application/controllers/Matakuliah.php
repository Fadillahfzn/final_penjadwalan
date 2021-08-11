<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('matakuliah_m');
	}

	public function matakuliah()
	{
		$data['title'] = 'Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten'] = 'konten/tmatakuliah_v';
		$data['datamakul'] = $this->matakuliah_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('matakuliah/index', $data);
		$this->load->view('templates/footer');
	}


	public function tmatakuliah()
	{
		$data['title'] = 'Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('makul', 'Matakuliah', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['konten'] = 'form/tambahmakul_v';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('form/tambahmakul_v', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'kodemakul' => $this->input->post('kode'),
				'makul' => $this->input->post('makul'),
				'semester' => $this->input->post('semester'),
				'prodi' => $this->input->post('prodi'),
			);
			$this->matakuliah_m->getsimpan($data);
			redirect('matakuliah');
		}
	}

	public function index()
	{
		$data['title'] = 'Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten'] = 'konten/tmatakuliah_v';
		$data['datamakul'] = $this->matakuliah_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('matakuliah/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapusmakul($id)
	{
		$data['title'] = 'Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->matakuliah_m->gethapus($id);
		redirect('matakuliah/matakuliah');
	}

	public function editmakul($id)
	{
		$data['title'] = 'Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();

		$data['makul'] = $this->db->get_where('matakuliah')->row_array();

		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('makul', 'Matakuliah', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['konten'] = 'form/tambahmakul_v';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('form/editmakul_v', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'kodemakul' => $this->input->post('kode'),
				'makul' => $this->input->post('makul'),
				'semester' => $this->input->post('semester'),
				'prodi' => $this->input->post('prodi'),
			];
			$this->matakuliah_m->getedit($id, $data);
			redirect('matakuliah');
		}
	}
}
