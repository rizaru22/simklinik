<script type="text/javascript" src="javascript/script_laporan_tahunan.js"> </script>

<?php include "../library/function_view.php";?>
<?php include "../library/function_date.php";?>
<?php include "../library/function_rupiah.php";?>
<?php include "../library/config.php";?>
    <!-- Content Header (Page header) -->
 
    <?php header_page("Laporan Bulanan","Laporan","Bulanan"); ?>

    <!-- Main content -->
    <section class="content container-fluid">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                    <img src="images/kopsurat.png" style="max-width:100%;">                
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
               
                ?>
                <div class="col-xs-12 table-responsive mx-auto">
                <h3><strong><p class="text-center">Laporan Pendapatan Tahunan</p></strong></h3>
                <h4><strong><p class="text-left">Tahun : <?php echo $tahun; ?></p></strong></h4>
                
                <div class="spacer5"></div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Pendapatan per Bulan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query3=mysqli_query($mysqli,"SELECT month(tanggal),SUM(totalBiaya) FROM pendaftaran WHERE YEAR(tanggal)='$_GET[tahun]' AND status='4' GROUP BY month(tanggal)");
                   $grandTotal=0;
                   
                        $no_2=1;
                        while($d=mysqli_fetch_array($query3)){
                        echo '
                            <tr>
                                <td>'.$no_2.'</td>
                                <td>'.$nama_bulan[$d[0]].'</td>
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
           
            <!--Tombol-->
            <div class="row">
                <div class="col-xs-12">
                    
                <?php 
                echo '<button type="button" class="btn btn-warning btn-flat pull-right" style="margin-right: 5px;" onclick="cetak('.$tahun.')"><i class="fa fa-print"></i> Cetak Laporan</button>';?>
                </div>
            </div>
        </section>

    </section>