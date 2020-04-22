<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<?php echo validation_errors(); echo $message;?>
	<div class="form-group">
		<label class="col-lg-2 control-label">Kode Buku</label>
		<div class="col-lg-5">
			<input type="text" name="kode" class="form-control" value="<?php echo $buku['kode_buku'];?>" readonly="readonly">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Judul Buku</label>
		<div class="col-lg-5">
			<input type="text" name="judul" class="form-control" value="<?php echo $buku['judul'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Pengarang</label>
		<div class="col-lg-5">
			<input type="text" name="pengarang" class="form-control" value="<?php echo $buku['pengarang'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Klasifikasi</label>
		<div class="col-lg-5">
			<input type="text" name="klasifikasi" class="form-control" value="<?php echo $buku['klasifikasi'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Gambar</label>
		<div class="col-lg-5">
			<?php if($buku['image'] != "") { ?>
				<img src="<?php echo base_url('assets/img/buku/'.$buku['image']);?>" width="280px" height="380px">
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
		<a href="<?php echo site_url('buku');?>" class="btn btn-default">Kembali</a>
	</div>
</form>
</div>