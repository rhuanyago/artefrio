<?php
session_start();
include("Connections/conexao.php");

if ($_SESSION['logado'] == md5('@wew67434$%#@@947@@#$@@!#54798#11a23@@dsa@!')) {


setlocale(LC_TIME, 'portuguese'); 
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');

?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">
	
<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/layouts-tab-navigation-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:33 GMT -->
<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Brasil Recapagem | M & M Comércio de Pneus Eirelli</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="vendor/animate/animate.css">

		<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->		
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />		
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />		
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		
		<link rel="stylesheet" href="vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<script src="vendor/modernizr/modernizr.js"></script>		
		<script src="master/style-switcher/style.switcher.localstorage.js"></script>

</head>
	<body>
		<section class="body">

			<!-- start: header -->
            
            <?php include('header.php'); ?>
            
            <!-- end: header -->

			<div class="inner-wrapper">
                
            <?php include('menu.php'); ?>

				<section role="main" class="content-body ">
					

                    <!-- start: page -->
                    
                    <section class="body-error error-inside">
							<div class="center-error">
								<div class="row">
									<div class="col-lg-12">
										<div class="main-error mb-3">
											<h2 class="error-code text-dark text-center font-weight-semibold m-0">404 <i class="fas fa-file"></i></h2>
											<p class="error-explanation text-center">A página que você estava procurando não existe.</p>
										</div>
									</div>
								</div>
							</div>
					</section>
					
					
					
					
					<!-- end: page -->
				</section>
			</div>

			

		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="vendor/jquery-cookie/jquery-cookie.js"></script>		<script src="master/style-switcher/style.switcher.js"></script>		<script src="vendor/popper/umd/popper.min.js"></script>		<script src="vendor/bootstrap/js/bootstrap.js"></script>		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="vendor/common/common.js"></script>		<script src="vendor/nanoscroller/nanoscroller.js"></script>		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		<script src="vendor/jquery-ui/jquery-ui.js"></script>		<script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>		<script src="vendor/jquery-appear/jquery-appear.js"></script>		<script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>		<script src="vendor/flot/jquery.flot.js"></script>		<script src="vendor/flot.tooltip/flot.tooltip.js"></script>		<script src="vendor/flot/jquery.flot.pie.js"></script>		<script src="vendor/flot/jquery.flot.categories.js"></script>		<script src="vendor/flot/jquery.flot.resize.js"></script>		<script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>		<script src="vendor/raphael/raphael.js"></script>		<script src="vendor/morris/morris.js"></script>		<script src="vendor/gauge/gauge.js"></script>		<script src="vendor/snap.svg/snap.svg.js"></script>		<script src="vendor/liquid-meter/liquid.meter.js"></script>		<script src="vendor/jqvmap/jquery.vmap.js"></script>		<script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>		<script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>		<script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		
		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>

	</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/layouts-tab-navigation-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:33 GMT -->
</html>

<?php
} else {
    header("Location: index.php");
}


?>