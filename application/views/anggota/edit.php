<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<?php echo validation_errors(); ?>
<?php echo $message; ?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
 	<div class="form-group">
		<label class="col-lg-2 control-label">Nis</label>
		<div class="col-lg-5">
			<input type="text" name="nis" class="form-control" value="<?php echo $anggota['nis'];?>" readonly="readonly">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-5">
			<input type="text" name="nama" class="form-control" value="<?php echo $anggota['nama'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Kelamin</label>
		<div class="col-lg-5">
			<select name="jk" class="form-control">
				<option value="<?php echo $anggota['jk'];?>"><?php echo $anggota['jk'];?></option>
				<option value="L">Laki_laki</option>
				<option value="P">Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Tanggal Lahir</label>
		<div class="col-lg-5">
			<input type="text" name="ttl" id="tanggal" class="form-control" value="<?php echo $anggota['ttl'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Kelas</label>
		<div class="col-lg-5">
			<input type="text" name="kelas" class="form-control" value="<?php echo $anggota['kelas'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Foto</label>
		<div class="col-lg-5">
			<?php if($anggota['image'] != "") { ?>
				<img src="<?php echo base_url('assets/img/anggota/'.$anggota['image']);?>" width="200px" height="200px">
			<?php }else{ ?>
				<h1>Gambar Tidak Ditemukan</h1>
			<?php } ?> 
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label"></label>
		<div class="col-lg-5">
			<input type="file" name="gambar" class="form-control" >
		</div>
	</div>
	<div class="form-group well">
		<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
		<a href="<?php echo site_url('anggota');?>" class="btn btn-default">Kembali</a>
	</div>
</form>
</div>