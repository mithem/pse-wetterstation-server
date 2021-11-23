<?php
require_once("CWerte.php");
class CParser {
	function readFile() {
		$path = "test.csv";
		$content = file_get_contents($path);
		return $content;
	}
	
	function parse2($string) {
		$array = str_getcsv($string);
		console_log(implode(", ", $array));
		$werteArr = [];
		$count = count($array);
		$i = 0;
		$j = 0;
		while ($i < $count - 7) {
			$werteArr[$j] = new CWerte();
			$werteArr[$j]->setTemp($array[$i]);
			$werteArr[$j]->setNiederschlag($array[$i + 1]);
			$werteArr[$j]->setSonnenstunden($array[$i + 2]);
			$werteArr[$j]->setFeuchtigkeit($array[$i + 3]);
			$werteArr[$j]->setWind($array[$i + 4]);
			$werteArr[$j]->setDruck($array[$i + 5]);
			$werteArr[$j]->setZeit($array[$i + 6]);
			console_log($werteArr[$j]->toString());
			$i += 8;
			$j += 1;
		}
		return $werteArr;
	}
	
	function parse() {
		$row = 0;
		$werte = [];
		if (($handle = fopen("test.csv", "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			//echo "<p> $num fields in line $row: <br /></p>\n";
			$werte[$row] = new CWerte();
			$werte[$row]->setTemp($data[0]);
			$werte[$row]->setNiederschlag($data[1]);
			$werte[$row]->setSonnenstunden($data[2]);
			$werte[$row]->setFeuchtigkeit($data[3]);
			$werte[$row]->setWind($data[4]);
			$werte[$row]->setDruck($data[5]);
			$werte[$row]->setZeit($data[6]);
			$row++;
		  }
		  fclose($handle);
		}
		return $werte;
	}
}
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>