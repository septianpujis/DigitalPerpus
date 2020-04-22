<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<?php echo validation_errors(); echo $message;?>
	<div class="form-group">
		<label class="col-lg-2 control-label">Judul Buku</label>
		<div class="col-lg-5">
			<input type="text" name="judul" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Pengarang</label>
		<div class="col-lg-5">
			<input type="text" name="pengarang" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Klasifikasi</label>
		<div class="col-lg-5">
			<input type="text" name="klasifikasi" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control" >
		</div>
	</div>
	<div class="form-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
		<a href="<?php echo site_url('buku');?>" class="btn btn-default">Kembali</a>
	</div>
</form>
</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>
