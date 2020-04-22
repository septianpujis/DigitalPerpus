<div id="page-wrapper">
    <br />
<a href="<?php echo site_url('users/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>

<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>            
            <td>Id</td>
            <td>Username</td>
            <td>Password</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($users as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_petugas;?></td>
        <td><?php echo $row->user;?></td>
        <td><?php echo md5($row->password);?></td>
        <td><a href="<?php echo site_url('users/edit/'.$row->id_petugas);?>"><i class="glyphicon glyphicon-edit"></i>Edit</a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_petugas;?>"><i class="glyphicon glyphicon-trash"></i>Hapus</a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php echo $pagination;?>


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
    $(function() {
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");

            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });

        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();

            $.ajax({
                url:"<?php echo site_url('users/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('users/index/delete-success');?>";
                }
            });
        });
    });
</script>
</div>