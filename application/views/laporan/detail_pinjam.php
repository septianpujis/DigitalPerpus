<div class="col-md-6">
	<div class="form-horizontal">
		<div class="form-group">
			<label class="col-lg-5">ID Transaksi</label>
			: <?php echo $pinjam['id_transaksi'];?>
		</div>
		<div class="form-group">
			<label class="col-lg-5">Tanggal Pinjam</label>
			: <?php echo $pinjam['tanggal_pinjam'];?>
		</div>
		<div class="form-group">
			<label class="col-lg-5">Nis</label>
			: <?php echo $pinjam['nis'];?>
		</div>
      <div class="form-group">
          <label class="col-lg-5">Status</label>
          : <?php echo $pinjam['status_pinjam'];?>
      </div>
	</div>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Kode Buku</td>
			<td>Judul</td>
			<td>Pengarang</td>
		</tr>
	</thead>
	<?php $no=0; foreach($pinjamdetail as $row ): ?>
	<tr>
		<td><?php echo $row->kode_buku;?></td>
		<td><?php echo $row->judul;?></td>
		<td><?php echo $row->pengarang;?></td>
	</tr>
	<?php endforeach;?>
</table>
