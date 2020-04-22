<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
    private $table="tm_petugas";
    private $primary="id_petugas"; 


    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if (empty($order_column) || empty($order_type)) {
            $this->db->order_by($this->primary,'asc');
        } else {
            $this->db->order_by($order_column, $order_type);
        }
        return $this->db->get($this->table,$limit,$offset);
    }

    function getDataAnggota($limit, $offset){
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('tm_petugas a');
        // $this->db->where('a.nis', $nis);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.id_petugas desc');
        return $this->db->get();
    }

    function jumlah(){
        return $this->db->count_all($this->table);
    }

    function insertAnggota($tabel, $data){
        $insert = $this->db->insert($table, $data);
        return $insert;
    }


    function cek($kode){
        $this->db->where($this->primary,$kode);
        return $this->db->get($this->table);
    }

    function ceklogin($username, $password){
        $this->db->where("user", $username);
        $this->db->where("password",$password);
        return $this->db->get($this->table);
    }

    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }

    function update($kode, $jenis){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
    }

    function hapus($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }

    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("user",$cari);
        return $this->db->get($this->table);
    }
}
?>