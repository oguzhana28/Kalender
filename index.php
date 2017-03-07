<?php
include_once( "./class.TemplatePower.inc.php" );

$tpl = new TemplatePower( "./tpl/index.tpl.html" );
$tpl->prepare();

  // maak een verbinding met mysql
  $connection = mysqli_connect('localhost', 'root','');
	
  // geef aan welke database we willen gebruiken
  mysqli_select_db($connection, "year2");
  
  // maak een query om alle spellen op te vragen
  $query = "select * from Calender order by Birthday_ID";
  	
  // voer de query uit
  $result = mysqli_query($connection, $query);
  // loop door alle rijen heen
while ($row = mysqli_fetch_assoc ($result))
	
{
    $Birthday_ID = $row["Birthday_ID"];
    $Firstname = $row["Firstname"];
    $Lastname = $row["Lastname"];
    $Age = $row["Age"];
    
    $tpl->newBlock( "calender");
    $tpl->assign( "Birthday_ID", $Birthday_ID );
    $tpl->newBlock( "calender_birthdays");
    $tpl->assign( "Firstname", $Firstname);
    $tpl->assign( "Lastname", $Lastname);
    $tpl->assign( "Age", $Age);
    }


$tpl->gotoBlock( "_ROOT" );
$tpl->printToScreen();