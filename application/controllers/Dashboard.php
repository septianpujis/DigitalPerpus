<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('M_users');
        $this->load->library(array('form_validation','template'));

        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }

    function index(){
        $data['title']="Home";
        $this->template->display('dashboard/index', $data);
    }

    function petugas(){
        $data['title']="Data Petugas";
        $data['petugas']=$this->M_users->semua()->result();
        if($this->uri->segment(3)=="delete_success"){
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        }elseif($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data berhasil disimpan</div>";
        }else{
            $data['message']='';
        }
        $this->template->display('dashboard/petugas', $data);
    }

    function tambahpetugas(){
        $data['title']="Tambah Petugas";
        $this->_set_rules();
        if ($this->form_validation->run()==true) {
            $user=$this->input->post('user');
            $cek=$this->M_petugas->cekKode($user);
            if ($cek->num_rows()>0) {
                $data['message']="<div class='alert alert-danger'>Username sudah digunakan</div>";
                $this->template->display('dashboard/tambahpetugas', $data);
            }else{
                $info=array(
                    'user'=>$this->input->post('user'),
                    'password'=>md5($this->input->post('password'))
                );
                $this->M_petugas->petugas->simpan($info);
                redirect('dashboard/petugas/add_success');
            }
        }else {
            $data['message']="";
            $this->template->display('dashboard/tambahpetugas', $data);
        }
    }

    function edit($id){
        $data['title']="Update data Petugas";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'user'=>$this->input->post('user'),
                'password'=>md5($this->input->post('password'))
            );
            $this->M_petugas->update($id, $info);
            $data['petugas']=$this->M_petugas->cekId($id)->row_array();
            $data['messages']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template->displat('dashboard/editpetugas', $data);
        }else {
            $data['message']="";
            $data['petugas']=$this->M_petugas->cekId($id)->row_array();
            $this->template->display('dashboard/editpetugas', $data);
        }
    }

    function hapus(){
        $kode=$this->input->post('kode');
        $this->M_petugas->hapus($kode);
    }

    function _set_rules(){
        $this->form_validation->set_rules('user','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }

    
}