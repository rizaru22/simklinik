<script type="text/javascript" src="javascript/script_tampil_laporan_harian.js"> </script>

<?php include "../library/function_view.php";?>
<?php include "../library/function_date.php";?>
<?php include "../library/function_rupiah.php";?>
<?php include "../library/config.php";?>
    <!-- Content Header (Page header) -->
  
    <?php header_page("Laporan Harian","Laporan","Harian"); ?>

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
                <div class="col-xs-12 table-responsive">
                <h3><strong><p class="text-center">Laporan Pendapatan Harian</p></strong></h3>
                <h4><strong><p class="text-center">Tanggal : <?php echo tgl_indonesia($_GET['tanggal'])?></p></strong></h4>
                <div class="spacer5"></div>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Biaya Obat</th>
                                <th>Biaya Penanganan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query3=mysqli_query($mysqli,"SELECT P.noRM,PS.nama,(SELECT IFNULL(SUM(o.hargaJual*do.jumlah),0)
                        FROM detailobat as do 
                        INNER JOIN obat as o on o.idObat=do.idObat 
                        WHERE do.idPendaftaran=P.idPendaftaran) as biayaObat,(SELECT IFNULL(SUM(l.tarif),0) 
                        FROM detaillayanan as dl 
                        INNER join layanan as l on l.idLayanan=dl.idLayanan 
                        WHERE dl.idPendaftaran=P.idPendaftaran) as biayaLayanan,P.totalBiaya
                  FROM pendaftaran as P
                  INNER JOIN pasien as PS on PS.noRM=p.noRM
                  WHERE P.tanggal='$_GET[tanggal]' AND P.status='4'
                  ORDER BY P.idPendaftaran");
                   $totalBiayaObat=0;
                   $totalBiayaLayanan=0;
                        $no_2=1;
                        while($d=mysqli_fetch_array($query3)){
                        echo '
                            <tr>
                                <td>'.$no_2.'</td>
                                <td>'.$d[0].'</td>
                                <td>'.$d[1].'</td>
                                <td>'.rupiah($d[2]).'</td>
                                <td>'.rupiah($d[3]).'</td>
                                <td>'.rupiah($d[4]).'</td>
                            </tr>';
                            $no_2++;
                            $totalBiayaObat=$totalBiayaObat+$d[2];
                            $totalBiayaLayanan=$totalBiayaLayanan+$d[3];
                            
                        }
                        $grandTotal=$totalBiayaLayanan+$totalBiayaObat;
                        echo '</tbody>
                        <tfoot>
                            <tr>
                            <th colspan="3"><p class="text-right">Total</th>
                            <th>'.rupiah($totalBiayaObat).'</th>
                            <th>'.rupiah($totalBiayaLayanan).'</th>
                            <th>'.rupiah($grandTotal).'</th>
                            </tr>

                        </tfoot>';?>
                    </table>
                </div>
            </div>
            <!--Total-->
            <div class="row">
                <div class="col-xs-4 table-responsive pull-right">
                    <table class="table">
                   
                        <tr>
                            <th>Grand Total</th>
                            <th>:</th>
                            <th><?php echo rupiah($grandTotal); ?></th>
                            
                        </tr>
                    </table>
                </div>
            </div>
            <!--Tombol-->
            <div class="row">
                <div class="col-xs-12">
                    
                <?php $tgl=$_GET['tanggal'];
               
                echo '<button type="button" class="btn btn-warning btn-flat pull-right" style="margin-right: 5px;" onclick="cetak(\''.$tgl.'\')"><i class="fa fa-print"></i> Cetak Laporan</button>';?>
                </div>
            </div>
        </section>

    </section>