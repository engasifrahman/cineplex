<?php

require('u_header.php');

?>
  
<div class="container-fulid ">
  <div class="col-md-8 col-md-offset-2">

    <div class="panel panel-primary">
      	<div class="panel-heading text-center">User Profile</div>
      	<div class="panel-body">
      	<table class="table">
      		<tr>
      			<td>Name</td>
      			<td><?php echo $_SESSION['u_info']['name']; ?></td>
      		</tr>
      		<tr>
      			<td>Username</td>
      			<td><?php echo $_SESSION['u_info']['username']; ?></td>
      		</tr>
      		<tr>
      			<td>Email</td>
      			<td><?php echo $_SESSION['u_info']['email']; ?></td>
      		</tr>
      		<tr>
      			<td>Gender</td>
      			<td><?php echo $_SESSION['u_info']['gender']; ?></td>
      		</tr>
      		<tr>
      			<td>Birthday</td>
      			<td><?php echo $_SESSION['u_info']['dob']; ?></td>
      		</tr>
      		<tr>
      			<td>Address</td>
      			<td><?php echo $_SESSION['u_info']['address']; ?></td>
      		</tr>
      		<tr>
      			<td>Contact</td>
      			<td><?php echo $_SESSION['u_info']['contact']; ?></td>
      		</tr>

      	</table>
  		</div>
    </div>
    
  </div>
</div>


</body>
</html>
