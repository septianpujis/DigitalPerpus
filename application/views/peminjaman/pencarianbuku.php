<br /><br />
<table class="table table-striped">
	<thead>
		<tr>
			<td>Kode Buku</td>
			<td>Judul</td>
			<td>Pengarang</td>
			<td></td>
		</tr>
	</thead>
	<?php $no=0; foreach($buku as $tmp ): ?>
	<tr>
		<td><?php echo $tmp->kode_buku;?></td>
		<td><?php echo $tmp->judul;?></td>
		<td><?php echo $tmp->pengarang;?></td>
		<td><a href="#" class="tambah" kode="<?php echo $tmp->kode_buku;?>" judul="<?php echo $tmp->judul;?>" pengarang="<?php echo $tmp->pengarang;?>">
			<i class="glyphicon glyphicon-plus"></i></a></td>
	</tr>
	<?php endforeach;?>
</table>