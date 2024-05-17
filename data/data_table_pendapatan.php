<?php
include "../library/config.php";
include "../library/function_rupiah.php";
include "../library/function_view.php";
if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT A.noRM,B.nama,A.status, A.totalBiaya
    FROM pendaftaran as A
    inner JOIN pasien as B on B.noRM=A.noRM
    WHERE A.tanggal=curdate()
    ORDER BY A.status ASC ");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[0];
          $row[] = $r[1];
          if ($r[2]==0) $label=create_label('warning','menunggu');
          elseif ($r[2]==1) $label=create_label('success','periksa');         
          elseif ($r[2]==2) $label=create_label('info','obat');
          elseif ($r[2]==3) $label=create_label('primary','bayar');
          elseif ($r[2]==4) $label=create_label('primary','selesai');
        $row[] = $label;
          $row[] = '<span class="badge bg-green">'.rupiah($r[3]).'</span>';
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }

 ?>