CREATE DATABASE IF NOT EXISTS wetterstation;
CREATE TABLE IF NOT EXISTS messwerte (id int NOT NULL AUTO_INCREMENT, temperatur double, niederschlag int, lichtstaerke double, feuchtigkeit double, wind double, druck double, zeit TIMESTAMP, PRIMARY KEY (id));
