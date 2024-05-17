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
                    <img src="../images/kopsurat.png" style="max-width:100%;">                
                    </h2>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
               <!-- <div class="col-xs-6 invoice-col">
                <address>
                <h4><strong>Data Pasien</strong></h4>
                
                    
                </address>
                </div>
                <div class="col-xs-6 invoice-col pull-right">
                <address>
                <h4><strong>&nbsp;</strong></h4>
                
                    
                </address>
                </div>-->
            </div>
            
           <!-- <div class="spacer5"></div>-->
            <!--Laporan Harian-->
            <div class="row">
                <?php 
                $tahun=$_GET['tahun'];
                $nama_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                $bulan=$_GET['bulan'];
                $nm_bulan=$nama_bulan[$bulan];
                ?>
                <div class="col-xs-12 table-responsive">
                <h3><strong><p class="text-center">Laporan Pendapatan Bulanan</p></strong></h3>
                <h4><strong><p class="text-left">Tahun : <?php echo $tahun; ?></p></strong></h4>
                <h4><strong><p class="text-left">Bulan : <?php echo $nm_bulan; ?></p></strong></h4>
                <div class="spacer5"></div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pendapatan per Hari</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query3=mysqli_query($mysqli,"SELECT tanggal,SUM(totalBiaya) FROM pendaftaran WHERE Month(tanggal)='$_GET[bulan]' AND YEAR(tanggal)='$_GET[tahun]' AND status='4' GROUP BY tanggal");
                   $grandTotal=0;
                   
                        $no_2=1;
                        while($d=mysqli_fetch_array($query3)){
                        echo '
                            <tr>
                                <td>'.$no_2.'</td>
                                <td>'.$d[0].'</td>
                                <td>'.rupiah($d[1]).'</td>
                            </tr>';
                            $no_2++;
                            
                            $grandTotal=$grandTotal+$d[1];    
                        }
                        
                        echo '</tbody>
                        <tfoot>
                            <tr>
                            <th colspan="2"><p class="text-right">Total</th>
                            <th>'.rupiah($grandTotal).'</th>
                            </tr>

                        </tfoot>';?>
                    </table>
                </div>
            </div>
            <!--Total-->
           
            
        </section>

    </section>
    </body>
    <script>
    $(document).ready(function(){
        window.print();
    });
    </script>
    </html>    