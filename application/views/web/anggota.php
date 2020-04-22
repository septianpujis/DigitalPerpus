<!doctype html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Perpustakaan</title>

			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/css/datepicker.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/custom.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">						
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/morrisjs/morris.css" rel="stylesheet">
			<link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">	
		</head>
		<body>
			<!--<img src="<?php echo base_url('assets/img/3.jpg');?>" height="140px" width="100%">-->
			<!-- Static navbar -->
			<div class="navbar navbar-default">
				<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url('web');?>">Perpustakaan</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('web');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						<li class="active"><a href="<?php echo site_url('web/anggota');?>"><i class="glyphicon glyphicon-user"></i> Anggota</a></li>
					</ul>
					<div class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" role="search" action="<?php echo site_url('web/cari_anggota');?>" method="post">
							<div class="form-group">
								<input type="text" name="cari" class="form-control" placeholder="Cari Anggota">
							</div>
							<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
						</form>
					</div>
				</div><!--/.nav-collapse -->
				</div>
			</div>
			
			
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-lock"></span> Login
							</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" action="<?php echo site_url('web/proses');?>" method="post">
									<?php echo $this->session->flashdata('message');?>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label"> Username</label>
										<div class="col-sm-9">
											<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-3 control-label"> Password</label>
										<div class="col-sm-9">
											<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group last">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" class="btn btn-success btn-sm"> Login</button>
										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
							
							</div>
						</div>
					</div>
					<div class="col-md-8 ">
						<legend>Data Anggota</legend>
						<table class="table table-striped">
							<thead>
								<tr>
									<td>No.</td>
									<td>Image</td>
									<td>Nis</td>
									<td>Nama</td>
									<td>Tanggal Lahir</td>
									<td>Kelas</td>
								</tr>
							</thead>
							<?php $no=0; foreach($anggota as $row): $no++;?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php if($row->image != "") { ?>
								 	<img src="<?php echo base_url('assets/img/anggota/'.$row->image);?>" width="100px" height="100px">
								 <?php }else{ ?>
									<img src="<?php echo base_url('assets/img/anggota/images'.rand(1,5).'.jpg');?>" width="100px" height="100px">
								 <?php } ?> 
								</td>
								<td><?php echo $row->nis;?></td>
								<td><?php echo $row->nama;?></td>
								<td><?php echo $row->ttl;?></td>
								<td><?php echo $row->kelas;?></td>
							</tr>
							<?php endforeach;?>
						</table>
					</div>
				</div>
			</div>
		</body>
	</html>