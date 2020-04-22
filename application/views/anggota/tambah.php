<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<?php echo validation_errors(); ?>
<?php echo $message; ?>
<?php echo form_open_multipart('anggota/tambah', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-lg-2 control-label">NIS</label>
		<div class="col-lg-5">
			<input type="text" name="nis" class="form-control" placeholder="NIS" value="<?php echo set_value('nis'); ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-5">
			<input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
		<div class="col-lg-5">
			<select name="jk" class="form-control">
				<option></option>
				<option value="L" <?php echo set_select('jk','L'); ?>>Laki-laki</option>
				<option value="P" <?php echo set_select('jk','P'); ?>>Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Tanggal Lahir</label>
		<div class="col-lg-5">
			<input type="date" name="ttl" id="tanggal" class="form-control" placeholder="YYYY/MM/DD"  value="<?php echo set_value('ttl'); ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Kelas</label>
		<div class="col-lg-5">
			<input type="text" name="kelas" class="form-control"  placeholder="Kelas"  value="<?php echo set_value('kelas'); ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Foto</label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control"  value="<?php echo set_value('gambar'); ?>">
		</div>
	</div>
	<div class="form-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
		<a href="<?php echo site_url('anggota');?>" class="btn btn-default">Kembali</a>
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

<script>
$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})
