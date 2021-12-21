<?php
	require_once("CWerte.php");
	require_once("DAOWerte.php");
	require_once("CParser.php");
	require_once("constants.php");

	global $CONNECTED_DB;
	if(!$CONNECTED_DB) {
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}

	$meinWert = new CWerte();
	$meineDB = new DAOWerte();
	
	$meinWert = $meineDB->getWerte($CONNECTED_DB);

?>
<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<title>Statistiken</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/sb-admin-2@3.3.8/dist/css/sb-admin-2.css" rel="stylesheet" />
	
	<!--Fonts
	
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	-->
	<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
	
	<style>
		#container {
		  width: 100%;
		  height: 100%;
		  margin: 0;
		  padding: 0;
		}
		html, body {
			height: 98%;
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
	<!--<script>
		function initChart() {
			let measurements = [{timestamp: 1000000, temperature: 20.1}, {timestamp: 1000001, temperature: 21.1}, {timestamp: 1000002, temperature: 21.5}, {timestamp: 1000003, temperature: 22.0}, {timestamp: 1000004, temperature: 24}]
			let timestamps = measurements.map(measurement => measurement.timestamp);
			let temperatures = measurements.map(measurement => measurement.temperature); // viele Elemente könnten via Internet ohnehin nicht übermittelt werden
			let label = $_POST['Typ'];
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
	</script>-->

<body>
</div>
	
	<nav class="navbar">
		<a class="title" href="/" style="font-size: 4rem">Wetter Lohmar</a>
		<a class="btn btn-primary" href="/" style="font-size: 2rem">Aktuelles Wetter</a>
		<!--<a class="btn btn-primary" href="/aendern.php">Statistik ändern</a>-->
	</nav>
	<div class="root">
		<div class="group-row" style="margin-right:10px">
			<div class="settings-container">
				 
					<select class="form-select" name="Zeitraum[]" id="abc">
						<option value="" disabled Select>Zeitraum auswählen</option>
						<option value="woche" selected>letzte Woche</option>
						<!--<option value="eineWoche">diese Woche</option>
						<option value="einMonat">dieserMonat</option>
						<option value="einJahr">dieses Jahr</option>
						<option value="beginn">seit Beginn der Messung</option>-->
					</select>
					<select class="form-select" name="Wert[]" id="def">
						<option value="" disabled Select>Typ auswählen</option>
						<option value="temperatur" >Temperatur</option>
						<option value="niederschlag">Niederschlag</option>
						<option value="sonnenstunden">Lichtstaerke</option>
						<option value="wind">Windgeschwindigkeit</option>
					</select>
					
					<script>
					function changeURL(){
						window.location.href="/statistiken.php?zeit="+document.getElementById('abc').value+"&wert="+document.getElementById('def').value
					}
					</script>
						<input type="button" name="submitTyp" value="Wählen" onClick="changeURL()">				
			</div>
		</div>	
			<div id="container"></div>
			
			<script>
				
				<?php
					echo "const wert='".$_GET['wert']."'"
				?>
				
				anychart.onDocumentReady(function () {
				  // create data set on our data
				  var dataSet = anychart.data.set(getData());
				switch(wert){
					case 'temperatur':
						// map data for the first series, take x from the zero column and value from the first column of data set
						var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });
						break;
					case 'niederschlag':	
						// map data for the second series, take x from the zero column and value from the second column of data set
						var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });
						break;
					case 'sonnenstunden':	
						// map data for the third series, take x from the zero column and value from the third column of data set
						var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });
						break;
					case 'wind':
						var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });
						break;
					default:
						// map data for the first series, take x from the zero column and value from the first column of data set
						var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });
						break;
				}
						// create line chart
						var chart = anychart.line();

						// turn on chart animation
						chart.animation(true);

						// set chart padding
						chart.padding([10, 20, 5, 20]);

						// turn on the crosshair
						chart.crosshair().enabled(true).yLabel(false).yStroke(null);

						// set tooltip mode to point
						chart.tooltip().positionMode('point');

						// set chart title text settings
						chart.title(
						'Wetter in Lohmar'
						 );
				
				//ERSTES CASE
				  // set yAxis title
				  switch(wert){
						case 'temperatur':
							chart.yAxis().title('Temperatur in Celsius');
							break;
						case 'niederschlag':
							chart.yAxis().title('3:kein Regen 2:wenig Regen 1:viel Regen 0:starker Regen');
							break;
						case 'sonnenstunden':
							chart.yAxis().title('Lichtstaerke in Lux');
							break;
						case 'wind':
							chart.yAxis().title('Windgeschwindigkeit in m/s');
							break;
						default:
						chart.yAxis().title('Temperatur in Celsius');
						break;
				  }
				  chart.xAxis().labels().padding(5);
				  // create first series with mapped data
				  var firstSeries = chart.line(firstSeriesData);
				  firstSeries.name('Temperatur');
				  firstSeries.hovered().markers().enabled(true).type('circle').size(4);
				  firstSeries
					.tooltip()
					.position('right')
					.anchor('left-center')
					.offsetX(5)
					.offsetY(5);

				  // create second series with mapped data
				  var secondSeries = chart.line(secondSeriesData);
				  secondSeries.name('Niederschlag');
				  secondSeries.hovered().markers().enabled(true).type('circle').size(4);
				  secondSeries
					.tooltip()
					.position('right')
					.anchor('left-center')
					.offsetX(5)
					.offsetY(5);

				  // create third series with mapped data
				  var thirdSeries = chart.line(thirdSeriesData);
				  thirdSeries.name('Sonnenstunden');
				  thirdSeries.hovered().markers().enabled(true).type('circle').size(4);
				  thirdSeries
					.tooltip()
					.position('right')
					.anchor('left-center')
					.offsetX(5)
					.offsetY(5);
					
					// create fourth series with mapped data
				  var fourthSeries = chart.line(fourthSeriesData);
				  fourthSeries.name('Windgeschwindigkeit');
				  fourthSeries.hovered().markers().enabled(true).type('circle').size(4);
				  fourthSeries
					.tooltip()
					.position('right')
					.anchor('left-center')
					.offsetX(5)
					.offsetY(5);

				  // turn the legend on
				  chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

				  // set container id for the chart
				  chart.container('container');
				  // initiate chart drawing
				  chart.draw();
				});
				
				var temp = <?php echo json_encode($meinWert->getTemp()); ?>;
				var nieder = <?php echo json_encode($meinWert->getNiederschlag()); ?>;
				var licht = <?php echo json_encode($meinWert->getLichtstaerke()); ?>;
				var wind = <?php echo json_encode($meinWert->getWind()); ?>;
				//var temp-1 = <?php echo json_encode($meinWert->getTemp()); ?>;
				//var nieder-1 = <?php echo json_encode($meinWert->getTemp()); ?>;
				//var licht-1 = <?php echo json_encode($meinWert->getTemp()); ?>;
				//var temp-2 = <?php echo json_encode($meinWert->getNiederschlag()); ?>;
				//var nieder-2 = <?php echo json_encode($meinWert->getNiederschlag()); ?>;
				//var licht-2 = <?php echo json_encode($meinWert->getNiederschlag()); ?>;
				//var temp-3 = <?php echo json_encode($meinWert->getLichtstaerke()); ?>;
				//var nieder-3 = <?php echo json_encode($meinWert->getLichtstaerke()); ?>;
				//var lciht-3 = <?php echo json_encode($meinWert->getLichtstaerke()); ?>;
				
				function getData() {
				  return [
					['1986', 3.6, 2.3, 2.8, 1],
					['1987', 7.1, 4.0, 4.1, 6],
					['1988', 8.5, 6.2, 5.1, 4],
					['1989', 9.2, 11.8, 6.5, 9],
					['1990', 10.1, 13.0, 12.5, 13],
					['1991', 11.6, 13.9, 18.0, 16],
					['1992', temp, nieder, licht,wind],
					];
				}
		</script>
		<div class="row" style="height:10px"></div>
</body>
</html>