<?php
session_start();
include "library/config.php";
include "library/function_antiinjection.php";

$username = antiinjeksi($_POST['username']);
$password = antiinjeksi(md5($_POST['password']));

$cekuser = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$jmluser = mysqli_num_rows($cekuser);
$data = mysqli_fetch_array($cekuser);
if($jmluser > 0){
   $_SESSION['username']     = $data['username'];
   $_SESSION['level']		 = $data['level'];
   $_SESSION['password']     = $data['password'];
   $_SESSION['nama']         = $data['namaPengguna'];
   $_SESSION['idpengguna']   = $data['idPengguna'];
   $_SESSION['photo']        = $data['photo'];
   $_SESSION['timeout'] 	 = time()+2000;
   $_SESSION['login'] 		 = 1;
   echo "ok";
}else{
   echo "<b>Username</b> atau <b>password</b> tidak terdaftar!";
}
?>