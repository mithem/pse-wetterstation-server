<?php
require_once("constants.php");


class DAOWerte {
	function getWerte($db) {
		$tmpWerte = new CWerte();
		$sql = "SELECT * FROM `messwerte` ORDER BY zeit DESC LIMIT 1";
		$ergebnis = mysqli_query($db, $sql);
		
		while($row = mysqli_fetch_object($ergebnis)) {
			$tmpWerte->setTemp($row->temperatur);
			$tmpWerte->setNiederschlag($row->niederschlag);
			$tmpWerte->setLichtstaerke($row->lichtstaerke);
			$tmpWerte->setWind($row->wind);
			$tmpWerte->setFeuchtigkeit($row->feuchtigkeit);
			$tmpWerte->setDruck($row->druck);
		}			
		return $tmpWerte;
	}
	
	function calculateSunHoursForToday($db) {
		global $TABLE_NAME;
		global $SUN_HOURS_TRESHOLD;
		$today = date("Y-m-d")." 00:00:00";
		$sql = "SELECT lichtstaerke FROM messwerte WHERE zeit > '" . $today . "'";
		$query = mysqli_query($db, $sql);
		$sunHours = 0;
		while($row = mysqli_fetch_object($query)) {
			if($row->lichtstaerke >= $SUN_HOURS_TRESHOLD) {
				$sunHours += 1;
			}
		}
		return $sunHours;
	}
}
?>
