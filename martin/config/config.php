<?php 



ob_start(); //Turn on output buffering

session_start();

include 'config/constants.php';

date_default_timezone_set("Europe/Amsterdam");



  $dbHost = "localhost";

  $dbUser = "triest_triestje";

  $dbPass = "triestje";

  $dbName = "triest_uren";

  

  // Create db connection

  $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);





if(mysqli_connect_errno()){

  echo "Failed to connect: " . mysqli_connect_errno();

}



?>