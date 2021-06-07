<?php

$sql_constant = "SELECT SUM(gewerkt) AS Totaal_Gewerkt, COUNT(datum) AS Aantal_dagen," . 
  " SUM(gewerkt - 8)AS Totaal_Overuren, ( SELECT COUNT(maaltijd) FROM werkdag ";


function showWeek($wknum, $yearnum){

    global $sql_constant;

    $sql = "SELECT * FROM werkdag WHERE weeknr = {$wknum} AND year(datum) = {$yearnum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    $strData = "week {$wknum} of year {$yearnum}";

    printRows($result, $strData);

    //totalen 

    $sql = $sql_constant . "WHERE YEAR(datum) = {$yearnum} AND weeknr = {$wknum} AND maaltijd='J') AS " . 
    "Totaal_Maaltijden, (	SELECT COUNT(bijz) FROM werkdag WHERE YEAR(datum) = {$yearnum} AND weeknr = " . 
    "{$wknum} AND (bijz='VERLOF' OR bijz='VAKANTIE')) AS Totaal_Verlof FROM werkdag WHERE YEAR(datum) = {$yearnum} AND weeknr " . 
    "= {$wknum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    printRowTotals($result);

    mysqli_close($GLOBALS['conn']);

  }

  

function showMonth($mnthnum, $yearnum){

    global $sql_constant;

    $sql = "SELECT * FROM werkdag WHERE MONTH(datum) = {$mnthnum} AND year(datum) = {$yearnum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    $monthString = month2text($mnthnum);
    $strData = "month {$monthString} of year {$yearnum}";

    printRows($result, $strData);

    //totalen

    $sql = $sql_constant . "WHERE YEAR(datum) = {$yearnum} AND MONTH(datum) = {$mnthnum} AND maaltijd='J') AS " . 
    "Totaal_Maaltijden,( SELECT COUNT(bijz) FROM werkdag WHERE YEAR(datum) = {$yearnum} AND MONTH(datum) =" . 
    " {$mnthnum} AND (bijz='VERLOF' OR bijz='VAKANTIE')) AS Totaal_Verlof FROM werkdag WHERE YEAR(datum) = {$yearnum} AND MONTH(datum)" . 
    " = {$mnthnum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    printRowTotals($result);

    mysqli_close($GLOBALS['conn']);

  }



  function showYear($yearnum){

    global $sql_constant;

    $sql = "SELECT * FROM werkdag WHERE year(datum) = {$yearnum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    $strData = "year {$yearnum}";

    printRows($result, $strData);

    $sql = $sql_constant . "WHERE YEAR(datum) = {$yearnum} AND maaltijd='J') AS " . 

    "Totaal_Maaltijden, (	SELECT COUNT(bijz) FROM werkdag WHERE YEAR(datum) = {$yearnum}" . 
    " AND (bijz='VERLOF' OR bijz = 'VAKANTIE')) AS Totaal_Verlof FROM werkdag WHERE YEAR(datum) = {$yearnum}";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    printRowTotals($result);

    mysqli_close($GLOBALS['conn']);

  }



function printRows($result_data, $stringdata){

  $rowCount = mysqli_num_rows($result_data);

  if ($rowCount == 0){

    echo "Nothing here..";

  } else {

    echo "<div class=\"show-table\"><h2 class=\"overz-h2\">data for {$stringdata}</h2>";

    echo "<table class='result'><tr class='resulth'><th>datum</th><th>begin</th><th>eind</th><th>pauze</th><th>gewerkt</th>" . 
       "<th>Maaltijd(J/N)</th><th>Bijzonderheden</th></tr>";

    while($row = mysqli_fetch_assoc($result_data)){

      echo "<tr class='result'><td>{$row['datum']}</td>" . "<td>{$row['begint']}</td>" . "<td>{$row['eindt']}</td>" . 

      "<td>{$row['pauzet']}</td>" . "<td>{$row['gewerkt']}</td>" . "<td>{$row['maaltijd']}</td>" . "<td>{$row['bijz']}</td></tr>";

    }

    echo "</div>";    

  }

}



function printRowTotals($result_data){

  $rowCount = mysqli_num_rows($result_data);

  if ($rowCount > 0){

    while($row = mysqli_fetch_assoc($result_data)){

      echo "<tr class='totalen'><td>Dagen :</td>"."<td colspan='2'>Gewerkt :</td>".

      "<td colspan='2'>Overuren :</td><td>Maaltijden : </td><td>Verlof :</td></tr>";

      echo "<tr class='totalen'><td>{$row['Aantal_dagen']}</td>"."<td colspan='2'>{$row['Totaal_Gewerkt']}</td>".

      "<td colspan='2'>{$row['Totaal_Overuren']}</td><td>{$row['Totaal_Maaltijden']}</td><td>{$row['Totaal_Verlof']}</td></tr>";

      echo "</table>" . "<br>";

    }

  }

}



function calcWeeknr($datum){

    $dat2 = strtotime($datum);

    return date('W', $dat2);

}



function timeStr($t){

      $tmp = explode(":", $t);

      return $tmp[0] . ":" . $tmp[1] . ":00";

}

function month2text($monthnum){
  $monthStr = "";
  switch($monthnum){
    case 1:
      $monthStr = "January";
      break;
    case 2:
      $monthStr = "February";
      break;
    case 3:
      $monthStr = "March";
      break;
    case 4:
      $monthStr = "April";
      break;
    case 5:
      $monthStr = "May";
      break;
    case 6:
      $monthStr = "June";
      break;
    case 7:
      $monthStr = "July";
      break;
    case 8:
      $monthStr = "August";
      break;
    case 9:
      $monthStr = "September";
      break;
    case 10:
      $monthStr = "October";
      break;
    case 11:
      $monthStr = "November";
      break;
    case 12:
      $monthStr = "December";
      break;
    default:
      $monthStr = "UNKNOWN";
      break;
  }
  return $monthStr;
}

  

function addRecord($dat, $wknr, $bgn, $eind, $pze, $bz){

    $sql = "INSERT INTO werkdag (datum, weeknr, begint, eindt, pauzet, bijz) VALUES ('{$dat}', {$wknr}, '{$bgn}', '{$eind}', '{$pze}', '{$bz}')";

    

    if (mysqli_query($GLOBALS['conn'], $sql)) {

  echo "Record created successfully"."<br>";

  echo "{$dat} {$wknr} {$bgn} {$eind} {$pze} {$bz}";

  } else {

  echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);

  }

}

// NOG TE IMPLEMENTEREN
// function dateConverter(dateStr){

// }



?>