<?php
include "../library/config.php";
include "../library/function_view.php";
include "../library/function_date.php";
include "../library/function_rupiah.php";


if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT A.idPendaftaran,A.noRM,B.nama, A.status
    FROM pendaftaran as A
    inner JOIN pasien as B on B.noRM=A.noRM
    WHERE A.tanggal=curdate()
    ORDER BY A.status ASC");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[1];
          $row[] = $r[2];
            if ($r[3]==0) $label=create_label('warning','menunggu');
            elseif ($r[3]==1) $label=create_label('success','periksa');         
            elseif ($r[3]==2) $label=create_label('info','obat');
            elseif ($r[3]==3) $label=create_label('primary','bayar');
            elseif ($r[3]==4) $label=create_label('primary','selesai');
          $row[] = $label;
          if ($r[3]==0) $row[] =open_form_diagnosa($r[0]).create_action($r[0],false,true);
          elseif($r[3]<=1) $row[]=open_form_diagnosa($r[0]);
          else $row[]=open_form_bayar($r[0]);
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }


 elseif($_GET['action'] == "insert"){
    mysqli_query($mysqli, "INSERT INTO pendaftaran 
                                  SET noRM='$_POST[pasien]', 
                                      tanggal=curdate(),
                                      status='0'");
}
elseif($_GET['action'] == "delete"){
    mysqli_query($mysqli, "DELETE FROM pendaftaran  WHERE idPendaftaran='$_GET[id]'");	
 }
elseif($_GET['action'] == "updateStatus"){
mysqli_query($mysqli, "UPDATE pendaftaran 
                                 SET status='1' WHERE idPendaftaran='$_GET[id]'");
}
 ?>