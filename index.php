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
	
	$meinWert = $meineDB->getWerte($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<style>
		nav.navbar {
			display: flex;
			flex-direction: row;
		}
		nav.navbar > .title {
			font-size: 4rem;
		}
		nav.navbar > .spacer {
			flex-grow: 5;
		}
		a.title, a.title:hover {
			color: #858796;
			text-decoration: none;
		}
		body#page-top {
			background-color: #f8f9fc;
		}
	</style>

    <title>PSE Wetterstation</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<style>
	.container-column {
		display: flex;
		gap: 100px;
		flex-direction: column;
	}
	.kachel {
		height: 180px;
		border-left: 10px solid green;
		width: 45%;
		/*flex-grow: 1;*/
		margin: 0px 20px;
	}
	@media only screen and (max-width: 800px) {
		.kachel {
			width: 100%;
		}
	}
	
	@media only screen and (max-width: 450px) {
		nav.navbar > .title {
			font-size: 2rem;
		}
	}
	</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
					<nav class="navbar">
						<a class="title" href="/" >Wetter Lohmar</a>
						
						
						<div class="spacer"></div>
						<a class="btn btn-primary" href="/statistiken.php">Statistiken</a>
					</nav>
                <!-- Begin Page Content -->
                <div class="container-column">

                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <!--<div class="col-xl-6 col-md-6 mb-4">-->
						<div class="card kachel">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								   Temperatur</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getTemp(); ?></div>
							</div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="card kachel">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Niederschlag</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getNiederschlag(); ?></div>
							</div>
                        </div>
					</div>	
					<div class="row">
						<div class="card kachel">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
								Sonnenstunden
								</div>        
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getSonnenstunden(); ?></div>								
							</div>
                        </div>
						<div class="card kachel">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Wind
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getWind(); ?></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="card kachel">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Luftfeuchtigkeit
								</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getFeuchtigkeit(); ?></div>
							</div>
                        </div>
							<div class="card kachel">
								<div class="card-body">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Luftdruck
									</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $meinWert->getDruck(); ?></div>
							</div>
                        </div>
					</div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>