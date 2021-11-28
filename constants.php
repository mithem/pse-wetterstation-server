<?php
$DB_NAME = "wetterstation";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_HOST = "localhost";
$READINGS_TABLE = "messwerte";
$SCHOOL_MONITOR_TABLE = "schulmonitor";

$CONNECTED_DB = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
?>