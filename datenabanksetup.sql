CREATE DATABASE IF NOT EXISTS wetterstation;
CREATE TABLE IF NOT EXISTS messwerte (temperatur double, niederschlag int, lichtstaerke double, feuchtigkeit double, wind double, druck double, zeit TIMESTAMP);
