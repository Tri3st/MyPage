<?php
  function isPrime($x){
    if ($x == 2) return true;
    else {
      for($i = 2;$i < $x; $i++){
        if ($x % $i == 0) return false;
        else return true;
      }
    }
  }
  
  function primes($x){
    $primes = array();
    for($i = 2; $i <= $x; $i++){
      if (isPrime($i)) array_push($primes, $i);
    }
    return $primes;
  }
  
  
?>