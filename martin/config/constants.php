<?php
        //declaring variables to prevent errors

    $fname = ""; //first name

    $lname = ""; //last name

    $em = ""; //email

    $em2 = ""; //email 2

    $password = ""; //password

    $password2 = ""; //password 2

    $username = "";

    $date = date("Y-m-d");

    $GLOBALS['my_queries'] = array(
        "SELECT email FROM users WHERE email='$em'",
        "SELECT username FROM users WHERE username='$username'",
        "INSERT INTO users (first_name, last_name, username, email, password, signup_date) VALUES ('$fname', '$lname', '$username', '$em', '$password', '$date')",
        "SELECT username FROM users WHERE email = '{$em}' AND password = '{$password}'",
        "SELECT username FROM users WHERE email='{$em}' AND user_closed='yes'",
        "UPDATE users SET user_closed='no' WHERE email='{$em}'"
    );
    $GLOBALS['error_array'] = array();
    $GLOBALS['conn'] = mysqli_connect("localhost", "root", "", "uren");
?>