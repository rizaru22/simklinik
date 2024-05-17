<?php
include "../library/config.php";
include "../library/function_view.php";
include "../library/function_date.php";
include "../library/function_rupiah.php";


if($_GET['action'] == "table_layanan"){
    $id=$_GET['id'];
    $query = mysqli_query($mysqli, "SELECT DL.idPendaftaran,DL.idLayanan,L.namaLayanan,L.tarif
    FROM detailLayanan as DL
    INNER JOIN layanan as L on L.idLayanan=DL.idLayanan
    WHERE DL.idPendaftaran=$id");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[2];
          $row[] = rupiah($r[3]);
          $row[] ='<a class="btn btn-danger btn-delete" onclick="delete_data_layanan(\''.$r[0].'\',\''.$r[1].'\')"><i class="glyphicon glyphicon-trash"></i></a>';
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }

 
elseif($_GET['action'] == "table_obat"){
    $id=$_GET['id'];
    $query = mysqli_query($mysqli, "SELECT DO.idPendaftaran,DO.idObat,O.namaObat,DO.dosis,O.hargaJual,DO.jumlah,(O.hargaJual*DO.jumlah) as biaya 
    FROM detailObat as DO 
    INNER JOIN obat as O on O.idObat=DO.idObat 
    WHERE DO.idPendaftaran=$id");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[2];
          $row[] = $r[3];
          $row[] = rupiah($r[4]);
          $row[] = $r[5];
          $row[] = rupiah($r[6]);
          $row[]='<a class="btn btn-danger btn-delete" onclick="delete_data_obat(\''.$r[0].'\',\''.$r[1].'\')"><i class="glyphicon glyphicon-trash"></i></a>';
          $data[] = $row;
          $no++;
       }
      
    $output = array("data" => $data);
    echo json_encode($output);
 }

elseif($_GET['action'] == "insertLayanan"){
   $idPendaftar=$_GET['id'];
   mysqli_query($mysqli, "INSERT INTO detaillayanan 
                                 SET idPendaftaran='$idPendaftar', 
                                     idLayanan='$_POST[ccLayanan]'");	
}
elseif($_GET['action'] == "deleteLayanan"){
   $idPendaftar=$_GET['id'];
   $idLayanan=$_GET['idLayanan'];
   mysqli_query($mysqli, "DELETE FROM detaillayanan 
                                 where   idPendaftaran='$idPendaftar' AND idLayanan='$idLayanan'");	
}
elseif($_GET['action'] == "insertObat"){
   //cari data stok obat 
   $jumlah=$_POST['jumlah'];
   $query=mysqli_query($mysqli,"SELECT stok from obat where idObat='$_POST[ccObat]'");
   $row=mysqli_fetch_row($query);
   if ($row[0]>=$jumlah){
   $idPendaftar=$_GET['id'];
   mysqli_query($mysqli, "INSERT INTO detailobat 
                                 SET idPendaftaran='$idPendaftar', 
                                     idObat='$_POST[ccObat]',
                                     dosis='$_POST[dosis]',
                                     jumlah='$_POST[jumlah]'");	
   }
   else{
      echo "stok kurang";
   }
}
elseif($_GET['action'] == "deleteObat"){
   $idPendaftar=$_GET['id'];
   $idObat=$_GET['idObat'];
   mysqli_query($mysqli, "DELETE FROM detailobat 
                                 where   idPendaftaran='$idPendaftar' AND idObat='$idObat'");	
}
elseif($_GET['action'] == "saveDiagnosa"){
   mysqli_query($mysqli, "UPDATE pendaftaran AS p
   SET p.diagnosa='$_POST[diagnosa]', p.status='2', totalBiaya=(
      (SELECT IFNULL(SUM(l.tarif),0) 
      FROM detaillayanan as dl 
      INNER join layanan as l on l.idLayanan=dl.idLayanan 
      WHERE dl.idPendaftaran='$_POST[id]')
      +(SELECT IFNULL(SUM(o.hargaJual*do.jumlah),0)
      FROM detailobat as do 
      INNER JOIN obat as o on o.idObat=do.idObat 
      WHERE do.idPendaftaran='$_POST[id]'))
   WHERE p.idPendaftaran='$_POST[id]'");	
}