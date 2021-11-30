<?php
	$dbName = "wetterstation";
	$tableName = "adminEinstellungen";

	$db = mysqli_connect("localhost", "root", "", $dbName);
	if(!$db)
	{
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}
	
	echo print_r($_POST);
	if (array_key_exists("interval", $_POST)) {
		$interval = htmlspecialchars($_POST["interval"]);
	} else {
		echo "'interval'-Parameter nicht vorhanden.";
		exit;
	}
	$sql = "INSERT INTO {$tableName} (key) VALUES ('{$interval}')";

	if (mysqli_query($db, $sql)) {
		echo "erfolgreich: $interval Sekunden.";
	} else {
		echo "fehlerhaft.";
	}
?>