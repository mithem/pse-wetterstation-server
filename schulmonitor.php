<?php
	$db = mysqli_connect("localhost", "root", "", "Wetterstation");
	if(!$db)
	{
	  exit("Verbindungsfehler: ".mysqli_connect_error());
	}



	require_once("CWerte.php");
	require_once("DAOWerte.php");
	require_once("CParser.php");

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
		height: 100%;
		width: 80%;
		border-top:20px solid green;
		/*flex-grow: 1;*/
		margin: 0px 20px;
		align.items: center;
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
	.mitte{
		margin-top: 6rem;
		flex: 1 1 auto;
		padding: 9rem 1rem;
		text-align: center;
	}
	.schrift{
		font-size: 100;
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
                <!-- Begin Page Content -->
                <div class="container-column">

                    

                    <!-- Content Row -->
                    <div class="row">
						
                        
					</div>
            <!-- End of Main Content -->
			<div class="row">
				<div class="col-xl-4 col-md-4 mb-4">
					<div class="card kachel mitte">
							<div class="card-body schrift">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style= "font-size:x-large; font-weight: bold">
								   Temperatur</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800" style= "font-size:xx-large"><?php echo $meinWert->getTemp()."°C"; ?></div>
							</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-md-4 mb-4">
					<div class="card kachel mitte">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style= "font-size:x-large; font-weight: bold">
								   Niederschlag</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800" style= "font-size:xx-large"><?php
								switch($meinWert->getNiederschlag()){
									case 0:
										echo "kein Niederschlag";
									case 1:
										echo "Regen";
									case 2:
										echo "starker Regen";
								}
									 ; ?></div>
							</div>
					</div>
				</div>
				
				<div class="col-xl-4 col-md-4 mb-4">
					<div class="card kachel mitte">
							<div class="card-body">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style= "font-size:x-large; font-weight: bold">
								   Wind</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800" style= "font-size:xx-large"><?php echo $meinWert->getWind()."km/h"; ?></div>
							</div>
					</div>
				</div>
				
			</div>

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