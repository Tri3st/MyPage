<?php 
  include 'includes/head.php';
  include 'includes/header.php';
?>

<h1>Exercise 1</h1>
<h2>Primes</h2>

  <form method="get">
Give a number : <input id="inpnum" type="number" name="pnum"><br>
  <input type="submit">
</form>
<?php
  if(isset($_GET)){
    $myNum = (int)$_GET["pnum"];
  echo "you're input was {$myNum}."."<br>";
  
  echo "The primes of {$myNum} are :"."<br>";
  $primeNums = primes($myNum);
  echo "<ul>";
  foreach ($primeNums as $p1){
    echo "<li>{$p1}</li>"."<br>";
  }
  echo "</ul>";
  }

   include 'includes/footer.php';
 ?>