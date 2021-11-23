<?php


class CWerte  {
	
	var $temp;
	var $niederschlag;
	var $sonnenstunden;
	var $feuchtigkeit;
	var $wind;
	var $druck;
	var $zeit;
	
	
	function getTemp() {
		return $this->temp;
	}
	
	function setTemp($neueTemp) {
		$this->temp = $neueTemp;
	}
	
	
	
	function getNiederschlag() {
		return $this->niederschlag;
	}
	
	function setNiederschlag($neuerNiederschlag) {
		$this->niederschlag = $neuerNiederschlag;
	}
	
	
	
	function getSonnenstunden() {
		return $this->sonnenstunden;
	}
	
	function setSonnenstunden($neueSonnenstunden) {
		$this->sonnenstunden = $neueSonnenstunden;
	}
	
	
	
	function getFeuchtigkeit() {
		return $this->feuchtigkeit;
	}

	function setFeuchtigkeit($neueFeuchtigkeit) {
		$this->feuchtigkeit = $neueFeuchtigkeit;
	}
	
	
	
	function getWind() {
		return $this->wind;
	}
	
	function setWind($neuerWind) {
		$this->wind = $neuerWind;
	}
	
	
	
	function getDruck() {
		return $this->druck;
	}
	
	function setDruck($neuerDruck) {
		$this->druck = $neuerDruck;
	}
	
	
	
	function getZeit() {
		return $this->zeit;
	}
	
	function setZeit($neueZeit) {
		$this->zeit = $neueZeit;
	}
	
	function toString() {
		return "CWerte(temp: " . $this->temp . ", nieder: $this->niederschlag, sonnenstunden: $this->sonnenstunden, feuchtigkeit: $this->feuchtigkeit, wind: $this->wind, druck: $this->druck, zeit: $this->zeit)";
	}
}


?>