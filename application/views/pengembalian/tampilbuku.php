<table class="table table-striped">
	<thead>
		<tr>
			<td>Kode Buku</td>
			<td>Judul</td>
			<td>Pengarang</td>
			<td></td>
		</tr>
	</thead>
	<?php $no=0; foreach($buku as $row): ?>
	<tr>
		<td><?php echo $row->kode_buku;?></td>
		<td><?php echo $row->judul;?></td>
		<td><?php echo $row->pengarang;?></td>
		
	</tr>
	<?php endforeach;?>
</table>