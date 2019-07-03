<?php
    session_start();

    if(!$_SESSION['u_info'])
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
      <a class="navbar-brand" href="u_dashboard.php"><?php echo $_SESSION['u_info']['name']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='u_dashboard.php'){ echo '
        active';} ?>"><a href="u_dashboard.php">Profile</a></li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='u_movie_list.php'){ echo '
        active';} ?>"><a href="u_movie_list.php">Movies List</a></li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='u_booked_list.php'){ echo '
        active';} ?>"><a href="u_booked_list.php">Booked Movies</a></li>

        <li class="<?php if(basename($_SERVER['PHP_SELF'])=='u__buy_ticket.php'){ echo '
        active';} ?>"><a href="u_buy_ticket.php">Buy Tickets </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="u_logout.php?u_logout=u_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>