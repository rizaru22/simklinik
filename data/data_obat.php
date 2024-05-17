<?php
include "../library/config.php";
include "../library/function_view.php";
include "../library/function_date.php";
include "../library/function_rupiah.php";


if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT namaObat,tanggalExpired,hargaJual,stok,satuan,idObat FROM obat ORDER BY namaObat ASC");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[0];
          if ($r[1]<=date("Y-m-d",strtotime("+7 day"))) {
             $row[]='<span class="badge bg-red">'.tgl_indonesia($r[1]).'</span>';
          }else{
          $row[] = '<span class="badge bg-blue">'.tgl_indonesia($r[1]).'</span>';
         }
          $row[] = rupiah($r[2]);
          if ($r[3]<=1){
            $row[] = '<span class="badge bg-red">'.$r[3].'</span>';
          }else{
            $row[] = '<span class="badge bg-green">'.$r[3].'</span>';
          }
          
          $row[] = $r[4];
          $row[] = create_action($r['idObat']);
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }
 elseif($_GET['action'] == "insert"){
      mysqli_query($mysqli, "INSERT INTO obat 
                                    SET namaObat='$_POST[namaObat]', 
                                        tanggalBeli='$_POST[tanggalBeli]',
                                        tanggalExpired='$_POST[tanggalExpired]',
                                        hargaBeli='$_POST[hargaBeli]',
                                        hargaJual='$_POST[hargaJual]',
                                        stok='$_POST[stok]',
                                        satuan='$_POST[satuan]',
                                        brand='$_POST[brand]'");	
}
elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM obat WHERE idObat='$_GET[id]'");
   $data = mysqli_fetch_array($query);	
   echo json_encode($data);
}
elseif($_GET['action'] == "update"){
   mysqli_query($mysqli, "UPDATE obat 
                                 SET namaObat='$_POST[namaObat]', 
                                     tanggalBeli='$_POST[tanggalBeli]',
                                     tanggalExpired='$_POST[tanggalExpired]',
                                     hargaBeli='$_POST[hargaBeli]',
                                     hargaJual='$_POST[hargaJual]',
                                     stok='$_POST[stok]',
                                     satuan='$_POST[satuan]',
                                     brand='$_POST[brand]'
                                     WHERE idObat='$_POST[id]'");	
}
elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM obat  WHERE idObat='$_GET[id]'");	
}