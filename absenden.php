<?php
	global $CONNECTED_DB;
	$tableName = "messwerte";

	// TODO: Use query (?csv=temp;niederschlag;...) instead of local file

	if(!$CONNECTED_DB)
	{
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}

	require_once("CWerte.php");
	require_once("DAOWerte.php");
	require_once("CParser.php");
	
	$parser = new CParser();
	$content = $parser->readFile();
	$werte = $parser->parse();
	
	for ($i = 0; $i < count($werte); $i++) {
		$wert = $werte[$i];
		echo $wert->toString();
		echo "<br />";
		$sql = "INSERT INTO {$tableName} (temperatur, feuchtigkeit, wind, niederschlag, sonnenstunden, druck, zeit) VALUES ('{$wert->getTemp()}', '{$wert->getFeuchtigkeit()}', '{$wert->getWind()}', '{$wert->getNiederschlag()}', '{$wert->getSonnenstunden()}', '{$wert->getDruck()}', '{$wert->getZeit()}')";

		if (mysqli_query($CONNECTED_DB, $sql)) {
			echo "erfolgreich<br />";
		} else {
			echo "fehlerhaft";
		}
	}
?>