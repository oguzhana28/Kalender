<?php
include_once( "./class.TemplatePower.inc.php" );

$tpl = new TemplatePower( "./tpl/index.tpl.html" );
$tpl->prepare();

$months =['onbekend','januari','februari','maart','april','mei','juni','juli','augustus',
                   'september','oktober','november','december'];


  // maak een verbinding met mysqli
  $connection = mysqli_connect('localhost', 'root','');
	
  // geef aan welke database we willen gebruiken
  mysqli_select_db($connection, 'calendar');

  // maak een query om alle spellen op te vragen
  $query = "select * from birthdays order by month, day";
  
  // voer de query uit
  $result = mysqli_query($connection, $query);
  // loop door alle rijen heen
$lastmonth = -1;

while ($row = mysqli_fetch_assoc ($result))
	
{
	// haal gegevens die we nodig hebben uit de rij
	$id = $row["id"];
	$person = $row["person"];
	$day = $row["day"];
	$month = $row["month"];
	$year = $row["year"];
	
	$tpl->newBlock( "birthdays");
	$tpl->assign( "id", $id );
	$tpl->assign( "person", $person );
    $tpl->assign( "day", $day );
    if($lastmonth == $month){
        $tpl->assign( "month","");
    }else {
        $tpl->assign( "month", $months[$month]);
    };
     $tpl->assign( "year", $year );
    $lastmonth = $month;
}

$tpl->gotoBlock( "_ROOT" );
$tpl->printToScreen();