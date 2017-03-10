<?php

include_once( "./class.TemplatePower.inc.php" );

$tpl = new TemplatePower( "./tpl/index.tpl.html" );
$tpl->prepare();

  // maak een verbinding met mysqli
  $connection = mysqli_connect('localhost', 'root','');
	
  // geef aan welke database we willen gebruiken
  mysqli_select_db($connection, 'calendar');

  // maak een query om alle spellen op te vragen
    $id = $_GET['id'];

  $query = "DELETE FROM birthdays WHERE id = $id";
  
  // voer de query uit
  $result = mysqli_query($connection, $query);
    
$tpl->printToScreen();




header('Location: ' . $_SERVER['HTTP_REFERER']);
?>