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
	
	function getAverageTemperature($db, $lowerBound, $upperBound) {
		$sql = "SELECT temperatur FROM messwerte WHERE zeit BETWEEN '" . $lowerBound . "' AND '" . $upperBound . "'";
		$query = mysqli_query($db, $sql);
		$rollingSum = 0;
		$rollingCount = 0;
		while($row = mysqli_fetch_object($query)) {
			$rollingSum += $row->temperatur;
			$rollingCount += 1;
		}
		if($rollingCount == 0) {
			return null;
		}
		return $rollingSum / $rollingCount;
	}
	
	function calculateSunHoursForToday($db) {
		global $TABLE_NAME;
		global $SUMMER_TEMPERATURE_TRESHOLD;
		global $SUN_HOURS_SUMMER_TRESHOLD;
		global $SUN_HOURS_WINTER_TRESHOLD;
		$todayMidnight = date("Y-m-d")." 00:00:00";
		$now = date("Y-m-d H:m:s");
		
		$avgTemp = $this->getAverageTemperature($db, $todayMidnight, $now);
		if($avgTemp < $SUMMER_TEMPERATURE_TRESHOLD) {
			$treshold = $SUN_HOURS_WINTER_TRESHOLD;
		} else {
			$treshold = $SUN_HOURS_SUMMER_TRESHOLD;
		}
		
		$sql = "SELECT lichtstaerke FROM messwerte WHERE zeit > '" . $todayMidnight . "'";
		$query = mysqli_query($db, $sql);
		$sunHours = 0;
		while($row = mysqli_fetch_object($query)) {
			if($row->lichtstaerke >= $treshold) {
				$sunHours += 1;
			}
		}
		return $sunHours;
	}
	
	function calculateSunHoursForYesterday($db) {
		global $TABLE_NAME;
		global $SUMMER_TEMPERATURE_TRESHOLD;
		global $SUN_HOURS_SUMMER_TRESHOLD;
		global $SUN_HOURS_WINTER_TRESHOLD;
		$today = date("Y-m-d") . " 00:00:00";
		$todayTimestamp = strtotime($today);
		$yesterdayTimestamp = $todayTimestamp - 24 * 60 * 60;
		$yesterday = date("Y-m-d", $yesterdayTimestamp);
		
		$avgTemp = $this->getAverageTemperature($db, $yesterday, $today);
		if($avgTemp >= $SUMMER_TEMPERATURE_TRESHOLD) {
			$treshold = $SUN_HOURS_SUMMER_TRESHOLD;
		} else {
			$treshold = $SUN_HOURS_WINTER_TRESHOLD;
		}
		
		$sql = "SELECT lichtstaerke FROM messwerte WHERE zeit BETWEEN '" . $yesterday . "' AND '" . $today . "'";
		$query = mysqli_query($db, $sql);
		$sunHours = 0;
		while($row = mysqli_fetch_object($query)) {
			if($row->lichtstaerke >= $treshold) {
				$sunHours += 1;
			}
		}
		return $sunHours;
	}
}
?>
