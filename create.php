<?php
var_dump($_POST);


include_once( "./class.TemplatePower.inc.php" );


$tpl = new TemplatePower( "./tpl/create.tpl.html" );
$tpl->prepare();

if(isset($_POST["submit"])){


  // maak een verbinding met mysqli
  $connection = mysqli_connect('localhost', 'root','');
	
  // geef aan welke database we willen gebruiken
  mysqli_select_db($connection, 'calendar');

  // maak een query om alle spellen op te vragen
  $query = "INSERT INTO birthdays (person, day, month, year)
VALUES ('".$_POST["Fullname"]."', '".$_POST["Day"]."', '".$_POST["Month"]."', '".$_POST["Year"]."')";
  
   
  // voer de query uit
  $result = mysqli_query($connection, $query);
    
}
$tpl->printToScreen();