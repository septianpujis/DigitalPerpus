<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<table class="table table-striped">
	<thead>
		<tr>
			<td>No.</td>
			<td>Kode Buku</td>
			<td>Judul</td>
			<td>Pengarang</td>
			<td>Klasifikasi</td>
		</tr>
	</thead>
	<?php $no=0; foreach($buku as $row ): $no++;?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $row->kode_buku;?></td>
		<td><?php echo $row->judul;?></td>
		<td><?php echo $row->pengarang;?></td>
		<td><?php echo $row->klasifikasi;?></td>
	</tr>
	<?php endforeach;?>
</table>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->