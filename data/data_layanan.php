<?php
include "../library/config.php";
include "../library/function_view.php";
include "../library/function_date.php";
include "../library/function_rupiah.php";


if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT * FROM layanan ORDER BY namaLayanan ASC");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[1];
          $row[] = rupiah($r[2]);
          $row[] = create_action($r['idLayanan']);
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }
 elseif($_GET['action'] == "insert"){
    mysqli_query($mysqli, "INSERT INTO layanan 
                                  SET namaLayanan='$_POST[namaLayanan]', 
                                      tarif='$_POST[tarif]'");	
}
elseif($_GET['action'] == "form_data"){
    $query = mysqli_query($mysqli, "SELECT * FROM layanan WHERE idLayanan='$_GET[id]'");
    $data = mysqli_fetch_array($query);	
    echo json_encode($data);
 }
 elseif($_GET['action'] == "update"){
    mysqli_query($mysqli, "UPDATE layanan 
                           SET namaLayanan='$_POST[namaLayanan]', 
                               tarif='$_POST[tarif]'
                           WHERE idLayanan='$_POST[id]'");	
}
elseif($_GET['action'] == "delete"){
    mysqli_query($mysqli, "DELETE FROM layanan  WHERE idLayanan='$_GET[id]'");	
 }