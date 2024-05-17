<script type="text/javascript" src="javascript/script_pendaftar.js"> </script>
<?php include "../library/function_form_modal.php";?>
<?php include "../library/function_view.php";?>
<?php include "../library/config.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Pendaftaran","Pendaftaran",""); ?>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->


    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <!--<h3 class="box-title">Data Table With Full Features</h3>-->
              <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pendaftar" onclick="resetForm()"><i class="fa fa-plus"></i> Tambah Data</button>
              
            </div>
            <!-- /.box-header -->
            <?php create_table(array("Nomor RM","Nama Pasien","Status","Aksi")); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
 <?php           
            open_form('modal-primary','modal-pendaftar','Tambah Data Pendaftar');
            $list=array();
            $query=mysqli_query($mysqli,"SELECT noRM,nama FROM pasien");
            while($r=mysqli_fetch_array($query)){
              $list[]=array($r[0],$r[0].'-'.$r[1]);
            }
            create_combo_cari("Pasien","pasien",$list,"required");
            close_form();

?>