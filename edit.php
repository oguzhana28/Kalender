<?php
include_once( "./class.TemplatePower.inc.php" );

$tpl = new TemplatePower( "./tpl/edit.tpl.html" );
$tpl->prepare();

  // maak een verbinding met mysqli
  $connection = mysqli_connect('localhost', 'root','');
	
  // geef aan welke database we willen gebruiken
  mysqli_select_db($connection, 'calendar');

  // maak een query om alle spellen op te vragen
  $id = $_GET['id'];
  $query = "select * from birthdays WHERE id = $id";
  
  // voer de query uit
  $result = mysqli_query($connection, $query);
  // loop door alle rijen heen

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
    $tpl->assign( "month", $month);
    $tpl->assign( "year", $year );
}

$tpl->gotoBlock( "_ROOT" );
$tpl->printToScreen();