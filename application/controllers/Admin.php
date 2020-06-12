<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_admin();
		if(!session())
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger role="alert">Silahkan Login Terlebih dahulu</div>');
	       	redirect('login_admin');
		}
	}

	public function dashboard()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();

		$day = date('Y-m-d');
		$month = date('m');
		$year = date('Y');
		$data['data_rekap_harian'] = $this->Transaksi_m->getRekapHarian($day)->row_array();
		$data['data_rekap_bulanan'] = $this->Transaksi_m->getRekapBulanan($month)->row_array();
		$data['data_rekap_tahunan'] = $this->Transaksi_m->getRekapTahunan($year)->row_array();

		//Chart Tahunan
		$arr_chart = [];
		for($i=1;$i<=12;$i++){
			$query_chart = $this->Transaksi_m->getRekapChart($i,$year)->result_array();
			foreach ($query_chart as $row) {
				if($row['hasil'] == NULL || $row['hasil'] == 0){
					array_push($arr_chart, 0);
				}else{
					array_push($arr_chart, $row['hasil']);
				}
			}
		}
		$data['arr_chart'] = $arr_chart;
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/v_footer_admin');
	}

	public function admin_akun()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		
		$data['useradmin'] = $this->User_m->getUserAllStatus('Admin')->result_array();
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/akun');
		$this->load->view('templates/v_footer_admin');
	}
	
	public function operasi_akun($operasi,$userID)
	{
		if(isset($operasi))
		{
			$this->User_m->updateOperasiUser($operasi,$userID);
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Operasi Berhasil</div>');
			redirect('admin_akun');
		}else{
			redirect('admin_akun');
		}	
	}

	public function input_akun()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]|valid_email',
				array(
					'required' => '%s tidak boleh kosong',
					'is_unique' => '%s sudah terdaftar',
					'valid_email' => '%s tidak valid'
				)
		);
		$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]',
				array(
					'required' => '%s tidak boleh kosong',
					'matches' => '%s tidak sama'
				)
		);
		$this->form_validation->set_rules('repassword', 'Repassword', 'required|matches[password]',
				array('required' => '%s tidak boleh kosong')
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/input_akun');
			$this->load->view('templates/v_footer_admin');
		}
		else
		{
			$this->User_m->setAdmin($this->input->post());
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Akun Berhasil Dibuat</div>');
			redirect('admin_akun');
		}		
	}

	public function profile()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
				array(
					'required' => '%s tidak boleh kosong',
					'valid_email' => '%s tidak valid'
				)
		);
		$this->form_validation->set_rules('password', 'Password', 'matches[repassword]',
				array(
					'required' => '%s tidak boleh kosong',
					'matches' => '%s tidak sama'
				)
		);
		$this->form_validation->set_rules('repassword', 'Repassword', 'matches[password]',
				array('required' => '%s tidak boleh kosong')
		);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/profile');
			$this->load->view('templates/v_footer_admin');
		}
		else
		{
			$this->User_m->updateProfile($this->input->post(),$data['user']['password'],$this->session->userdata('userID'));
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Akun Berhasil Diubah</div>');
			redirect('profile');
		}	
	}

	public function admin_customer()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['userall'] = $this->User_m->getUserAllStatus('User')->result_array();

		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/customer');
		$this->load->view('templates/v_footer_admin');
	}
	
	public function admin_kategori_produk()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();

		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/kategori_produk');
		$this->load->view('templates/v_footer_admin');
	}

	public function edit_kategori_produk($id)
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['kategori'] = $this->Transaksi_m->getKategoriBy('kategoriID',$id)->row_array();

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/edit_kategori_produk');
			$this->load->view('templates/v_footer_admin');
		}else{
			$this->Transaksi_m->updateKategori($this->input->post(),$id);
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Kategori Berhasil Diubah</div>');
			redirect('admin_kategori_produk');
		}
	}
	
	public function delete_kategori_produk($id)
	{
		$this->Transaksi_m->hapusKategori($id);
		$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Kategori Berhasil Dihapus</div>');
		redirect('admin_kategori_produk');
	}
	
	public function input_kategori_produk()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required',
				array('required' => '%s tidak boleh kosong')
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/input_kategori_produk');
			$this->load->view('templates/v_footer_admin');
		}else{
			$this->Transaksi_m->setKategori($this->input->post());
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Kategori Berhasil Diubah</div>');
			redirect('admin_kategori_produk');
		}
	}
	
	public function admin_produk()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['produkkategori'] = $this->Transaksi_m->getProdukJoin()->result_array();
		
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/produk');
		$this->load->view('templates/v_footer_admin');
	}
	
	public function detail_produk($id)
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['detailproduk'] = $this->Transaksi_m->getProdukJoin('$this->db->where("produkID", '.$id.');')->row_array();
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/detail_produk');
		$this->load->view('templates/v_footer_admin');
	}

	public function edit_produk($id)
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['produk'] = $this->Transaksi_m->getProdukBy('produkID',$id)->row_array();
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();

		$this->form_validation->set_rules('harga', 'Harga', 'numeric',
				array('numeric' => '%s harus angka')
		);
		$this->form_validation->set_rules('jumlah', 'Harga', 'numeric',
				array('numeric' => '%s harus angka')
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/edit_produk');
			$this->load->view('templates/v_footer_admin');
		}else{
			$this->Transaksi_m->editProduk($this->input->post(),$id);
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Produk Berhasil Diubah</div>');
			redirect('admin/edit_produk/'.$id);
		}
	}

	public function input_produk()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['produk'] = $this->Transaksi_m->getProduk()->result_array();
		$data['kategori'] = $this->Transaksi_m->getKategori()->result_array();

		$this->form_validation->set_rules('harga', 'Harga', 'numeric|required',
				array(
					'numeric' => '%s harus angka',
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('jumlah', 'Harga', 'numeric|required',
				array(
					'numeric' => '%s harus angka',
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('kategoriID', 'Kategori', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('warna_produk', 'Warna Produk', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		$this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/input_produk');
			$this->load->view('templates/v_footer_admin');
		}else{
			$this->Transaksi_m->setProduk($this->input->post());
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Produk Berhasil Ditambah</div>');
			redirect('admin_produk');
		}
	}

	public function hapus_Produk($id)
	{
		$this->Transaksi_m->hapusProduk($id);
		$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Kategori Berhasil Dihapus</div>');
		redirect('admin_produk');
	}
	
	public function admin_testimoni()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['testimonijoin'] =$this->Transaksi_m->getTestimoniJoin()->result_array();

		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/testimoni');
		$this->load->view('templates/v_footer_admin');
	}

	public function operasi_testimoni($operasi,$id)
	{
			$this->Transaksi_m->operasiTestimoni($operasi,$id);
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Operasi Berhasil</div>');
			redirect('admin_testimoni');
	}
	
	public function admin_transaksi()
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['transaksi'] = $this->Transaksi_m->getTransaksiJoin()->result_array();
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/transaksi');
		$this->load->view('templates/v_footer_admin');
	}

	public function detail_transaksi($id)
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['transaksi'] = $this->Transaksi_m->getTransaksiJoin('$this->db->where("transaksiID", '.$id.');')->row_array();
		$data['transaksiID'] = $id;
		$data['detailtransaksijoin'] = $this->Transaksi_m->getDetailTransaksiJoin($id)->result_array();
		$this->load->view('templates/v_header_admin',$data);
		$this->load->view('admin/detail_transaksi');
		$this->load->view('templates/v_footer_admin');
	}

	public function edit_transaksi($id)
	{
		$data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array();
		$data['transaksi'] = $this->Transaksi_m->getTransaksiByTrx($id)->row_array();

		$this->form_validation->set_rules('no_resi', 'No Resi', 'required',
				array(
					'required' => '%s harus diisi'
				)
		);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/v_header_admin',$data);
			$this->load->view('admin/update_transaksi');
			$this->load->view('templates/v_footer_admin');	
		}else{
			$this->Transaksi_m->updateTransaksi($this->input->post(),$id);
			$this->session->set_flashdata('message','<div class="alert alert-success role="alert">Transaksi Berhasil Diupdate</div>');
			redirect('admin/edit_transaksi/'.$id);
		}
	}
}
