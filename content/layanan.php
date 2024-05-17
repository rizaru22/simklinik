<script type="text/javascript" src="javascript/script_layanan.js"> </script>
<?php include "../library/function_form_modal.php";?>
<?php include "../library/function_view.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Data Layanan","Master","Layanan"); ?>

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
              <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-layanan" onclick="resetForm()"><i class="fa fa-plus"></i> Tambah Data</button>
              
            </div>
            <!-- /.box-header -->
            <?php create_table(array("Nama Layanan","Tarif","Aksi")); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
 <?php           
            open_form('modal-primary','modal-layanan','Tambah Data Layanan');
            create_textbox("Nama Layanan","namaLayanan","text",5,"","required");
            create_textbox("Tarif","tarif","number",5,"","required");
            close_form();

?>