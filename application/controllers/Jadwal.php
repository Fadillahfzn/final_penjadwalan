<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_m');
		$this->load->model('matakuliah_m');
		$this->load->model('dosen_m');
		$this->load->model('ruangan_m');
	}

	public function jadwal_makul()
	{
		$data['title'] = 'Tambah jadwal Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten'] = 'konten/tjadwal_v';
		$data['datajadwal'] = $this->jadwal_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jadwal/index', $data);
		$this->load->view('templates/footer');
	}

	public function tjadwal()
	{
		$data['title'] = 'Tambah jadwal Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten'] = 'konten/tjadwal_v';
		$data['datajadwal'] = $this->jadwal_m->getall();
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('kodemakul', 'Kode Matakuliah', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
		$this->form_validation->set_rules('dosen', 'dosen', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['konten'] = 'form/tambahjadwal_v';
			$data['datamakul'] = $this->matakuliah_m->getall();
			$data['datadosen'] = $this->dosen_m->getall();
			$data['dataruangan'] = $this->ruangan_m->getall();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('form/tambahjadwal_v', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_masuk'),
				'jam_akhir' => $this->input->post('jam_selesai'),
				'kodemakul' => $this->input->post('kodemakul'),
				'idruangan' => $this->input->post('ruangan'),
				'npp' => $this->input->post('dosen')
			);
			$this->jadwal_m->getsimpan($data);
			redirect('jadwal/jadwal_makul');
		}
	}

	public function index()
	{
		$data['title'] = 'Tambah jadwal Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten'] = 'konten/tjadwal_v';
		$data['datajadwal'] = $this->jadwal_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jadwal/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapusjadwal($id)
	{
		$data['title'] = 'Tambah jadwal Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->jadwal_m->gethapus($id);
		redirect('jadwal/jadwal_makul');
	}

	public function lihat_jadwal()
	{
		$data['title'] = 'Tambah jadwal Matakuliah';
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$hari = $this->uri->segment(3);
		$data['konten'] = 'konten/lihatjadwal_v';
		$data['datajadwal'] = $this->jadwal_m->getall();
		$data['datahari'] = $this->jadwal_m->gethari($hari);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar_jadwal', $data);
		$this->load->view('jadwal/lihatjadwal_v', $data);
		$this->load->view('templates/footer');
	}
}
