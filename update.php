<?php
	// connect with servername, username, password, databasename
	$connection = new mysqli('localhost','root','','calendar');

	// prepare id and values to be updated in table books in database
	$id = $_POST['id'];
	$person = $_POST['person'];
	$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
	
	// prepare update instruction
	$sql = "UPDATE birthdays SET person = '$person', day = '$day',month='$month',year='$year' WHERE id = $id";
	
	// execute update instruction
	$connection->query($sql);
header('Location: index.php');
?>