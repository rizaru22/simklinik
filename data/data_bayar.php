<?php
include "../library/config.php";
include "../library/function_view.php";
include "../library/function_date.php";
include "../library/function_rupiah.php";

if ($_GET['action']=='update'){
    $id=$_GET['id'];
    mysqli_query($mysqli,"UPDATE pendaftaran SET status='4' WHERE idPendaftaran='$id'");
    $query0=mysqli_query($mysqli,"SELECT idObat,jumlah FROM detailobat WHERE idPendaftaran='$id'");
    while($row=mysqli_fetch_row($query0)){
        mysqli_query($mysqli,"UPDATE obat set stok=stok-'$row[1]' WHERE idObat='$row[0]'");
    }
    echo 'ok';
}
?>