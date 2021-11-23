<!DOCTYPE html>
<html>
<head>
	<title>Statistiken</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/sb-admin-2@3.3.8/dist/css/sb-admin-2.css" rel="stylesheet" />
	
	<!--Fonts-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	
	<style>
		html, body {
			height: 100%;
		}
		
		nav.navbar {
			/*padding: 0px 10px;*/
			margin: 0px 40px;
			align-items: center;
		}
		nav.navbar > .title {
			font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
			font-weight: 400;
			line-height: 1.5;
			color: #858796;
			text-align: left;
			box-sizing: border-box;
			font-size: 2rem;
		}
		
		.chart-container {
			width: 800px;
		}
		.root {
			display: flex;
			margin: 10px;
			justify-content: center;
			align-items: center;
			height: 90%;
		}
		.root .group-row {
			display: flex;
			flex-direction: row;
			gap: 5rem;
		}
		
		.settings-container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			gap: 1rem;
		}
		
		a.title, a.title:hover {
			color: #858796;
			text-decoration: none;
		}
	</style>
	<script>
		function initChart() {
			<?php
				echo "prompt('hello, world!')";
			?>
			let measurements = [{timestamp: 1000000, temperature: 20.1}, {timestamp: 1000001, temperature: 21.1}, {timestamp: 1000002, temperature: 21.5}, {timestamp: 1000003, temperature: 22.0}, {timestamp: 1000004, temperature: 24}]
			let timestamps = measurements.map(measurement => measurement.timestamp);
			let temperatures = measurements.map(measurement => measurement.temperature); // viele Elemente könnten via Internet ohnehin nicht übermittelt werden
			let label = "Temperatur";
			var ctx = document.getElementById('chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: timestamps,
					datasets: [{
						label: label,
						data: temperatures,
						backgroundColor: [],
						borderColor: [],
						borderWidth: 1
					}]
				}
			});
		}
	</script>
</head>
<body>
	<nav class="navbar">
		<a class="title" href="/" >Wetter Lohmar</a>
		<div class="spacer"></div>
		<a class="btn btn-primary" href="/">Aktuelles Wetter</a>
	</nav>
	<div class="root">
		<div class="group-row">
			<div class="chart-container">
				<canvas id="chart"></canvas>
			</div>
			<div class="settings-container">
				<button class="btn btn-primary">Zeitraum &auml;ndern</button>
				<select class="form-select">
					<option value="temperatur" selected>Temperatur</option>
					<option value="niederschlag">Niederschlag</option>
					<option value="sonnenstunden">Sonnenstunden</option>
					<option value="windgeschwindigkeit">Windgeschwindigkeit</option>
					<option value="luftfeuchtigkeit">Luftfeuchtigkeit</option>
					<option value="luftdruck">Luftdruck</option>
				</select>
			</div>
		</div>
	</div>
	<script>initChart();</script>
</body>