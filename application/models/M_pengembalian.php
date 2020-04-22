<?php  
class M_pengembalian extends CI_Model {
	function cariTransaksi($no)
	{
		$query=$this->db->query("select a.*,b.nama from tp_transaksi a, tm_anggota b where a.id_transaksi='$no' and a.id_transaksi not in(select id_transaksi from tp_pengembalian) and a.nis=b.nis");
		return $query;
	}

	function tampilBuku($no)
	{
		$query=$this->db->query("select a.*,b.judul,b.pengarang from tp_transaksi a,tm_buku b where a.id_transaksi='$no' and a.id_transaksi not in(select id_transaksi from tp_pengembalian) and a.kode_buku=b.kode_buku");
		return $query;
	}

	function simpan($info){
		$this->db->insert("tp_pengembalian",$info);
	}

	function update($no,$update){
		$this->db->where("id_transaksi",$no);
		$this->db->update("tp_transaksi",$update);
	}

	function cari_by_nis($nis){
		$query=$this->db->query("select * from tp_transaksi where id_transaksi not in (select id_transaksi from tp_pengembalian) and nis like '%$nis%' group by nis");
		return $query;
	}
}
?>