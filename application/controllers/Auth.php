<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$segment = $this->uri->segment(1) == 'logout';
		if(!$segment)
		{
			login();
		}
	}
	
	public function Login()
	{
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
		$data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
		
		$this->load->view('templates/v_header_auth',$data);
		$this->load->view('auth/daftarmasuk');
		$this->load->view('templates/v_footer_auth');

		if($this->input->post()){
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$user = $this->User_m->getUserBy($email)->row_array();
			if($user['email'] == $email)
			{
				if(password_verify($password, $user['password']))
				{
					$this->User_m->updateStatus($user['userID'], 1);
					$data = [
						'email' => $user['email'],
						'userID' => $user['userID'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if($user['level'] == 'User')
					{
						redirect('home');
					}else{
						redirect('dashboard');
					}
				}else{
					$this->session->set_flashdata('messagemasuk','<div class="alert alert-danger role="alert">Password Salah</div>');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('messagemasuk','<div class="alert alert-danger role="alert">Email Salah</div>');
				redirect('login');
			}
		}		
    }
    
	public function login_admin()
	{
		$this->load->view('templates/v_header_auth2');
		$this->load->view('auth/login');
		$this->load->view('templates/v_footer_auth2');
		if($this->input->post())
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->User_m->getUserBy($email)->row_array();
			if ($user['email'] == $email) {
				if (password_verify($password, $user['password'])) {
					$this->User_m->updateStatus($user['userID'], 1);
					$data = [
						'email' => $user['email'],
						'userID' => $user['userID'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger role="alert">Password Salah</div>');
					redirect('login_admin');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger role="alert">Email Salah</div>');
				redirect('login_admin');
			}
		}
	}
	
    public function registrasi()
	{
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
		$data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID','18')->num_rows();
		
		$this->form_validation->set_rules('email','Email','is_unique[user.email]',
		['is_unique' => 'Email Sudah Terdaftar']
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_auth',$data);
			$this->load->view('auth/daftarmasuk');
			$this->load->view('templates/v_footer_auth');
		}
		else
		{
			$data = $this->input->post();
			$this->User_m->setRegistrasi($data);
			$this->session->set_flashdata('message','<div class="alert alert-success small">Akun berhasil dibuat</div>');
			redirect('login');
		}
    }
	
	public function lupapassword()
	{
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
		$data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID','18')->num_rows();

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
			'required' => 'Data %s kosong harap isi data!',
			'valid_email' => 'Format %s salah'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required',[
			'required' => 'Data %s kosong harap isi data!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[8]',[
			'required' => 'Data %s kosong harap isi data!',
			'min_length' => 'Data %s kurang dari 4 Char',
			'max_length' => 'Data %s lebih dari 8 Char'
		]);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_auth',$data);
			$this->load->view('auth/lupapassword');
			$this->load->view('templates/v_footer_auth');
		}else{
			$email = htmlspecialchars($this->input->post('email'));
			$username = htmlspecialchars($this->input->post('username'));
			$user = $this->User_m->getUserBy('email',$email)->row_array();
			if($user['email'] == $email && $user['nama'] == $username)
			{
				$passbar =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$this->User_m->updatePassword('email',$email,$passbar);	
				$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Password Berhasil Diubah</div>');
	       		redirect('lupapassword');
			}
		}
	}
	
	public function logout()
	{
		$this->User_m->updateStatus($this->session->userdata('userID'), 0);
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('level');
       	$this->session->set_flashdata('messagemasuk','<div class="alert alert-success small">Anda berhasil<strong> Logout!</strong></div>');
       	redirect('login');
	}

	
}