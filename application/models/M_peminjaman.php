<?php  
class M_peminjaman extends CI_Model {
	private $table="tp_transaksi";

	function nootomatis(){

		$today = date('Ymd');
        $data = $this->db->query("SELECT MAX(id_transaksi) AS last FROM $this->table ")->row_array();
        $lastNoFaktur = $data['last'];
        $lastNoUrut   = substr($lastNoFaktur,8,3);
        $nextNoUrut   = $lastNoUrut+1;        
        $nextNoTransaksi = $today.sprintf('%03s',$nextNoUrut);        
        return $nextNoTransaksi;
	}
	
	function getAnggota(){
		return $this->db->get("tm_anggota");
	}

	function cariAnggota($nis){
		$this->db->where("nis",$kode);
		return $this->db->get("tm_anggota");
	}

	function cariBuku($kode){
		$this->db->where("kode_buku",$kode);
		return $this->db->get("tm_buku");
	}

	function simpanTmp($info){
		$this->db->insert("tp_tmp",$info);
	}

	function tampilTmp(){
		return $this->db->get("tp_tmp");
	}

	function cekTmp($kode){
		$this->db->where("kode_buku",$kode);
		return $this->db->get("tp_tmp");
	}

	function jumlahTmp(){
		return $this->db->count_all("tp_tmp");
	}

	function hapusTmp($kode){
		$this->db->where("kode_buku",$kode);
		$this->db->delete("tp_tmp");
	}

	function simpan($info){
		$this->db->insert($this->table,$info);
	}

	function pencarianbuku($cari){
		$this->db->like("judul",$cari);
		return $this->db->get("buku");
	}
}
?>