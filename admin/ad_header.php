<?php
  session_start();

  if(!$_SESSION['ad_info'])
  {
    header('Location: ../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../assets/css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/bootstrapValidator.js"></script>
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
      <a class="navbar-brand" href="ad_dashboard.php"><?php echo $_SESSION['ad_info']['name']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='ad_dashboard.php'){ echo '
        active';} ?>"><a href="ad_dashboard.php">Profile</a></li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='ad_movie_list.php'){ echo '
        active';} ?>"><a href="ad_movie_list.php">Movies List</a></li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='ad_add_movie.php'){ echo '
        active';} ?>"><a href="ad_add_movie.php">Add Movies</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="ad_logout.php?ad_logout=ad_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>