<html><head>
<link rel='stylesheet' href='../bower_components/bootstrap/dist/css/bootstrap.min.css'>

  <!-- Font Awesome -->
  <link rel='stylesheet' href='../bower_components/font-awesome/css/font-awesome.min.css'>
  <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<?php include "../library/function_view.php";?>

<?php include "../library/function_date.php";?>
<?php include "../library/function_rupiah.php";?>
<?php include "../library/config.php";?>
    <!-- Content Header (Page header) -->
    <style>
@page{
	margin:0;
    border:0;
}    
    .borderless td, .borderless th,.borderless tr {
border: none;
padding: 5px;
border-collapse: separate; 
border-spacing: 5px;
white-space: nowrap;
}

.spacer5 {
    height: 30px;
  }

</style>
</head>
<body>

    <!-- Main content -->
    <section class="content container-fluid">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                       <img src="../images/kopsurat.png">
                    </h2>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
            <h3><p class="text-center"><strong>Faktur Pembayaran</strong></p></h3>
                <div class="col-xs-6 invoice-col">
                <address>
                <h4><strong>Data Pasien</strong></h4>
                <?php $id=$_GET['id'];
                    $query0=mysqli_query($mysqli,"SELECT pd.noRM,ps.nik,ps.nama,ps.noHP,pd.tanggal
                    FROM pendaftaran as pd
                    inner join pasien as ps on ps.noRM=pd.NoRM
                    WHERE pd.idPendaftaran='$id'");
                    while ($a=mysqli_fetch_row($query0)){
                        $noRM=$a[0];
                        $nik=$a[1];
                        $nama=$a[2];
                        $noHP=$a[3];
                        $tanggalDaftar=tgl_indonesia($a[4]);
                    }
                    

                
                echo '<table class="borderless">
                        <tr>
                            <td>No RM</td>
                            <td>:</td>
                            <td>'.$noRM.'</td>
                            
                        </tr>
                   
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>'.$nama.'</td>
                            
                        </tr>
                        <tr>
                            
                            <td>No HP</td>
                            <td>:</td>
                            <td>'.$noHP.'</td>
                        </tr>
                    </table>
                    
                </address>
                </div>
                <div class="col-xs-6 invoice-col">
                <address>
                <h4><strong>&nbsp;</strong></h4>
                    <table class="borderless">
                        
                        <tr>
                            <td>No Pendaftaran</td>
                            <td>:</td>
                            <td>'.$id.'</td>
                            
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>'.$tanggalDaftar.'</td>
                            
                        </tr>
                        
                    </table>
                    
                </address>
                </div>
            </div>';?>
            <!--Data Penanganan-->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                <h4><strong>Data Layanan</strong></h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php 
                        $query1=mysqli_query($mysqli,"SELECT l.namaLayanan,l.tarif
                        FROM detaillayanan as dl
                        inner join layanan as l on l.idLayanan=dl.idLayanan
                        WHERE idPendaftaran='$id'");
                        $no_1=1;
                        while ($b=mysqli_fetch_array($query1)){
                            echo '<tr>
                                    <td>'.$no_1.'</td>
                                    <td>'.$b[0].'</td>
                                    <td>'.rupiah($b[1]).'</td>
                                </tr>';
                               
                            $no_1++;
                        }
                        $query2=mysqli_query($mysqli,"SELECT SUM(l.tarif)
                        FROM detaillayanan as dl
                        inner join layanan as l on l.idLayanan=dl.idLayanan
                        WHERE idPendaftaran='$id'");
                        while($c=mysqli_fetch_row($query2)){
                            $subtotalLayanan=$c[0];
                        }
                        echo '</tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2"><p class="text-right">Sub Total</p></th>                    
                                <td>'.rupiah($subtotalLayanan).'</td>
                            </tr>
                        </tfoot>';
                            
                        ?>
                    </table>
                </div>
            </div>
            <div class="spacer5"></div>
            <!--Data Obat-->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                <h4><strong>Data Obat</strong></h4>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Dosis</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query3=mysqli_query($mysqli,"SELECT o.namaObat,do.dosis,o.hargaJual,do.jumlah,o.hargaJual*do.jumlah
                        FROM obat as o
                        inner join detailobat as do on do.idObat=o.idObat
                        WHERE do.idPendaftaran='$id'");
                        $no_2=1;
                        while($d=mysqli_fetch_array($query3)){
                        echo '
                            <tr>
                                <td>'.$no_2.'</td>
                                <td>'.$d[0].'</td>
                                <td>'.$d[1].'</td>
                                <td>'.rupiah($d[2]).'</td>
                                <td>'.$d[3].'</td>
                                <td>'.rupiah($d[4]).'</td>
                            </tr>';
                            $no_2++;
                        }
                        $query4=mysqli_query($mysqli,"SELECT SUM(o.hargaJual*do.jumlah)
                        FROM obat as o
                        inner join detailobat as do on do.idObat=o.idObat
                        WHERE do.idPendaftaran='$id'");
                        while($c=mysqli_fetch_row($query4)){
                            $subtotalObat=$c[0];
                        }
                        echo '</tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5"><p class="text-right">Sub Total</p></th>                    
                                <td>'.rupiah($subtotalObat).'</td>
                            </tr>

                        </tfoot>';?>
                    </table>
                </div>
            </div>
            <!--Total-->
            <div class="row">
                <div class="col-xs-6 table-responsive pull-right">
                    <table class="table">
                    <tr>
                            <th>Sub Total Layanan</th>
                            <td>:</td>
                            <td><?php echo rupiah($subtotalLayanan); ?></td>
                            
                        </tr>
                        <tr>
                            <th>Sub Total Obat</th>
                            <td>:</td>
                            <td><?php echo rupiah($subtotalObat); ?></td>
                            
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>:</td>
                            <td><?php echo rupiah($subtotalLayanan+$subtotalObat); ?></td>
                            
                        </tr>
                    </table>
                </div>
            </div>
        </section>

    </section>
    </body>
    <script>
    $(document).ready(function(){
        window.print();
    });
    </script>
    </html>    