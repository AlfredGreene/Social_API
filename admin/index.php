<?php  include ("../init.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <link href="../assets/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

     	<form class="form-signin"  method="POST" action="#" >
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="password" placeholder="Password">
      
            <button class="btn btn-lg btn-login btn-block" name="submit" type="submit">Sign in</button>
         
          

        </div>

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/admin/js/jquery.js"></script>
    <script src="../assets/admin/js/bootstrap.min.js"></script>

   <?php 
    if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo $error = '<span style="margin-left:40%;
    color: #475361;">Please Enter Username and Password</span> ';
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
$id = $users->admin_login($username , $password);
if ($id == 1) {
$_SESSION['login_user']=$id; // Initializing Session
header("location: home.php"); // Redirecting To Other Page
} else {
echo $error = '<span style="margin-left:40%;
    color: #475361;">Username or Password is invalid</span>';
}
}
}
?>
  </body>
</html>
