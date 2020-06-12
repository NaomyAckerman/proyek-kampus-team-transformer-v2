<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

    function getKategori()
    {
        return $this->db->get('kategori');
    }
    
    function getKategoriBy($field,$value)
    {
        $this->db->where($field,$value);
        return $this->db->get('kategori');
    }

    function updateKategori($data,$id)
    {
        $dataupdate = [
            'namakategori' => $data['nama_kategori'],
            'deskripsikategori' => $data['deskripsi']
        ];
        $this->db->set($dataupdate);
        $this->db->where('kategoriID', $id);
        $this->db->update('kategori');
    }

    function hapusKategori($id)
    {
        $this->db->where('kategoriID', $id);
        $this->db->delete('kategori');
    }

    function setKategori($data)
    {
        $datainsert = [
            'namakategori' => $data['nama_kategori'],
            'deskripsikategori' => $data['deskripsi']
        ];
        $this->db->set($datainsert);
        $this->db->insert('kategori');
    }
    
    function getProduk()
    {
        return $this->db->get('produk');
    }
    
    function getProdukBy($field,$value)
    {
        $this->db->where($field,$value);
        return $this->db->get('produk');
    }

    function getProdukJoin($where = null)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.kategoriID = kategori.kategoriID');
        return $this->db->get();
    }

    function setProduk($data)
    {
        $upload_img = $_FILES['gambar']['name'];
        if ($upload_img) {
            $config['upload_path'] = './assets/admin/uploaded_files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')){
                $new_img = $this->upload->data('file_name');
                $this->db->set('GambarProduk', $new_img); 
            }else{
                echo $this->upload->display_errors();
            }
        } 
        $datainsert = [
            'namaproduk' => $data['nama_produk'],
            'deskripsiproduk' => $data['deskripsi'],
            'harga' => $data['harga'],
            'jumlah' => $data['jumlah'],
            'kategoriID' => $data['kategoriID'],
            'jenisproduk' => $data['jenis_produk'],
            'warnaproduk' => $data['warna_produk'],
            'best_seller_status' => '0'
        ];
        $this->db->set($datainsert);
        $this->db->insert('produk');
    }   

    function editProduk($data,$id)
    {
        $upload_img = $_FILES['gambar']['name'];
        if ($upload_img) {
            $config['upload_path'] = './assets/admin/uploaded_files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')){
                $new_img = $this->upload->data('file_name');
                $this->db->set('GambarProduk', $new_img); 
            }else{
                echo $this->upload->display_errors();
            }
        } 
        $dataedit = [
            'namaproduk' => $data['nama_produk'],
            'deskripsiproduk' => $data['deskripsi'],
            'harga' => $data['harga'],
            'jumlah' => $data['jumlah'],
            'kategoriID' => $data['kategoriID'],
            'jenisproduk' => $data['jenis_produk'],
            'warnaproduk' => $data['warna_produk'],
            'best_seller_status' => '0'
        ];
        $this->db->set($dataedit);
        $this->db->where('produkID',$id);
        $this->db->update('produk');
    }

    function hapusProduk($id)
    {
        $this->db->where('produkID',$id);
        $this->db->delete('produk');
    }

    function getKeranjangBy($field,$value)
    {
        $this->db->where($field, $value);
        return $this->db->get('keranjang');
    }

    function setKeranjang($data)
    {
        $this->db->insert('keranjang', $data);
    }
    
    function setTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    
    function setDetailTransaksi($data)
    {
        $this->db->insert('detail_transaksi', $data);
    }

    function getDetailTransaksi($id)
    {
        $this->db->select('
        * FROM detail_transaksi a, transaksi b, produk c WHERE
        a.transaksiID = b.transaksiID AND
        c.produkID = a.produkID AND
        a.transaksiID = '.$id.'
        ',FALSE);
        return $this->db->get();
    }

    function getBestSeller(){
        $this->db->select('a.produkID,b.harga,namaproduk,GambarProduk,sum(qty) AS hasil');
        $this->db->from('produk a');
        $this->db->join('detail_transaksi b', 'a.produkID = b.produkID');
        $this->db->group_by("produkID");
        $this->db->order_by('hasil', 'DESC');
        $this->db->limit(3);
        return $this->db->get();
    }

    function getKeranjang($userid){ 
        $this->db->select('*');
        $this->db->from('keranjang');
        $this->db->join('produk', 'keranjang.produkID = produk.produkID');
        $this->db->where('userID',$userid);
        $this->db->group_by("cartID");
        return $this->db->get();
    }

    function updateStok($data,$id)
    {
        $this->db->set('jumlah', $data);
        $this->db->where('produkID', $id);
        $this->db->update('produk');
    }

    function cari($field,$keywoard)
    {
        $this->db->like($field, $keywoard);
        return $this->db->get('produk');
    }

    function hapusKeranjang($id)
    {
        $this->db->where('cartID', $id);
        $this->db->delete('keranjang');
    }

    function hapusKeranjangAll($id)
    {
        $this->db->where('userID', $id);
        $this->db->delete('keranjang');
    }

    function getTransaksi($id)
    {
        $this->db->select('
            * FROM keranjang a, produk b, user c, kategori d WHERE
            a.produkID = b.produkID AND
            a.userID = c.userID AND
            b.kategoriID = d.kategoriID AND
            a.userID = '.$id.'
        ',FALSE);
        return $this->db->get();
    }

    function getTransaksiDesc($userID)
    {
        $this->db->select('
            * FROM detail_transaksi a, transaksi b, user d WHERE
            a.transaksiID = b.transaksiID AND
            b.userID = '.$userID.' GROUP BY b.transaksiID DESC
        ',FALSE);
        return $this->db->get();
    }
    
    function getTransaksiDescBy($userID, $transaksiID)
    {
        $this->db->select('
            * FROM detail_transaksi a, transaksi b, user d WHERE
            a.transaksiID = b.transaksiID AND
            b.userID = '.$userID.' AND
            b.transaksiID = '.$transaksiID.' GROUP BY b.transaksiID DESC
        ',FALSE);
        return $this->db->get();
    }

    function getTransaksiBy($id)
    {
        $this->db->where('userID',$id);
        return $this->db->get('transaksi');
    }
    
    function getTransaksiByTrx($id)
    {
        $this->db->where('transaksiID',$id);
        return $this->db->get('transaksi');
    }

    function updateTransaksi($data,$id)
    {
        $dataupdate = [
            'no_resi' => $data['no_resi'],
            'status_pembayaran' => $data['status_pembayaran'],
            'status_pengiriman' => $data['status_pengiriman']
        ];
        $this->db->set($dataupdate);
        $this->db->where('transaksiID', $id);
        $this->db->update('transaksi');
    }

    function updateBuktiPembayaran($id,$data)
    {
        $upload_img = $_FILES['uploadbukti']['name'];
        if ($upload_img) {
            $config['upload_path'] = './assets/admin/uploaded_files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('uploadbukti')){
                $new_img = $this->upload->data('file_name');
                $this->db->set('gbrbukti_pembayaran', $new_img); 
            }else{
                echo $this->upload->display_errors();
            }
        } 
        $this->db->where('transaksiID', $id);
        $this->db->update('transaksi');
    }

    function uploadTesti($id,$data)
    {
        $upload_img = $_FILES['gambar']['name'];
        if ($upload_img) {
            $config['upload_path'] = './assets/admin/uploaded_files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')){
                $new_img = $this->upload->data('file_name');
                $this->db->set('Gambartesti', $new_img); 
            }else{
                echo $this->upload->display_errors();
            }
        } 
        $datatesti = [
            'Keterangan' => $data['testi'],
            'userID' => $id,
            'produkID' => $data['produk'],
            'show_status' => '0'
        ];
        $this->db->insert('testimoni', $datatesti);
    }

    function getTransaksiStatus($userID,$status)
    {
        $this->db->select('
            * FROM transaksi a, detail_transaksi b, produk c, user d WHERE d.userID = '.$userID.' AND
            a.transaksiID = b.transaksiID AND
            b.produkID = c.produkID AND
            a.status_pembayaran = '.$status.'
            GROUP BY a.transaksiID
        ',FALSE);
        return $this->db->get();   
    }

    function getTransaksiJoin($where = null)
    {
        $this->db->from('transaksi');
        $this->db->join('user', 'user.userID = transaksi.userID', 'left');
        if(isset($where)){
           $where;
        }
        return  $this->db->get();   
    }

    function getDetailTransaksiJoin($id)
    {
        $this->db->from('detail_transaksi');
        $this->db->join('produk', 'detail_transaksi.produkID = produk.produkID');
        $this->db->where('detail_transaksi.transaksiID',$id);
        return  $this->db->get();    
    }

    function getTestimoni()
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->join('user', 'testimoni.userID = user.userID');
        $this->db->where('testimoni.show_status', '1');
        return $this->db->get();
    }

    function getTestimoniJoin()
    {
        $this->db->from('testimoni');
        $this->db->join('user', 'user.userID = testimoni.userID', 'left');
        $this->db->join('produk', 'testimoni.produkID = produk.produkID', 'left');
        return  $this->db->get();
    }

    function operasiTestimoni($operasi,$id)
    {
        $this->db->set('show_status', $operasi);
        $this->db->where('testimoniID', $id);
        $this->db->update('testimoni');
    }

    // admin

    function getRekapHarian($day){
        $this->db->select('SUM(total_pembayaran) as hasil');
        $data = [
			'status_pembayaran' => '1',
			'DATE(tgl_transaksi)' => $day
		];
        $this->db->where($data);
        return $this->db->get('transaksi');
    }
    
    function getRekapBulanan($month){
        $this->db->select('SUM(total_pembayaran) as hasil');
        $data = [
			'status_pembayaran' => '1',
			'MONTH(tgl_transaksi)' => $month
		];
        $this->db->where($data);
        return $this->db->get('transaksi');
    }
    
    function getRekapTahunan($year){
        $this->db->select('SUM(total_pembayaran) as hasil');
        $data = [
			'status_pembayaran' => '1',
			'YEAR(tgl_transaksi)' => $year
		];
        $this->db->where($data);
        return $this->db->get('transaksi');
    }
    
    function getRekapChart($month,$year){
        $this->db->select('SUM(total_pembayaran) as hasil');
        $data = [
			'status_pembayaran' => '1',
            'YEAR(tgl_transaksi)' => $year,
            'MONTH(tgl_transaksi)' => $month
		];
        $this->db->where($data);
        return $this->db->get('transaksi');
    }

}