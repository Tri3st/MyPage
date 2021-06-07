<?php 

  include 'config/config_local.php';

  include 'includes/functions1.php';

  include 'includes/dbtools.php';

?>

<!DOCTYPE html>

<html lang="en">

  <head>

  <meta charset="UTF-8">

  <meta name="description" content="My own HTML, CSS, PHP, JS project">

  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">

  <meta name="author" content="Martin van Diest">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Test</title>

    <link rel="stylesheet" href="myStyle.css?<?=filemtime('styles.css');?>">

  </head>

  <body>