<?php
require 'database.php'
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta http-equiv="refresh" content="30"/>
  <title>GardenBot - WebUI</title>

  <!-- CSS  -->
  <link href="css/google-material-icons.css" rel="stylesheet"> 
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="js/jquery.3.2.1.min.js"></script>
</head>
<body>
  <header>
  <nav class="green darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="center brand-logo"><i class="material-icons">invert_colors</i>GardenBot</a>
    </div>
  </nav>
  </header>
  <main>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
	  
	  <h3 class="header blue-text accent-2">Ovzduší</h3>
	  <div class="row">
		<div class="card-panel horizontal col s5 offset-s1 blue darken-1">
			<h5 class="white-text light">Teplota</h5>
			<div class="center white-text">
				<p>Aktuální:</p><h5><b><?php echo $s_air_temp; ?> °C</b></h5>
				<p>Aktualizováno před: <b><?php echo (gmdate('i',time()-$s_air_temp_time)); ?>m <?php echo (gmdate('s',time()-$s_air_temp_time)); ?>s</b></p>
				<br>
				<p>Nastavená:</p><h5><b id="r_air_temp"><?php echo $r_air_temp; ?> °C</b></h5>
				<a class="btn-floating btn waves-effect waves-light blue darken-4" onclick="addAirTemp()"><i class="material-icons">add</i></a>
				<a class="btn-floating btn waves-effect waves-light blue darken-4" onclick="removeAirTemp()"><i class="material-icons">remove</i></a>
				<br><br>
			</div>
		</div>
		<div class="card-panel horizontal col s5  offset-s1 blue darken-2">
			<h5 class="white-text light">Vlhkost</h5>
				<div class="center white-text">
				<p>Aktuální:</p><h5><b><?php echo $s_air_humidity; ?>%</b></h5>
				<p>Aktualizováno před: <b><?php echo (gmdate('i',time()-$s_air_humidity_time)); ?>m <?php echo (gmdate('s',time()-$s_air_humidity_time)); ?>s</b></p>
				<br>
				<p>Nastavená:</p><h5><b id="r_air_humidity"><?php echo $r_air_humidity; ?> %</b></h5>
				<a class="btn-floating btn waves-effect waves-light light-blue lighten-2" onclick="addAirHumidity()"><i class="material-icons">add</i></a>
				<a class="btn-floating btn waves-effect waves-light light-blue lighten-2" onclick="removeAirHumidity()"><i class="material-icons">remove</i></a>
				<br><br>
			</div>
		</div>
	  </div>
	  
	  <br><br>
	  
	  <h3 class="header brown-text darken-4">Půda</h3>
	  <div class="row">
		<div class="card-panel horizontal col s5 offset-s1 brown darken-2">
			<h5 class="white-text light">Teplota</h5>
				<div class="center white-text">
				<p>Aktuální:</p><h5><b><?php echo $s_soil_temp; ?> °C</b></h5>
				<p>Aktualizováno před: <b><?php echo (gmdate('i',time()-$s_soil_temp_time)); ?>m <?php echo (gmdate('s',time()-$s_soil_temp_time)); ?>s</b></p>
				<br>
				<p>Nastavená:</p><h5><b id="r_soil_temp"><?php echo $r_soil_temp; ?> °C</b></h5>
				<a class="btn-floating btn waves-effect waves-light deep-orange darken-4" onclick="addSoilTemp()"><i class="material-icons">add</i></a>
				<a class="btn-floating btn waves-effect waves-light deep-orange darken-4" onclick="removeSoilTemp()"><i class="material-icons">remove</i></a>
				<br><br>
			</div>
		</div>
		<div class="card-panel horizontal col s5  offset-s1 brown darken-1">
			<h5 class="white-text light">Vlhkost</h5>
				<div class="center white-text">
				<p>Aktuální:</p><h5><b><?php echo $s_soil_humidity; ?> %</b></h5>
				<p>Aktualizováno před: <b><?php echo (gmdate('i',time()-$s_soil_humidity_time)); ?>m <?php echo (gmdate('s',time()-$s_soil_humidity_time)); ?>s</b></p>
				<br>
				<p>Nastavená:</p><h5><b id="r_soil_humidity"><?php echo $r_soil_humidity; ?> %</b></h5>
				<a class="btn-floating btn waves-effect waves-light deep-orange darken-4" onclick="addSoilHumidity()"><i class="material-icons">add</i></a>
				<a class="btn-floating btn waves-effect waves-light deep-orange darken-4" onclick="removeSoilHumidity()"><i class="material-icons">remove</i></a>
				<br><br>
			</div>
		</div>
	  </div>
	  
      <br><br>

    </div>
  </div>

  </main>
  <footer class="page-footer green darken-3">

    <div class="footer-copyright">
      <div class="container">
      Vytvořili 
	  <span class="light-green-text text-lighten-1">Jan Černý</span>,
	  <span class="light-green-text text-lighten-1">Jan Gančev</span>,
	  <span class="light-green-text text-lighten-1">Lukáš Kavalír</span>,
	  <span class="light-green-text text-lighten-1">Jan Novotný</span> pro <a class="light-green-text text-lighten-1" href="http://ssps.cz" target="_blank">Smíchovskou SPŠ</a>, 2017/2018
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="js/materialize.js"></script>
  <script>
	//Nastaveni JS promennych z PHP promennych ziskanych z database
	var r_air_temp = <?php echo $r_air_temp;?>;
	var r_air_humidity = <?php echo $r_air_humidity;?>;
	var r_soil_temp = <?php echo $r_soil_temp;?>;
	var r_soil_humidity = <?php echo $r_soil_humidity;?>;
	
	//OVZDUSI - Teplota
		function addAirTemp() {
			if (r_air_temp < 35) {
				//Zmena cisla vypsaneho na webu
				document.getElementById("r_air_temp").innerHTML = ++r_air_temp + ' °C';
				//Odeslanit _GET pozadavku na PHP script s promennymi				
				var img = new Image();
				img.src = 'database.php?funkce=setAirTemp&value='+r_air_temp;
			}
		}
		
		function removeAirTemp() {
			if (r_air_temp > 20) {
				document.getElementById("r_air_temp").innerHTML = --r_air_temp + ' °C';
				var img = new Image();
				img.src = 'database.php?funkce=setAirTemp&value='+r_air_temp;
			}
		}
	
	//OVZDUSI - Vlhkost
		function addAirHumidity() {
			if (r_air_humidity < 100) {
				document.getElementById("r_air_humidity").innerHTML = (r_air_humidity+=5) + ' %';
				var img = new Image();
				img.src = 'database.php?funkce=setAirHumidity&value='+r_air_humidity;
			}
		}
		
		function removeAirHumidity() {
			if (r_air_humidity > 20) {
				document.getElementById("r_air_humidity").innerHTML = (r_air_humidity-=5) + ' %';
				var img = new Image();
				img.src = 'database.php?funkce=setAirHumidity&value='+r_air_humidity;
			}
		}
		
		
		
		
	//PUDA - Teplota
		function addSoilTemp() {
			if (r_soil_temp < 35) {
				document.getElementById("r_soil_temp").innerHTML = ++r_soil_temp + ' °C';
				var img = new Image();
				img.src = 'database.php?funkce=setSoilTemp&value='+r_soil_temp;
			}
		}
		
		function removeSoilTemp() {
			if (r_soil_temp > 20) {
				document.getElementById("r_soil_temp").innerHTML = --r_soil_temp + ' °C';
				var img = new Image();
				img.src = 'database.php?funkce=setSoilTemp&value='+r_soil_temp;
			}
		}
	
	//PUDA - Vlhkost
		function addSoilHumidity() {
			if (r_soil_humidity < 100) {
				document.getElementById("r_soil_humidity").innerHTML = (r_soil_humidity+=5) + ' %';
				var img = new Image();
				img.src = 'database.php?funkce=setSoilHumidity&value='+r_soil_humidity;
			}
		}
		
		function removeSoilHumidity() {
			if (r_soil_humidity > 20) {
				document.getElementById("r_soil_humidity").innerHTML = (r_soil_humidity-=5) + ' %';
				var img = new Image();
				img.src = 'database.php?funkce=setSoilHumidity&value='+r_soil_humidity;
			}
		}
  </script>
  </body>
</html>