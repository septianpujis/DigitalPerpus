<table class="table table-striped">
	<thead>
		<tr>
			<td>Kode Buku</td>
			<td>Judul</td>
			<td>Pengarang</td>
			<td></td>
		</tr>
	</thead>
	<?php $no=0; foreach($tmp as $tmp ): ?>
	<tr>
		<td><?php echo $tmp->kode_buku;?></td>
		<td><?php echo $tmp->judul;?></td>
		<td><?php echo $tmp->pengarang;?></td>
		<td><a href="#" class="hapus" kode="<?php echo $tmp->kode_buku;?>">
			<i class="glyphicon glyphicon-trash"></i></a></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="2">Total Buku</td>
		<td colspan="2"><input class="form-control" type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>"></td>
	</tr>
</table>