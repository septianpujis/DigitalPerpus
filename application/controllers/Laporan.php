<?php class Laporan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library(array('template'));
        $this->load->model('M_laporan');

        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }

    function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->M_laporan->semuaAnggota()->result();
        $this->template->display('laporan/anggota', $data);
    }

    function buku(){
        $data['title']="Data Buku";
        $data['buku']=$this->M_laporan->semuaBuku()->result();
        $this->template->display('laporan/buku', $data);
    }

    function peminjaman(){
        $data['title']="Laporan Peminjaman";
        $this->template->display('laporan/peminjaman', $data);
    }

    function cari_pinjaman(){
        $data['title']="Detail Peminjaman";
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->M_laporan->detailpeminjaman($tanggal1,$tanggal2)->result();
        $this->load->view('laporan/cari_pinjaman', $data);
    }

    function detail_pinjam(){
        $id_transaksi = $this->input->post('id_transaksi');
        $data['title']=$id_transaksi;
        $data['pinjam']=$this->M_laporan->detail_pinjam($id_transaksi)->row_array();
        $data['pinjamdetail']=$this->M_laporan->detail_pinjam($id_transaksi)->result();
        $this->load->view('laporan/detail_pinjam', $data);
    }

    function pengembalian(){
        $data['title']="Data Pengembalian";
        $this->template->display('laporan/pengembalian', $data);
    }
    function cari_pengembalian(){
        $data['title']="Detail Pengembalian";
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->M_laporan->detailpengembalian($tanggal1, $tanggal2)->result();
        $this->load->view('laporan/cari_pengembalian', $data);
    }
}