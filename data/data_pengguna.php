<?php
include "../library/config.php";
include "../library/function_view.php";
$var_ext=array('JPEG','PNG','BMP','JPG','jpeg','jpg','png','bmp');

if($_GET['action'] == "table_data"){
    $query = mysqli_query($mysqli, "SELECT namaPengguna,username,level,idPengguna  FROM pengguna ORDER BY level ASC");
    $data = array();
       $no = 1;
       while($r = mysqli_fetch_array($query)){
          $row = array();
          $row[] = $no;
          $row[] = $r[0];
          $row[] = $r[1];
          if ($r[2]=='dr') $row[] = 'Dokter';
          else $row[] = 'Customer Service';
          $row[] = create_action($r['idPengguna']);
          $data[] = $row;
          $no++;
       }
     
    $output = array("data" => $data);
    echo json_encode($output);
 }

 elseif($_GET['action'] == "insert"){
    if (!empty($_FILES['photo']['name'])){
        $file_name = $_FILES['photo']['name'];
        // Source tempat upload file sementara
        $source = $_FILES['photo']['tmp_name'];
        // Membaca jenis file
        $file_type = $_FILES['photo']['type'];
        $temp = explode(".", $_FILES["photo"]["name"]);
        if (in_array($temp[1],$var_ext)){
        //ganti nama file
        
        $newfilename = $_POST['username']. '.' . end($temp);
        // Tempat upload file disimpan
        $direktori = "../dist/img/$newfilename";
        move_uploaded_file($source,$direktori);

        //password
        $password=md5($_POST['password']);
        mysqli_query($mysqli, "INSERT INTO pengguna 
                                SET namaPengguna='$_POST[namaPengguna]', 
                                username='$_POST[username]',
                                password='$password',
                                photo='$newfilename',
                                level='$_POST[level]'");	
        echo "ok";
        }
        else{
            echo "gagal upload photo<br>";
            echo $temp[1];
        }
    }
    else{
        $password=md5($_POST['password']);
        mysqli_query($mysqli, "INSERT INTO pengguna 
                                SET namaPengguna='$_POST[namaPengguna]', 
                                username='$_POST[username]',
                                password='$password',
                                level='$_POST[level]'");
    }
}
elseif($_GET['action'] == "form_data"){
    $query = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE idPengguna='$_GET[id]'");
    $data = mysqli_fetch_array($query);	
    echo json_encode($data);
 }
 elseif($_GET['action'] == "update"){
    if (!empty($_FILES['photo']['name'])){
        $file_name = $_FILES['photo']['name'];
        // Source tempat upload file sementara
        $source = $_FILES['photo']['tmp_name'];
        // Membaca jenis file
        $file_type = $_FILES['photo']['type'];
        $temp = explode(".", $_FILES["photo"]["name"]);
        if (in_array($temp[1],$var_ext)){
        //ganti nama file
        
        $newfilename = $_POST['username']. '.' . end($temp);
        // Tempat upload file disimpan
        $direktori = "../dist/img/$newfilename";
        move_uploaded_file($source,$direktori);

        //password
        $password=md5($_POST['password']);
        mysqli_query($mysqli, "UPDATE pengguna 
                                SET namaPengguna='$_POST[namaPengguna]', 
                                username='$_POST[username]',
                                password='$password',
                                photo='$newfilename',
                                level='$_POST[level]'
                                WHERE idPengguna='$_POST[id]'");
        echo "ok";	
        }
        else{
            echo "gagal upload photo<br>";
            echo $temp[1];
        }
    }
    else{
        $password=md5($_POST['password']);
        mysqli_query($mysqli, "UPDATE pengguna 
                                SET namaPengguna='$_POST[namaPengguna]', 
                                username='$_POST[username]',
                                password='$password',
                                level='$_POST[level]'
                                WHERE idPengguna='$_POST[id]'");
    }
}
elseif($_GET['action'] == "delete"){
    mysqli_query($mysqli, "DELETE FROM pengguna  WHERE idPengguna='$_GET[id]'");	
 }