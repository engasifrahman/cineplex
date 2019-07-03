<?php
  session_start();

  if(isset($_SESSION['u_info']))
  {
   header('Location:user/u_dashboard.php'); 
  }

  else if(isset($_SESSION['ad_info']))
  {
   header('Location:admin/ad_dashboard.php'); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrapValidator.js"></script>
</head>
<body class="bg-gray">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Cineplex</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ echo '
        active';} ?>"><a href="index.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Movies</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='registration.php'){ echo '
        active';} ?>">
          <a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        </li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='login.php'){ echo '
        active';} ?>">
          <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>