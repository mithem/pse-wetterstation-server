<?php
require_once("constants.php");
require_once("DAOWerte.php");
require_once("CWerte.php");
global $CONNECTED_DB;

$supported = array(
	0 => "temperatur",
	1 => "niederschlag",
	2 => "wind",
);

$datentyp = $_GET["datentyp"];
if ($datentyp == null || !in_array($datentyp, $supported)) {
	header("Location: " . "/widget.php?datentyp=temperatur");
	echo "kein g&uuml;ltiger Datentyp";
	exit;
}

$dao = new DAOWerte();
$wert = $dao->getWerte($CONNECTED_DB);
?>
<html>
<head>
	<title>Widget</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<style>
		.body {
			display: flex;
		}
		.card {
			width: 20rem;
		}
		.card > nav {
			width: 100%;
			display: flex;
			justify-content: center;
		}
		.card > img {
			width: 100%;
			height: auto;
		}
		.card-container-column {
			display: flex;
			flex-flow: column;
			justify-content: center;
			height: 100%;
		}
		.card-container-row {
			display: flex;
			justify-content: center;
		}
	</style>
</head>
<body>
	<div class="card-container-column">
		<div class="card-container-row">
			<div class="card">
				<?php
					switch($datentyp) {
						case "temperatur":
							$unit = "&deg;";
							$value = $wert->getTemp();
							switch($value) {
								case $value <= 3:
									$imgUrl = "https://images6.fanpop.com/image/photos/43100000/Winter-gdragon612-43123103-1000-1166.jpg";
									break;
								case $value >= 27:
									$imgUrl = "https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2020/07/solar_orbiter_s_first_view_of_the_sun2/22133123-1-eng-GB/Solar_Orbiter_s_first_view_of_the_Sun_pillars.png";
									break;
								default:
									$imgUrl = "https://imonkey-blog.imgix.net/blog/wp-content/uploads/2015/11/11080124/shutterstock_192205328.jpg";
							}
							break;
						case "niederschlag":
							$unit = "";
							switch($wert->getNiederschlag()) {
								case 0:
									$value = "starker Regen";
									$imgUrl = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1A-xyJyReatXCyzxbahMF012NPNjtD_Lg3w&usqp=CAU";
									break;
								case 1:
									$value = "geringer Niederschlag";
									$imgUrl = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSRaIsflHsrv88uni6m1suR65ZDi9DiWorBg&usqp=CAU";
									break;
								case 2:
									$value = "sehr geringer Niederschlag";
									$imgUrl = "https://i.ytimg.com/vi/j9nhecEWMuE/maxresdefault.jpg";
									break;
								case 3:
									$value = "kein Niederschlag";
									$imgUrl = "https://imonkey-blog.imgix.net/blog/wp-content/uploads/2015/11/11080124/shutterstock_192205328.jpg";
									break;
								default:
									$imgUrl = "https://www.deiters.de/media/catalog/product/cache/all/image/1600x/040ec09b1e35df139433887a97daa66f/0/0/008323.jpg";
									$value = "Sorry. Keine Angaben möglich";
							}
							break;
						case "wind":
							$value = $wert->getWind();
							$unit = "km/h";
							switch($value) {
								case $value <= 5:
									$imgUrl = "https://thumbs.dreamstime.com/b/spring-green-field-blue-sky-lot-white-clouds-fresh-lush-grass-swaying-light-wind-summer-meadow-countryside-180643356.jpg";
									break;
								case $value >= 15:
									$imgUrl = "https://www.lufft.com/blog/app/uploads/2020/01/strong_wind.jpg";
									break;
								default:
									$imgUrl = "http://www.vergnet.co.uk/wp-content/uploads/2014/11/Vergnet-GEV-MP-R-Wind-Turbine-1024x683.jpg";
							}							
							break;
					}
				?>
				<img src=<?php echo "${imgUrl}" ?> class="card-image-top" />
				<div class="card-body">
					<p class="card-text"><?php echo $value . " " . $unit; ?></p>
				</div>
				 <nav>
					  <ul class="pagination">
						<li class="page-item <?php echo $datentyp == "temperatur" ? "active" : "" ?>"><a class="page-link" href="widget.php?datentyp=temperatur">Temp.</a></li>
						<li class="page-item <?php echo $datentyp == "niederschlag" ? "active" : "" ?>"><a class="page-link" href="widget.php?datentyp=niederschlag">Niederschl.</a></li>
						<li class="page-item <?php echo $datentyp == "wind" ? "active" : "" ?>"><a class="page-link" href="widget.php?datentyp=wind">Wind</a></li>
					  </ul>
				</nav>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
