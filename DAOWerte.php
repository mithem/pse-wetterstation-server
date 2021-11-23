<?php


class DAOWerte {
	
	
	function getWerte($db) {
		$tmpWerte = new CWerte();
		$sql = "SELECT * FROM `messwerte` ORDER BY zeit DESC LIMIT 1";
		$ergebnis = mysqli_query($db, $sql);
		
		while($row = mysqli_fetch_object($ergebnis))
{
			$tmpWerte->setTemp($row->temperatur);
			$tmpWerte->setNiederschlag($row->niederschlag);
			$tmpWerte->setSonnenstunden($row->sonnenstunden);
			$tmpWerte->setWind($row->wind);
			$tmpWerte->setFeuchtigkeit($row->feuchtigkeit);
			$tmpWerte->setDruck($row->druck);
		}
		
		return $tmpWerte;
		
	}
	
	
}


?>
