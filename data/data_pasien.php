<?php
include "../library/config.php";
include "../library/function_view.php";


if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT noRM,nama,nik,noHP FROM pasien ORDER BY noRM ASC");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[0];
          $row[] = $r[1];
          $row[] = $r[2];
          $row[] = $r[3];
          $row[] = create_action($r['noRM']);//.button_cetak($r['noRM']);
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }

 elseif($_GET['action'] == "insert"){
     //auto number Rekam Medis
     //pilih no RM terakhir dari noPasien
     $query=mysqli_query($mysqli,"SELECT noRM FROM pasien ORDER BY noRM DESC LIMIT 0,1");
     $record = mysqli_fetch_row($query);
     $lastRM=$record[0];
     $number=substr($lastRM,2);//ambil digit ke-3 sampai akhir
     $newNumber=(int)$number+1;//konvert ke integer lalu tambah dengan 1
     $jmlnewNumber=strlen($newNumber); //hitung panjang string nomor baru
     if ($jmlnewNumber==1) {
         $strNumber="RM00000".$newNumber;
     }elseif ($jmlnewNumber==2){
         $strNumber="RM0000".$newNumber;
     }elseif ($jmlnewNumber==3) {
        $strNumber="RM000".$newNumber;
     }elseif ($jmlnewNumber==4){
        $strNumber="RM00".$newNumber;
     }elseif ($jmlnewNumber==5){
        $strNumber="RM0".$newNumber;
     }elseif ($jmlnewNumber==6){
        $strNumber="RM".$newNumber;
     }
     mysqli_query($mysqli, "INSERT INTO pasien SET noRM='$strNumber', nik='$_POST[nik]',nama='$_POST[nama]',tempatLahir='$_POST[tempatLahir]',tanggalLahir='$_POST[tanggalLahir]',jk='$_POST[jk]',goDa='$_POST[goDa]',noHP='$_POST[noHp]',alamat='$_POST[alamat]'");	
 }

 
elseif($_GET['action'] == "form_data"){
    $query = mysqli_query($mysqli, "SELECT * FROM pasien WHERE noRM='$_GET[id]'");
    $data = mysqli_fetch_array($query);	
    echo json_encode($data);
 }

 elseif($_GET['action'] == "update"){
    $query="UPDATE pasien  SET nik='$_POST[nik]',
    nama='$_POST[nama]',
    tempatLahir='$_POST[tempatLahir]',
    tanggalLahir='$_POST[tanggalLahir]',
    jk='$_POST[jk]',
    goDa='$_POST[goDa]',
    noHP='$_POST[noHp]',
    alamat='$_POST[alamat]'
    WHERE noRM='$_POST[id]'";
    mysqli_query($mysqli,$query);	
}

elseif($_GET['action'] == "delete"){
    mysqli_query($mysqli, "DELETE FROM pasien  WHERE noRM='$_GET[id]'");	
}
?>