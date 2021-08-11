<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller

{
	public function __construct(){
		parent::__construct();
		$this->load->model('dosen_m');
	}

	public function dosen(){
		$data['title'] = 'Dosen Pengajar';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten']='konten/tdosen_v';
		$data['datadosen']=$this->dosen_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/index', $data);
		$this->load->view('templates/footer');
	}

	public function tdosen(){
		$data['title'] = 'Dosen Pengajar';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$this->form_validation->set_rules('npp','NPP','required');
		$this->form_validation->set_rules('nama','Nama Dosen','required');
		$this->form_validation->set_rules('nohp','No. Hp/Telp','required');
		if($this->form_validation->run() == FALSE){
			$data['konten']='form/tambahdosen_v';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('form/tambahdosen_v');
			$this->load->view('templates/footer', $data);
		}else{
			$data=array(
				'npp'=>$this->input->post('npp'),
				'namadosen'=>$this->input->post('nama'),
				'nohp'=>$this->input->post('nohp')
			);
			$this->dosen_m->getsimpan($data);
			redirect('dosen');
		}
	}


	public function index(){
		$data['title'] = 'Dosen Pengajar';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten']='konten/tdosen_v';
		$data['datadosen']=$this->dosen_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapusdosen($id){
		$data['title'] = 'Dosen Pengajar';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$this->dosen_m->gethapus($id);
		redirect('dosen');
	}

}