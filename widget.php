<html>
<head>
	<title>Test</title>
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
<img src="https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2020/07/solar_orbiter_s_first_view_of_the_sun2/22133123-1-eng-GB/Solar_Orbiter_s_first_view_of_the_Sun_pillars.png" class="card-image-top" />
<div class="card-body">
	<p class="card-text">22&deg;</p>
</div>
 <nav>
      <ul class="pagination">
        <li class="page-item active"><a class="page-link" href="test.html&typ=temperatur">Temp.</a></li>
        <li class="page-item"><a class="page-link" href="test.html?typ=niederschlag">Niederschl.</a></li>
        <li class="page-item"><a class="page-link" href="test.html&typ=luft">Windgeschw.</a></li>
      </ul>
</nav>
</div>
<div class="card">
<img src="https://geographical.co.uk/media/k2/items/cache/8e4e30c8fc08507de1b0b5afc7d32a85_XL.jpg" class="card-image-top" />
<div class="card-body">
	<p class="card-text">0 mm</p>
</div>
 <nav>
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="test.html&typ=temperatur">Temp.</a></li>
        <li class="page-item active"><a class="page-link" href="test.html?typ=niederschlag">Niederschl.</a></li>
        <li class="page-item"><a class="page-link" href="test.html&typ=luft">Windgeschw.</a></li>
      </ul>
</nav>
</div>
<div class="card">
<img src="https://www.breeze-technologies.de/wp-content/uploads/2019/06/holger-link-748973-unsplash-1030x687.jpg" class="card-image-top" />
<div class="card-body">
	<p class="card-text">2 m/s</p>
</div>
 <nav>
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="test.html&typ=temperatur">Temp.</a></li>
        <li class="page-item"><a class="page-link" href="test.html?typ=niederschlag">Niederschl.</a></li>
        <li class="page-item active"><a class="page-link" href="test.html&typ=luft">Windgeschw.</a></li>
      </ul>
</nav>
</div>
</div>
</div>
</div>
</body>
</html>