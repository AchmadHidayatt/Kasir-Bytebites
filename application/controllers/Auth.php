<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		$this->load->view('login');
	}

	public function process() {
		$this->load->view('login');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->load->model('User_model');
		$user = $this->User_model->check_login($username, $password);
	
		if ($user) {
			$this->load->model('Level_model');
			$level = $this->Level_model->get_level($user->id_level);
	
			// Simpan data pengguna di session
			$this->session->set_userdata([
				'user_id' => $user->id,
				'username' => $user->username,
				'id_level' => $user->id_level,
				'role' => $level->nama_level,
				'is_logged_in' => true
			]);
	
			// Arahkan ke halaman berdasarkan role
			switch ($user->id_level) {
				case 1: // Owner
					redirect('dashboard/owner');
					break;
				case 2: // Administrator
					redirect('dashboard/admin');
					break;
				case 3: // Waiter
					redirect('dashboard/waiter');
					break;
				case 4: // Kasir
					redirect('dashboard/kasir');
					break;
				case 5: // Pelanggan
					redirect('dashboard/pelanggan');
					break;
				default:
					redirect('auth/login'); // Jika role tidak valid
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah!');
			redirect('auth/login');
		}
	}
	
}
