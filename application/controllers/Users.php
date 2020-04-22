<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    private $limit=20;
    function __construct(){
        parent::__construct();

        $this->load->library(array('template', 'pagination', 'form_validation','upload'));
        $this->load->model('M_users');

        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='user',$order_type='asc'){
        if (empty($offset)) $offset=0;
        if (empty($order_column)) $order_column='user';
        if (empty($order_type)) $order_type='asc';
        
        //load data
        $data['users']=$this->M_users->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data users";

        $config['base_url']=site_url('users/index/');
        $config['total_rows']=$this->M_users->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();

        if ($this->uri->segment(3)=="delete_success") {
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        }
        elseif ($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data berhasil disimpan</div>";
        }
        else{
            $data['message']='';
            $this->template->display('users/index',$data);
        }
    }

    function edit($id) {
        $data['title']="Edit data users";
        $this->_set_rules();
        if ($this->form_validation->run()==true) {
            $idp=$this->input->post('id_petugas');

            //config upload img
            $config['upload_path']='./assets/img/users/';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']='1000';
            $config['max_width']='2000';
            $config['max_height']='1024';

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')) {
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }

            $info=array(
                'user'=>$this->input->post('user'),
                'password'=>$this->input->post('password'),
            );

            //update data users
            $this->M_users->update($idp,$info);

            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";

            //tampilkan data users
            $data['users']=$this->M_users->cek($id)->row_array();
            $this->template->display('users/edit', $data);
        }else{
            $data['users']=$this->M_users->cek($id)->row_array();
            $data['message']="";
            $this->template->display('users/edit',$data);
        }
    }

    function tambah() {
        $data['title']="Tambah Data users";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_petugas=$this->input->post('id_petugas');
            $cek=$this->M_users->cek($id_petugas);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>Nis sudah digunakan</div>";
                $this->template->display('users/tambah',$data);
            }else{
                //config upload img
                $config['upload_path']='./assets/img/users/';
                $config['allowed_types']='gif|jpg|png';
                $config['max_size']='1000';
                $config['max_width']='2000';
                $config['max_height']='1024';

                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }

                $info=array(
                    'user'=>$this->input->post('user'),
                    'password'=>$this->input->post('password'),
                );
                $this->M_users->simpan($info);
                redirect('./users/index/add-success');
            }

        }else{
            $data['message']="";
            $this->template->display('users/tambah',$data);
        }
    }

    function hapus() {
        $kode=$this->input->post('kode');
        $detail=$this->M_users->cek($kode)->result();
        foreach($detail as $det):
            unlink("assets/img/users/".$det->image);
        endforeach;
        $this->M_users->hapus($kode);
    }

    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->M_users->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['users']=$cek->result();
            $this->template->display('users/cari',$data);
        }else{
            $data['message']="<div class='alert alert-warning'>Data tidak ditemukan</div>";
            $data['users']=$cek->result();
            $this->template->display('users/cari',$data);
        }
    }

    function _set_rules() {
        $this->form_validation->set_rules('user','Username','required|max_length[30]');
        $this->form_validation->set_rules('password','Password','required|max_length[30]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}