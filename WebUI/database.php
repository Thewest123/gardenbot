<?php
 
    date_default_timezone_set('CEST');
  
    $file_db = new PDO('sqlite:database.db');  
	
	$sensors = $file_db->query("SELECT * FROM sensors");
    foreach($sensors as $s_row) {
		$s_value[] = $s_row['value'];
		$s_time[] = $s_row['time'];
	}
	
	$s_air_temp = $s_value[0];
	$s_air_humidity = $s_value[1];
	$s_soil_temp = $s_value[2];
	$s_soil_humidity = $s_value[3];
	
	$s_air_temp_time = $s_time[0];
	$s_air_humidity_time = $s_time[1];
	$s_soil_temp_time = $s_time[2];
	$s_soil_humidity_time = $s_time[3];
	
	$required = $file_db->query("SELECT * FROM required");
    foreach($required as $r_row) {
		$r_value[] = $r_row['value'];
	}
	
	$r_air_temp = $r_value[0];
	$r_air_humidity = $r_value[1];
	$r_soil_temp = $r_value[2];
	$r_soil_humidity = $r_value[3];
	
	if(isset($_GET['funkce']) && $_GET['funkce'] == "setAirTemp") {
		$value = $_GET['value'];
		$file_db->query("UPDATE required SET value = ".$value." WHERE name = 'air_temp'");
	}
	
	if(isset($_GET['funkce']) && $_GET['funkce'] == "setAirHumidity") {
		$value = $_GET['value'];
		$file_db->query("UPDATE required SET value = ".$value." WHERE name = 'air_humidity'");
	}
	
	if(isset($_GET['funkce']) && $_GET['funkce'] == "setSoilTemp") {
		$value = $_GET['value'];
		$file_db->query("UPDATE required SET value = ".$value." WHERE name = 'soil_temp'");
	}
	
	if(isset($_GET['funkce']) && $_GET['funkce'] == "setSoilHumidity") {
		$value = $_GET['value'];
		$file_db->query("UPDATE required SET value = ".$value." WHERE name = 'soil_humidity'");
	}

?>