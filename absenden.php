<?php
	require_once("constants.php");
	require_once("CWerte.php");
	require_once("DAOWerte.php");
	require_once("CParser.php");
	
	global $CONNECTED_DB;
	$tableName = "messwerte";

	if(!$CONNECTED_DB)
	{
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}
	
	if (parse_url($_SERVER["REQUEST_URI"])["query"] == null) {
		echo "Keine Parameter.";
		exit;
	}
	
	$parser = new CParser();
	$content = $parser->readFile();
	$wert = $parser->parseURLString();

	echo $wert->toString();
	echo "<br />";
	$sql = "INSERT INTO {$tableName} (temperatur, feuchtigkeit, wind, niederschlag, sonnenstunden, druck, zeit) VALUES ('{$wert->getTemp()}', '{$wert->getFeuchtigkeit()}', '{$wert->getWind()}', '{$wert->getNiederschlag()}', '{$wert->getSonnenstunden()}', '{$wert->getDruck()}', UNIX_TIMESTAMP('{$wert->getZeit()}'))";
	
	$result = mysqli_query($CONNECTED_DB, $sql);

	if ($result) {
		echo "erfolgreich<br />";
	} else {
		echo "fehlerhaft<br />";
		echo $result;
	}
?>