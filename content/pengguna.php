<script type="text/javascript" src="javascript/script_pengguna.js"> </script>
<?php include "../library/function_form_modal.php";?>
<?php include "../library/function_view.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Data Pengguna","Master","Pengguna"); ?>

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
              <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pengguna" onclick="resetForm()"><i class="fa fa-plus"></i> Tambah Data</button>
              
            </div>
            <!-- /.box-header -->
            <?php create_table(array("Nama Pengguna","Username","Level","Aksi")); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
 <?php           
            open_form('modal-primary','modal-pengguna','Tambah Data Pengguna');
            create_textbox("Nama Lengkap","namaPengguna","text",5,"","required");
            create_textbox("Username","username","text",5,"","required");
            create_textbox("Password","password","password",5,"","required");
            create_textbox("Photo","photo","file",5,"","");
            $list = array();
            $list[] = array('dr', 'Dokter');
            $list[] = array('cs', 'Customer Service');
            create_combobox("Level","level",$list,5,"","required");
            close_form();

?>