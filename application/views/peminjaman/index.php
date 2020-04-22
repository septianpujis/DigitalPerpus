<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<div class="panel panel-default">
	<div class="panel-body">
		<form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">No. Transaksi</label>
					<div class="col-lg-7">
						<input type="text" id="no" name="no" class="form-control" value="<?php echo $noauto;?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tgl Pinjam</label>
					<div class="col-lg-7">
						<input type="text" id="pinjam" name="pinjam" class="form-control" value="<?php echo $tanggalpinjam;?>" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tgl Kembali</label>
					<div class="col-lg-7">
						<input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo $tanggalkembali;?>" readonly="readonly">
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">Nis</label>
					<div class="col-lg-7">
						<select name="nis" class="form-control" id="nis">
							<option></option>
							<?php foreach($anggota as $anggota):?>
								<option value="<?php echo $anggota->nis;?>"><?php echo $anggota->nis;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama Siswa</label>
					<div class="col-lg-7">
						<input type="text" name="nama" id="nama" class="form-control">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
	
	<div class="panel panel-default">
        <div class="panel-heading">Data Buku</div>
	
	<div class="panel-body">
		<div class="form-inline">
			<div class="form-group">
				<label>Kode Buku</label>
				<input type="text" class="form-control" id="kode" placeholder="Kode Buku">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="judul" placeholder="Judul Buku" readonly="readonly">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="pengarang" placeholder="Pengarang" readonly="readonly">
			</div>
			<div class="form-group">
				<button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
			</div>
			<div class="form-group">
				<button id="cari" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
			</div>
			<div id="tampil"></div>
		</div>

	</div>
	


	<div class="panel-footer">
		<button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
	</div>
</div>
</div>

		<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cari Buku</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<label class="col-lg-3"><h5>Cari Nama Buku</h5></label>
					<div class="col=lg-5">
						<input type="text" name="caribuku" id="caribuku" class="form-control">
                        <div id="tampilbuku"></div>
					</div>
				</div>

			

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

<script>
$(document).ready(function() {

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData(){
        $("#tampil").load("<?php echo site_url('peminjaman/tampil') ?>");
    }
    loadData();

    //function buat mengkosong form data buku setelah di tambah ke tmp
    function kosong(){
        $("#kode_buku").val("");
        $("#judul").val("");
        $("#pengarang").val("");
    }

    //ambil data anggota berdasarkan nis
    // $("#nis").click(function(){
    $("#nis").change(function(){    
        var nis = $("#nis").val();
        
        $.ajax({
            url:"<?php echo site_url('peminjaman/cariAnggota');?>",
            type:"POST",
            data:"nis="+nis,
            cache:false,
            success:function(html){
                $("#nama").val(html);
            }
        })
    });

    //show modal search buku
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search buku
    $("#caribuku").keyup(function(){
        var caribuku = $('#caribuku').val();

         $.ajax({
            url:"<?php echo site_url('peminjaman/cariBuku');?>",
            type:"POST",
            data:"caribuku="+caribuku,
            cache:false,
            success:function(hasil){
                $("#tampilbuku").html(hasil);
            }
        })
    })
    //tambah buku dari modal ke form

    $('body').on('click', '.tambah', function(){
        
        var kode_buku = $(this).attr("kode");
        var judul     = $(this).attr("judul");
        var pengarang = $(this).attr("pengarang");
        
        $("#kode").val(kode_buku);
        $("#judul").val(judul);
        $("#pengarang").val(pengarang);

        $("#myModal2").modal("hide");
        //console.log(kode_buku);
       
    });
   
    //event keypress cari kode
    $("#kode").keypress(function(){
        //13 adalah kode asci buat enter
        if(event.which == 13) {
            var kode = $("#kode").val();

            $.ajax({
                url:"<?php echo site_url('peminjaman/cariKodeBuku');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Buku Tidak ditemukan");
                       $("#judul").val("");
                       $("#pengarang").val("");
                   }else{
                       $("#judul").val(data[0]);
                       $("#pengarang").val(data[1]);
                       $("#tambah").focus();
                   }
                }
            })
        }
    }) //end event keypress
        //tambah_buku ke tmp
    $("#tambah").click(function(){
        
        var kode = $("#kode").val();
        var judul     = $("#judul").val();
        var pengarang = $("#pengarang").val();
        if(kode == "") {
            alert("Kode Masih Kosong ");
            $("#kode").focus();
            return false;
        }else if(judul == ""){
            alert("Judul Masih Kosong ");
            return false;
        }else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/tambah');?>",
                type:"POST",
                data:"kode="+kode+"&judul="+judul+"&pengarang="+pengarang,
                cache:false,
                success:function(hasil){
                    loadData();
                    kosong();
                 }
            })
        }

    }) //end tambahbuku 

    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('peminjaman/hapus');?>",
            type:"POST",
            data:"kode="+kode,
            cache:false,
            success:function(hasil){
                loadData();
            }
        })
    }); //end delete table tmp

    $('body').on('click', '#simpan', function(){    
        //tampung data dari form buat dikirim 
        var nomer = $("#no").val();
        var pinjam   = $("#pinjam").val();
        var kembali  = $("#kembali").val();
        var nis      = $("#nis").val();
        var jumlah   = parseInt($("#jumlahTmp").val(), 10);

        //cek nis jika kosong 
        if(nis == "") {
            alert("Pilih Nis Siswa");
            $("#nis").focus();
            return false;
        }else if(jumlah == 0){
            alert("Pilih Buku yang di pinjam");
            return false;
        }else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/sukses');?>",
                type:"POST",
                data:"nomer="+nomer+"&pinjam="+pinjam+"&kembali="+kembali+
                "&nis="+nis+"&jumlah="+jumlah,
                cache:false,
                success:function(hasil){
                  alert("Transaksi Peminjaman Berhasil");
                  location.reload();
                }
            })
        }
        
    })




});
</script>