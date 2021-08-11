<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules(
			'nim',
			'Nim',
			'required|trim',
			array(
				'required' => 'Harap isi NIM anda gan!!'
			)
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim',
			array(
				'required' => 'Harap diisi password anda'
			)
		);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['nim' => $nim])->row_array();

		if ($user) {
			//ada
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'nim' => $user['nim'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
 			 		Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
 			 	Akun anda belum aktif, silahkan hubungi Administrator!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
 			 NIM tidak terdaftar!!</div>');
			redirect('auth');
		}
	}





	public function registration()
	{
		$this->form_validation->set_rules(
			'name',
			'Name',
			'required|trim',
			array(
				'required' => 'Harap isi nama lengkap anda gan!'
			)
		);
		$this->form_validation->set_rules(
			'nim',
			'Nim',
			'required|trim|is_unique[user.nim]',
			array(
				'required' => 'Harap isi Username anda gan!!',
				'is_unique' => 'Username anda sudah pernah didaftarkan!'
			)
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			array(
				'required' => 'Harap diisi password anda!!',
				'min_length' => 'password anda terlalu pendek!',
				'matches' => 'password anda tidak sama!!'
			)
		);
		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim|matches[password1]',
			array(
				'required' => 'Harap diisi password anda!!',
				'matches' => 'password anda tidak sama!'
			)
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar Akun';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nim' => htmlspecialchars($this->input->post('nim', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
 			Selamat akun anda berhasil didaftarkan, Harap Login!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
 		Akun anda berhasil dilogout!</div>');
		redirect('auth');
	}
}
