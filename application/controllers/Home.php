<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        is_user();
	}

	public function index()
	{
        $data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array(); 
        $data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
		$data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
        $data['produk'] = $this->Transaksi_m->getProduk()->result_array();
        
        if($this->input->post(`cari`)){
            $data['produk'] = $this->Transaksi_m->cari('namaproduk',$this->input->post('keyword'))->result_array();
            $data['keyword'] = $this->input->post('keyword');
        }

		$this->load->view('templates/v_header',$data);
		$this->load->view('home/index');
		$this->load->view('templates/v_footer');
    }

	public function notifikasi()
    {
        if(!session())
        {
            $this->session->set_flashdata('messagemasuk','<div class="alert alert-danger role="alert">Silahkan Login Terlebih dahulu</div>');
	       	redirect('login');
        }else{
            $data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array(); 
            $data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
            $data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
            $data['trx'] = $this->Transaksi_m->getTransaksiStatus($this->session->userdata('userID'),0)->result_array();
            $data['kirim'] = $this->Transaksi_m->getTransaksiStatus($this->session->userdata('userID'),1)->result_array();

            $this->load->view('templates/v_header',$data);
            $this->load->view('home/notifikasi');
            $this->load->view('templates/v_footer');
        }
    }

    public function testimoni()
    {
            $data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array(); 
            $data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
            $data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
            $data['testi'] = $this->Transaksi_m->getTestimoni()->result_array();

            $this->load->view('templates/v_header',$data);
            $this->load->view('home/testimoni');
            $this->load->view('templates/v_footer');
    }

    public function uploadtesti()
    {
        if(!session())
        {
            $this->session->set_flashdata('messagemasuk','<div class="alert alert-danger role="alert">Silahkan Login Terlebih dahulu</div>');
	       	redirect('login');
        }else{
            $data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array(); 
            $data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
            $data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
            $data['produk'] = $this->Transaksi_m->getProduk()->result_array();

            if($this->input->post())
            {
                $this->Transaksi_m->uploadTesti($this->session->userdata('userID'), $this->input->post());
                $this->session->set_flashdata('message','<div class="alert alert-success role="alert">Berhasil Upload Testimoni</div>');
	       	    redirect('testimoni');
            }

            $this->load->view('templates/v_header',$data);
            $this->load->view('home/uploadtesti');
            $this->load->view('templates/v_footer');
        }
    }

    public function konfirmasi($id = NULL)
    {
        if(!session())
        {
            $this->session->set_flashdata('messagemasuk','<div class="alert alert-danger role="alert">Silahkan Login Terlebih dahulu</div>');
	       	redirect('login');
        }else{

            $data['user'] = $this->User_m->getUserBy($this->session->userdata('email'))->row_array(); 
            $data['kategori'] = $this->Transaksi_m->getKategori()->result_array();
            $data['cek_keranjang'] = $this->Transaksi_m->getKeranjangBy('userID', $this->session->userdata('userID'))->num_rows();
            
            if($this->uri->segment(2) == 'konfirmasi'){
                $data['konfirmasi'] = $this->Transaksi_m->getTransaksiDescBy($this->session->userdata('userID'),$id)->row_array();                
            }else{
                $data['konfirmasi'] = $this->Transaksi_m->getTransaksiDesc($this->session->userdata('userID'))->row_array();
            }
            $data['detail_transaksi'] = $this->Transaksi_m->getDetailTransaksi($data['konfirmasi']['transaksiID'])->result_array();
            
            if($this->input->post(`upload`)){
                $this->Transaksi_m->updateBuktiPembayaran($id,$this->input->post());
                $this->session->set_flashdata('message','<div class="alert alert-success small">Upload Bukti Pembayaran <strong>Berhasil!</strong></div>');
                redirect('home/konfirmasi/'.$id);
            }

            $this->load->view('templates/v_header',$data);
            $this->load->view('home/konfirmasi');
            $this->load->view('templates/v_footer');
        }
    }

}