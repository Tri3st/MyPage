<?php 

  require 'config/config_local.php';

  require 'includes/handlers/login_handler.php';

  include 'includes/head.php';

  include 'includes/header.php';

?>

<h1>Login</h1>

<form class="log" action="register.php" method="POST">

  <input class="log" type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($_SESSION['log_email'])) echo $_SESSION['log_email'];?>" required>

	<br>

	<input class="log" type="password" name="log_password" placeholder="Password">

	<br>

  <?php if(in_array("Email or password was incorrect<br>", $GLOBALS['error_array'])) echo "<span style='color: #FF0000;'>Email or password was incorrect<br></span>";?>

	<input type="submit" name="log_button" class="logbtn" value="Login"/>

	<br>

  Or click <a href="register.php">here</a> to register.<br>

</form>



<?php

   include 'includes/footer.php';

 ?>