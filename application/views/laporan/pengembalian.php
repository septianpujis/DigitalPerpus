<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<div class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-3">Tanggal Awal</label>
		<div class="col-lg-5">
			<input type="text" id="tanggal1" class="form-control" placeholder="yyyy-mm-dd">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3">Tanggal Selesai</label>
		<div class="col-lg-5">
			<input type="text" id="tanggal2" class="form-control" placeholder="yyyy-mm-dd">
		</div>

		<div class="col-lg-4">
			<button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
		</div>
	</div>
</div>

<div id="tampil"></div>
</div>

<!-- Modal Cari Buku -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-title"><strong>Detail Peminjaman</strong></div>
            <!-- <h4 class="modal-title"><strong>Detail Pengembalian</strong></h4> -->
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
          

            <div id="tampildetail"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Buku -->

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

<script >
	$(function() {


	   //load datatable
	   $('#dataTables-example').DataTable({
	       responsive: true
	   });
	   //datepicker
	   $("#tanggal1").datepicker({
	       format:'yyyy-mm-dd'
	   });
	   
	   $("#tanggal2").datepicker({
	       format:'yyyy-mm-dd'
	   });
	   
	   $("#tanggal").datepicker({
	       format:'yyyy-mm-dd'
	   });

		$("#tampilkan").click(function(){

         var tanggal1 = $("#tanggal1").val();
         var tanggal2 = $("#tanggal2").val();

        

         if(tanggal1 == "") {
            alert("Silahkan isi periode tanggal awal")
            $("#tanggal1").focus();
            return false;
         }
         else if(tanggal2 == ""){
            alert("Silahkan isi periode tanggal akhir")
            $("#tanggal2").focus();
            return false;
         }
         else{
            $.ajax({
                url:"<?php echo site_url('laporan/cari_pengembalian');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    $("#tampil").html(hasil);
                }
            })
         }
 	   }) //end tampilkan 

	   $('body').on('click', '.show-modal', function(){
   	  	var id_transaksi = $(this).attr("kode");
     		$.ajax({
            url:"<?php echo site_url('laporan/detail_pinjam');?>",
            type:"POST",
            data:"id_transaksi="+id_transaksi,
            cache:false,
            success:function(hasil){
            	$("#myModal3").modal("show");
               $("#tampildetail").html(hasil);
            }
         })
		});


	})
</script>

