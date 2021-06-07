<?php 

  include 'includes/head.php';

  include 'includes/urenHeader.php';

?>



<h1 class="reg-h1">Uren Registratie</h1>
<hr id="thick-black">
<h2 class="reg-h2">View per maand</h2>
<hr id="thin-dotted">


<form class="reg-form" method="get">

  <label class="form-element">Year : </label>

  <input class="inpnum form-element" type="number" name="inpYrnr" value=2021><br>

  <label class="form-element">Maand : </label>

  <input class="inpnum form-element" type="number" name="inpMnthnr" placeholder="Month number"><br>

  <input class="form-element" type="submit">

</form>

<?php

if (isset($_GET['inpMnthnr'])){

$yearnr = $_GET['inpYrnr'];

$monthnr = $_GET['inpMnthnr'];



showMonth($monthnr, $yearnr);

}

?>

  

    

 <?php

   include 'includes/footer.php';

 ?>