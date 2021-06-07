<?php 

  include 'includes/handlers/register_handler.php';

  include 'includes/head.php';

  include 'includes/header.php';

?>

<h1>Register</h1>



<form class="reg" action="register.php" method="POST">

 <input class="reg" type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname'];?>" required>

 <br>

 <?php if(in_array("Firstname must be between 3 and 25 characters<br>", $GLOBALS['error_array'])) echo "Firstname must be between 3 and 25 characters<br>";?>

 <input class="reg" type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname'];?>" required>

 <br>

 <?php if(in_array("Lastname must be between 3 and 25 characters<br>", $GLOBALS['error_array'])) echo "Lastname must be between 3 and 25 characters<br>";?>

 <input class="reg" type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email'];?>" required>

 <br>

 <input class="reg" type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])) echo $_SESSION['reg_email2'];?>" required>

 <br>

<?php 

  if(in_array("Email already in use!<br>", $GLOBALS['error_array'])) echo "Email already in use!<br>";

  else if(in_array("Emails dont match<br>", $GLOBALS['error_array'])) echo "Emails dont match<br>";

  else if(in_array("Invalid Email format<br>", $GLOBALS['error_array'])) echo "Invalid Email format<br>";

 ?>

 <input class="reg" type="password" name="reg_password" placeholder="Password" required>

 <br>

 <input class="reg" type="password" name="reg_password2" placeholder="Confirm Password" required>

 <br>

<?php 

  if(in_array("Your passwords do not match<br>", $GLOBALS['error_array'])) echo  "Your passwords do not match<br>";

  else if(in_array("Your password can only contain characters and numbers<br>", $GLOBALS['error_array'])) echo  "Your password can only contain characters and numbers<br>";

  else if(in_array("Your password must be between 5 and 30 characters<br>", $GLOBALS['error_array'])) echo  "Your password must be between 5 and 30 characters<br>";

 ?>

 <input type="submit" name="reg_button" class="regbtn" value="Register"/>

<br>

<?php

 if(in_array("You're all set! Go ahead and login!", $GLOBALS['error_array'])) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>";

?>

</form>

Or click <a href="login.php">here</a> to login.<br>

    

 <?php

   include 'includes/footer.php';

 ?>