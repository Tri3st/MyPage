<?php 

 

global $conn;

global $error_array;

global $my_queries;



if (isset($_POST['log_button'])){

 $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email



 $_SESSION['log_email'] = $em; //store email into session variable

 $password = md5($_POST['log_password']);

 

 $check_database_query = mysqli_query($conn, $my_queries[3]);

 $check_login_query = mysqli_num_rows($check_database_query);



 if($check_login_query == 1){

  $row = mysqli_fetch_array($check_database_query); //get data and store it as an array in variable $row (corresponding row from the db)

  $username = $row['username'];



  $user_closed_query = mysqli_query($conn, $my_queries[4]);

		if(mysqli_num_rows($user_closed_query) == 1) {

			$reopen_account = mysqli_query($conn, $my_queries[5]);

		}





  $_SESSION['username'] = $username;

  header("Location: index.php");

  exit();

  } else {

    array_push($error_array, "Email or password was incorrect<br>");

  }

}

?>

