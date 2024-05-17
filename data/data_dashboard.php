<?php
include "../library/config.php";
include "../library/function_rupiah.php";

function getCountJmlPasien(){
    global $mysqli;
    $query=mysqli_query($mysqli,"SELECT count(noRM) FROM pasien");
    $r=mysqli_fetch_row($query);
    return $r[0];
}

function getCountJmlPendaftaran(){
    global $mysqli;
    $query=mysqli_query($mysqli,"SELECT count(idPendaftaran) FROM pendaftaran WHERE tanggal=curdate() AND status<='2'");
    $r=mysqli_fetch_row($query);
    return $r[0];
}

function getCountJmlObatKosong(){
    global $mysqli;
    $query=mysqli_query($mysqli,"SELECT count(idObat) FROM obat WHERE stok <=1 OR tanggalExpired <= curdate()+7 ");
    $r=mysqli_fetch_row($query);
    return $r[0];
}
function getCountPendapatanHariIni(){
    global $mysqli;
    $query=mysqli_query($mysqli,"SELECT SUM(totalBiaya) FROM pendaftaran WHERE tanggal=curdate() AND status ='4'");
    $r=mysqli_fetch_row($query);
    return rupiah($r[0]);
}



?>