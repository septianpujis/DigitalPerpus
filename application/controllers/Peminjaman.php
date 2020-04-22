<?php
    class Peminjaman extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','template'));
            $this->load->model(array('M_peminjaman','M_anggota', 'M_buku'));

            if(!$this->session->userdata('username')){
                redirect('web');
            }
        }

        function index(){
            $data['title']="Transaksi Peminjaman";
            $data['tanggalpinjam']=date('Y-m-d');
            $data['tanggalkembali']=strtotime('+7day',strtotime($data['tanggalpinjam']));
            $data['noauto']=$this->M_peminjaman->nootomatis();
            $data['anggota']=$this->M_anggota->getAnggota()->result();
            $data['tanggalkembali']=date('Y-m-d', $data['tanggalkembali']);
            $this->template->display('peminjaman/index', $data);
        }

        function tampil(){
            $data['tmp']        = $this->M_peminjaman->tampilTmp()->result();
            $data['jumlahTmp']  = $this->M_peminjaman->jumlahTmp();
            $this->load->view('peminjaman/tampil', $data);
        }

        function sukses(){
            $id_petugas = 102;
            $tmp=$this->M_peminjaman->tampilTmp()->result();
            foreach($tmp as $row){
                $info=array(
                    'id_transaksi'=>$this->input->post('nomer'),
                    'nis'=>$this->input->post('nis'),
                    'kode_buku'=>$row->kode_buku,
                    'tanggal_pinjam'=>$this->input->post('pinjam'),
                    'tanggal_kembali'=>$this->input->post('kembali'),
                    'status'=>"N",
                    'id_petugas'=> $id_petugas
                );
                $this->M_peminjaman->simpan($info);
                //hapus data di tmp
                $kodbk=$row->kode_buku;
                $this->M_peminjaman->hapusTmp($kodbk);
            }
        }

        function cariAnggota(){
            $nis=$this->input->post('nis');
            $anggota=$this->M_anggota->cari($nis);
            if($anggota->num_rows()>0){
                $anggota=$anggota->row_array();
                echo $anggota['nama'];
            }
        }

        function cariBuku(){
            $caribuku = $this->input->post('caribuku');
            $data['buku'] = $this->M_buku->cari($caribuku)->result();
            $this->load->view('peminjaman/pencarianbuku', $data);
        }

        function cariKodeBuku(){
            $kode=$this->input->post('kode');
            $buku=$this->M_buku->cek($kode);
            if($buku->num_rows()>0){
                $buku=$buku->row_array();
                echo $buku['judul']."|".$buku['pengarang']; 
            }
        }

        function tambah(){
            $kode=$this->input->post['kode'];
            $cek=$this->M_peminjaman->cekTmp($kode);
            if($cek->num_rows()<1){
                $info=array(
                    'kode_buku'=>$this->input->post('kode'),
                    'judul'=>$this->input->post('judul'),
                    'pengarang'=>$this->input->post('pengarang')
                );
                $this->M_peminjaman->simpanTmp($info);
            }
        }

        function hapus(){
            $kode=$this->input->post('kode');
            $this->M_peminjaman->hapusTmp($kode);
        }

        function pencarianbuku(){
            $cari=$this->input->post('caribuku');
            $data['buku']=$this->M_buku->cari($cari)->result();
            $this->load->view('peminjamn/pencarianbuku', $data);
        }
    }