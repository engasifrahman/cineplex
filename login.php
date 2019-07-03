<?php
  require('header.php');

  if(isset($_POST['login']))
  {
          require_once('class_library/login_class.php');
          $login = new All_Login;
          $error=$login->login($_POST);

          //echo '<br>';
          //print_r($error);
          //echo $error['pass_error'];
  }

?>
  
<div class="container-fulid ">
  <div class="col-md-4 col-md-offset-4 pt-3 bg-white shadow">
  <h3 class="text-center text-black" style="padding-bottom:20px;">Login Panel</h3>
  
  <form method="post" action="">
    <div class="form-group input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>" required>
    </div>
    <?php
      if(isset($error['email_error']))
      {
        ?>
        <span class="text-warning">
          <strong> <?php echo $error['email_error'].'<br>'; ?>
          </strong>
        </span>
        <?php
      }
      ?>

    <div class="form-group input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder=" Enter Password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>" required>
    </div>

    <?php
      if(isset($error['pass_error']))
      {
        ?>
        <span class="text-warning">
          <strong> <?php echo $error['pass_error']; ?>
          </strong>
        </span>
        <?php
      }
      ?>

    <div class="form-group">
      <div class="col-md-offset-3 col-md-6" style="padding-left:55px;">
        <div class="checkbox text-black">
          <label>
            <input type="checkbox" name="remember" value="Y"> Remember me
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4 col-md-offset-4 mb-1" style="padding-left:45px; padding-bottom:10px;">
        <button type="submit" name="login" class="btn btn-success">Login</button>
      </div>
    </div>

  </form>
</div>

</div>


</body>
</html>
