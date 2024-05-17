<script type="text/javascript" src="javascript/script_obat.js"> </script>
<?php include "../library/function_form_modal.php";?>
<?php include "../library/function_view.php";?>
    <!-- Content Header (Page header) -->
    <?php header_page("Data Obat","Master","Obat"); ?>

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
              <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-obat" onclick="resetForm()"><i class="fa fa-plus"></i> Tambah Data</button>
              
            </div>
            <!-- /.box-header -->
            <?php create_table(array("Nama Obat","Kadaluarsa","Harga Jual","Stok","Satuan","Aksi")); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
 <?php           
            open_form('modal-primary','modal-obat','Tambah Data Obat');
            create_textbox("Nama Obat","namaObat","text",5,"","required");
            create_datepicker("Tanggal Beli","tanggalBeli",5,"required");
            create_datepicker("Tanggal Expired","tanggalExpired",5,"required");
            create_textbox("Harga Beli","hargaBeli","number",5,"","required");
            create_textbox("Harga Jual","hargaJual","number",5,"","required");
            create_textbox("Stok","stok","number",5,"","required");
            $list = array();
            $list[] = array('Butir', 'Butir');
            $list[] = array('Botol', 'Botol');
            $list[] = array('Papan', 'Papan');
            create_combobox("Satuan","satuan",$list,3,"","required");
            create_textbox("Merk","brand","text",5,"","required");
            close_form();

?>