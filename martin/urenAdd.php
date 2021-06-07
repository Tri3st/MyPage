<?php 

  include 'includes/head.php';

  include 'includes/urenHeader.php';

?>



<h1>Uren Registratie</h1>



<form method="post">

  <input type="text" name="inpdbdat" placeholder="YYYY-MM-DD">

  <input type="text" name="inpdbbgn" placeholder="HH:MM">

  <input type="text" name="inpdbeind" placeholder="HH:MM">

  <input type="text" name="inpdbpze" value="00:30">

  <input type="text" name="inpdbbz" value="-">

  

  <input name="submit" type="submit">

</form>

<?php

  //checken of alles ingevuld is

  if(isset($_POST['inpdbdat']) && $_POST['inpdbdat']!=''){

    $datum = $_POST['inpdbdat'];

    $weeknr = calcWeekNr($datum);

    $begin1 = timeStr($_POST['inpdbbgn']);

    $eind = timeStr($_POST['inpdbeind']);

    $pauze = timeStr($_POST['inpdbpze']);

    $bijz = $_POST['inpdbbz'];

    addRecord($datum, $weeknr, $begin1, $eind, $pauze, $bijz);

  }

?>

  

    

 <?php

   include 'includes/footer.php';

 ?>