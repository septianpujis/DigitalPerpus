<?php  
class M_laporan extends CI_Model {
	
	function semuaAnggota(){
		return $this->db->get("tm_anggota");
	}

	function semuaBuku(){
		return $this->db->get("tm_buku");
	}

	function detailpeminjaman($tanggal1,$tanggal2){
		return $this->db->query("select * from tp_transaksi where tanggal_pinjam between '$tanggal1' and '$tanggal2' group by id_transaksi");
	}

	function detail_pinjam($id){
		return $this->db->query("SELECT a.*,b.kode_buku,b.judul, b.pengarang, 
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih di pinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM tp_transaksi a, tm_buku b 
                                 WHERE a.id_transaksi = '$id' 
                                 AND a.kode_buku = b.kode_buku");
	}

	function detailpengembalian($tanggal1,$tanggal2){
		return $this->db->query("select * from tp_pengembalian where tgl_pengembalian between '$tanggal1' and '$tanggal2' group by id_transaksi");
	}
}
?>