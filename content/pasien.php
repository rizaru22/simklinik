<script type="text/javascript" src="javascript/script_pasien.js"> </script>
<?php include "../library/function_form_modal.php";?>
<?php include "../library/function_view.php";?>
    <!-- Content Header (Page header) -->
   
    <?php header_page("Data Pasien","Master","Pasien"); ?>


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
              <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-pasien" onclick="resetForm()"><i class="fa fa-plus"></i> Tambah Data</button>
             <!--<button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Formulir</button>-->
            </div>
            <!-- /.box-header -->
            <?php create_table(array("NoRM","Nama","NIK","No.HP","Aksi")); ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
<?php 
open_form('modal-primary','modal-pasien','Tambah Data Pasien');

create_textbox("No. KTP / NIK", "nik", "number", 6, "", "required");
create_textbox("Nama Lengkap", "nama", "text", 6, "", "required");
create_textbox("Tempat Lahir", "tempatLahir", "text", 6, "", "required");
//tanggal
//create_textbox("Tanggal Lahir","tanggalLahir","text",6,"datepicker","required"); 
create_datepicker("Tanggal Lahir","tanggalLahir",3,"required");
//jk
$list = array();
$list[] = array('L', 'Laki-Laki');
$list[] = array('P', 'Perempuan');
create_combobox("Jenis Kelamin","jk",$list,3,"","required");
//golongan darah
$list = array();
$list[] = array('A', 'A');
$list[] = array('AB', 'AB');
$list[] = array('B', 'B');
$list[] = array('O', 'O');
create_combobox("Golongan Darah","goDa",$list,3,"","required");
create_textbox("Nomor HP", "noHp", "number", 6, "", "required");
create_textarea("Alamat","alamat","","required");
close_form();
?>


