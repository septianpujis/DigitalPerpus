<?php
class Anggota extends CI_Controller {
    private $limit=20;

    function __construct(){
        parent::__construct();

        $this->load->library(array('template', 'pagination', 'form_validation','upload'));
        $this->load->model('M_anggota');

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

    function index($offset=0,$order_column='nis',$order_type='asc'){
        if (empty($offset)) $offset=0;
        if (empty($order_column)) $order_column='nis';
        if (empty($order_type)) $order_type='asc';
        
        //load data
        $data['anggota']=$this->M_anggota->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Anggota";

        $config['base_url']=site_url('anggota/index/');
        $config['total_rows']=$this->M_anggota->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();

        if ($this->uri->segment(3)=="delete_success") {
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        }elseif ($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data berhasil disimpan</div>";
        }else{
            $data['message']='';
            $this->template->display('anggota/index',$data);
        }
    }

    function edit($id) {
        $data['title']="Edit data Anggota";
        $this->_set_rules();
        if ($this->form_validation->run()==true) {
            $nis=$this->input->post('nis');

            //config upload img
            $config['upload_path']='./assets/img/anggota/';
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
                'nama'=>$this->input->post('nama'),
                'kelas'=>$this->input->post('kelas'),
                'ttl'=>$this->input->post('ttl'),
                'jk'=>$this->input->post('jk'),
                'image'=>$gambar
            );

            //update data anggota
            $this->M_anggota->update($nis,$info);

            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";

            //tampilkan data Anggota
            $data['anggota']=$this->M_anggota->cek($id)->row_array();
            $this->template->display('anggota/edit', $data);
        }else{
            $data['anggota']=$this->M_anggota->cek($id)->row_array();
            $data['message']="";
            $this->template->display('anggota/edit',$data);
        }
    }

    function tambah(){
        $data['title']="Tambah Anggota";
        $this->_set_rules();
        //apabila user mengkosongkan form input
        if($this->form_validation->run()==true){
            $nis = $this->input->post('nis');
            $cek = $this->M_anggota->cek($nis);
            //cek nis yg sudah digunakan
            if($cek->num_rows() > 0){
                $data['message'] = "<div class='alert alert-block alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <p><strong><i class='icon-ok'></i>NIS</strong> Sudah Digunakan...!</p></div>"; 
                $this->template->display('anggota/tambah',$data);
            }else{
                $nama = $this->slug($this->input->post('nama'));
                $config['upload_path']   = './assets/img/anggota/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
                $config['max_size']      = '1000';
                $config['max_width']     = '2000';
                $config['max_height']    = '1024';
                $config['file_name']     = $nama; 
                        
                $this->upload->initialize($config);

                 //apabila ada gambar yg diupload
                if ($this->upload->do_upload('gambar')){
                    
                    $image = $this->upload->data();

                    $info  = array(
                    'nis'   => $this->input->post('nis'),
                    'nama'  => $this->input->post('nama'),
                    'jk'    => $this->input->post('jk'),
                    'ttl'   => $this->input->post('ttl'),
                    'kelas' => $this->input->post('kelas'),
                    'image' => $image['file_name']
                    );

                    $this->M_anggota->simpan($info);
                    redirect('./anggota/index/add-success');
                }else{ //apabila tidak ada gambar yg diupload
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                    $this->template->display('anggota/tambah',$data);
                } 
            }
        }else{
            $data['message']="";
            $this->template->display('anggota/tambah',$data);
        }
    }


    function hapus() {
        $kode=$this->input->post('kode');
        $detail=$this->M_anggota->cek($kode)->result();
        foreach($detail as $det):
            unlink("assets/img/anggota/".$det->image);
        endforeach;
        $this->M_anggota->hapus($kode);
    }

    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->M_anggota->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['anggota']=$cek->result();
            $this->template->display('anggota/cari',$data);
        }else{
            $data['message']="<div class='alert alert-warning'>Data tidak ditemukan</div>";
            $data['anggota']=$cek->result();
            $this->template->display('anggota/cari',$data);
        }
    }

    function _set_rules() {
        $this->form_validation->set_rules('nis','NIS','required|max_length[10]');
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
        $this->form_validation->set_rules('jk','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_rules('ttl','Tanggal Lahir','required');
        $this->form_validation->set_rules('kelas','Kelas','required|max_length[10]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}