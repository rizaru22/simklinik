<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="images/hospital.ico" rel="icon" type="image/x-icon" />
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="style/login.css">
</head>

<body class="hold-transition login-page">
<?php include "includeJS.php"; ?>
<script type="text/javascript">
$(function(){
   $('.alert').hide();
   $('.login-form').submit(function(){
      $('.alert').hide();
      if($('input[name=username]').val() == ""){
         $('.alert').fadeIn().html('Kotak input <b>Username</b> masih kosong!');
      }else if($('input[name=password]').val() == ""){
         $('.alert').fadeIn().html('Kotak input <b>Password</b> masih kosong!');
      }else{
         $.ajax({
            type : "POST",
            url : "logincek.php",
            data : $(this).serialize(),
            success : function(data){
               if(data == "ok") window.location = "index.php";	
               else $('.alert').fadeIn().html(data);	
            }
         });
      }
      return false;
   });
});
</script>

<div class="login-box">
  <div class="login-logo">
   <!-- <h1>Klinik dr. Shira Sp.P</h1>-->
  </div>
  <!-- /.login-logo -->
  <div class="alert alert-danger" role="alert"> </div>
  <div class="list-group-item active rounded-0">
                    <h2 class="text-center">Login Pengguna</h2>
                </div>
  <div class="login-box-body">
    <form action="" method="post" class="login-form">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-unlock"> </i> Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

 

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


</body>
</html>
