<?php
class Buku extends CI_Controller{
    private $limit=20;

    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->model('M_buku');

        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }

    function slug($s){
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function index($offset=0, $order_column='kode_buku',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='kode_buku';
        if(empty($order_type)) $order_type='asc';

        //load data
        $data['buku']=$this->M_buku->semua($this->limit, $offset, $order_column, $order_type)->result();
        $data['title']="Data Buku";        

        //buku index/anggota index
        $config['base_url']=site_url('buku/index/');
        $config['total_rows']=$this->M_buku->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();


        if($this->uri->segment(3)=="delete_success"){
            $data['message']="<div class='alert alert-success'>Data Berhasil dihapus</div>";
        }elseif ($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        }else{
            $data['message']="";
            $this->template->display('buku/index',$data);
        }
    }

    function tambah(){
        $data['title']="Tambah Buku";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            //jika form validation dijalankan dan benar
            $kode=$this->input->post('kode'); //mendapat input dari kode
            $cek=$this->M_buku->cek($kode); //cek kode di database
            if($cek->num_rows()>0){ //jika kode ada maka akan menampilkan pesan
                $data['message']="<div class='alert alert-danger'>Kode buku sudah ada</div>";
                $this->template->display('buku/tambah', $data);
            }else{ //jika kode buku belum maka save
                    //config upload image
                $nama = $this->slug($this->input->post('judul'));
                $config['upload_path']='./assets/img/buku/';
                $config['allowed_types']='gif|jpg|png';
                $config['max_size']='1500';
                $config['max_width']='2000';
                $config['max_height']='1024';
                $config['file_name']= $nama;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')){
                    
                    $image = $this->upload->data();

                    $info  = array(
                    'kode_buku'=>$this->input->post('kode'),
                    'judul'=>$this->input->post('judul'),
                    'pengarang'=>$this->input->post('pengarang'),
                    'klasifikasi'=>$this->input->post('klasifikasi'),
                    'image' => $image['file_name']
                    );

                    $this->M_buku->simpan($info);
                    redirect('./buku/index/add-success');
                }else{ //apabila tidak ada gambar yg diupload
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                    $this->template->display('buku/tambah',$data);
                }
            }
        }else{
            $data['message']="";
            $this->template->display('buku/tambah',$data);
        }
    }

    function edit($id) {
        $data['title']="Edit data Buku";
        $this->_set_rules();
        if ($this->form_validation->run()==true) {
            $kode=$this->input->post('kode');

            //config upload img
            $config['upload_path']='./assets/img/buku/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']='1000';
            $config['max_width']='1400';
            $config['max_height']='1900';

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')) {
                $gambar="";

            }else{
                $gambar=$this->upload->file_name;
            }

            $info=array(
                'judul'=>$this->input->post('judul'),
                'pengarang'=>$this->input->post('pengarang'),
                'klasifikasi'=>$this->input->post('klasifikasi'),
                'image'=>$gambar
            );

            //update data anggota
            $this->M_buku->update($kode,$info);

            //tampilkan data Anggota
            $data['buku']=$this->M_buku->cek($id)->row_array();

            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";

            $this->template->display('buku/edit',$data);
        }else{
            $data['buku']=$this->M_buku->cek($id)->row_array();
            $data['message']="";
            $this->template->display('buku/edit',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $detail=$this->M_buku->cek($kode)->result();
        foreach($detail as $det):
            unlink("assets/img/".$det->image);
        endforeach;
        $this->M_buku->hapus($kode);
    }

    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->M_buku->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }else{
            $data['message']="<div class='alert alert-warning'>Data tidak ditemukan</div>";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }
    }

    function _set_rules() {
        $this->form_validation->set_rules('judul','Judul Buku','required|max_length[100]');
        $this->form_validation->set_rules('pengarang','Pengarang','required|max_length[50]');
        $this->form_validation->set_rules('klasifikasi','Klasifikasi','required|max_length[25]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}