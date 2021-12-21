<?php
require_once("constants.php");
require_once("DAOWerte.php");
global $CONNECTED_DB;
$dao = new DAOWerte();

echo $dao->calculateSunHoursForToday($CONNECTED_DB);
?>
