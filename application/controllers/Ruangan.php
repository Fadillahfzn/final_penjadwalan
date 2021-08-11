<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller

{

	public function __construct(){
		parent::__construct();
		$this->load->model('ruangan_m');
	}

	public function ruangan(){
		$data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten']='konten/truangan_v';
		$data['dataruangan']=$this->ruangan_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('ruangan/index', $data);
		$this->load->view('templates/footer');
	}

	public function truangan(){
		$data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$this->form_validation->set_rules('ruangan','Ruangan','required');
		if($this->form_validation->run()==FALSE){
			$data['konten']='form/tambahruangan_v';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('form/tambahruangan_v');
			$this->load->view('templates/footer');
		}else{
			$data=array(
				'ruangan'=>$this->input->post('ruangan')
			);
			$this->ruangan_m->getsimpan($data);
			redirect('ruangan');
		}
	}

	public function index(){
		$data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$data['konten']='konten/truangan_v';
		$data['dataruangan']=$this->ruangan_m->getall();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('ruangan/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapusruangan($id){
		$data['title'] = 'Ruangan';
		$data['user'] = $this->db->get_where('user',['nim' => $this->session->userdata('nim')])->row_array();
		$this->ruangan_m->gethapus($id);
		redirect('ruangan');
	}

}