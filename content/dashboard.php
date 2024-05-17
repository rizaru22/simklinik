<script type="text/javascript" src="javascript/script_dashboard.js"> </script>
<?php include "../library/function_view.php"; ?>
<?php include "../library/function_date.php"; ?>
<?php include "../data/data_dashboard.php"?>
<section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <div class="row">
     
        <?php
        
            small_box('aqua',getCountJmlPasien(),'Pasien','ios-people','content/pasien.php');
            small_box('yellow',getCountJmlPendaftaran(),'Pendaftaran','stats-bars','content/pendaftaran.php');
            small_box('green',getCountJmlObatKosong(),'Obat Habis ','medkit','content/obat.php');
            small_box('red',getCountPendapatanHariIni(),'Pendapatan','pie-graph','content/tampil_laporan_harian.php?tanggal='.date("Y-m-d"));
            
        ?>
      </div>
       <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border"> <h3 class="box-title">Data Pasien Berobat Hari Ini -  <?php 
           echo tgl_indonesia(date("Y-m-d"));
            ?></h3></div>
        <?php create_table(array("Nomor RM","Nama Pasien","Status","Total Biaya",)); ?>
           
          </div>
        </div>
       </div>
    </section>
    <!-- /.content -->

    