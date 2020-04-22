<table class="table table-striped">
	<thead>
		<tr>
			<td>No.</td>
			<td>ID Transaksi</td>
			<td>Tanggal pengembalian</td>
			<td>Denda</td>
		</tr>
	</thead>
	<?php $no=0; foreach($lap as $row ): $no++;?>
	<tr>
		<td><?php echo $no;?></td>
		<td><a class="show-modal" kode="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
		<td><?php echo $row->tgl_pengembalian;?></td>
		<td><?php echo $row->nominal;?></td>
	</tr>
	<?php endforeach;?>
</table>
