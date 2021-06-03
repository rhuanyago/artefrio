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
					<header class="page-header page-header-left-breadcrumb">
						<div class="right-wrapper">
							<ol class="breadcrumbs">
								<li>
									<a>
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Home</span></li>
								<li><span>Dashboard</span></li>
							</ol>
					
						</div>
					
						<h2>Dashboard</h2>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<div class="row mb-3">
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-success mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-success">
														<i class="fas fa-dollar-sign"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<?php 
														$sql = "  SELECT ifnull(sum(c.valor),0) as pagamento_mes from tbpagamento_dia c WHERE MONTH(c.data_vencimento) = MONTH(now()) and c.status = 'A';";
														$rsmes = mysqli_query($conexao, $sql);
														$row_pagmes = mysqli_fetch_array($rsmes);
														$totalpagmes = $row_pagmes['pagamento_mes'];
													?>
													<div class="summary">
														<h4 class="title">Contas a Pagar no Mês de <span class="text-primary"><?php echo utf8_encode(ucfirst(strftime("%B", strtotime($date)))); ?></span></h4>
														<div class="info">
															<strong class="amount"><?php echo $totalpagmes ?></strong>
															<span class="text-primary"></span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="#">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-secondary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fas fa-dollar-sign"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<?php 
														$sql = "  SELECT ifnull(sum(c.valor),0) as total from tbpagamento_dia c WHERE c.status = 'A';";
														$rspagfalta = mysqli_query($conexao, $sql);
														$row_totalpagamento = mysqli_fetch_array($rspagfalta);
														$totaldevido = $row_totalpagamento['total'];
													?>
													<div class="summary">
														<h4 class="title">Contas a Pagar em Aberto</h4>
														<div class="info">
															<strong class="amount">R$ <?php echo $totaldevido?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="#">(withdraw)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-tertiary mb-3">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fas fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<?php 
														$sql = "SELECT ifnull(sum(c.valor),0) as pago_mes from tbpagamento_dia c WHERE MONTH(c.data_pagamento) = MONTH(now()) and c.status = 'P';";
														$rstotalmes = mysqli_query($conexao, $sql);
														$row_totalmes = mysqli_fetch_array($rstotalmes);
														$totalpagomes = $row_totalmes['pago_mes'];
													?>
													<div class="summary">
														<h4 class="title">Contas Pagas no Mês de <span class="text-primary"><?php echo utf8_encode(ucfirst(strftime("%B", strtotime($date)))); ?></span></h4>
														<div class="info">
															<strong class="amount">R$ <?php echo $totalpagomes ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="#">(statement)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-xl-6">
									<section class="card card-featured-left card-featured-quaternary">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quaternary">
														<i class="fas fa-hand-holding-usd"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<?php 
														$sql = " SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias, ifnull(sum(c.valor),0) as total_atrasados FROM tbpagamento_dia c WHERE(data_vencimento < NOW()) AND c.status = 'A' order by c.data_vencimento asc";
														$rstotalatrasados = mysqli_query($conexao, $sql);
														$row_totalatrasado = mysqli_fetch_array($rstotalatrasados);
														$totalatrasados = $row_totalatrasado['total_atrasados'];
													?>
													<div class="summary">
														<h4 class="title">Contas Atrasadas / Vencidas</h4>
														<div class="info">
															<strong class="amount text-danger">R$ <?php echo $totalatrasados ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase" href="#">(report)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="row pt-4 mt-2">
						<div class="col-lg-12 col-xl-6">
							<section class="card">
								<header class="card-header card-header-primary">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>
					
									<h2 class="card-title">Pagamentos da Semana</h2>
								</header>
								<div class="card-body">
									<div class="timeline timeline-simple mt-1 mb-2">
										<div class="tm-body">
											<div class="tm-title">
												<h5 class="m-0 pt-2 pb-2 text-uppercase"><b><?php echo utf8_encode(strftime("%d de %B de %Y", strtotime($date))); ?></b></h5>
											</div>

											<?php 
												$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE (WEEK(data_vencimento) = WEEK(NOW())) AND c.status = 'A' order by c.data_vencimento asc";
												$rspag = mysqli_query($conexao, $query);
											?>
											<ol class="tm-items">
											<?php while ($rows_rspag = mysqli_fetch_assoc($rspag)) { ?>
												<li>
													<div class="tm-box">
														<p class="text-muted mb-2 text-primary"><b>Favorecido: <?php echo mb_strtoupper($rows_rspag["favorecido"]) ?></b></p>
														<p class="text-muted mb-2"><b>Motivo: <?php echo $rows_rspag["dados"] ?></b></p>
														<p class="text-muted mb-2 text-primary"><b>
															<?php if($rows_rspag['parcelas'] == 0) {?>
																Parcela: Única
															<?php } else { ?>
																Parcela: <?php echo $rows_rspag['parcelas'] ;
															} ?>
														</b></p>
														<p class="text-muted mb-2"><b>Valor: <?php echo number_format($rows_rspag["valor"], 2, ",", ".") ?></b></p>
														<p class="text-muted mb-2"><b>Vencimento: <span class="text-success"><?php echo $rows_rspag["dt_vencimento"] ?></span></b></p>
														<p class="text-muted mb-2"><b>Último Dia: <?php echo $rows_rspag["dt_ultimodia"] ?></b></p>
														<p class="text-muted mb-2 text-primary"><b>
															<?php if ($rows_rspag["quantidade_dias"] <= 0) { ?>
																Sem Atraso
															<?php } else {?>
																<?php echo $rows_rspag["quantidade_dias"] ?> Dias Atrasados
															<?php } ?>
														</b></p>
													</div>
												</li>
											<?php } ?>		
											</ol>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-lg-12 col-xl-6">
							<section class="card">
								<header class="card-header card-header-primary">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>
					
									<h2 class="card-title">Pagamentos Atrasados</h2>
								</header>
								<div class="card-body">
									<div class="timeline timeline-simple mt-1 mb-2">
										<div class="tm-body">
											<div class="tm-title">
												<h5 class="m-0 pt-2 pb-2 text-uppercase"><b><?php echo utf8_encode(strftime("%d de %B de %Y", strtotime($date))); ?></b></h5>
											</div>

											<?php 
												$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE(data_vencimento < NOW()) AND c.status = 'A' order by c.data_vencimento asc";
												$rspag = mysqli_query($conexao, $query);
											?>
											<ol class="tm-items">
											<?php while ($rows_rspag = mysqli_fetch_assoc($rspag)) { ?>
												<li>
													<div class="tm-box">
														<p class="text-muted mb-2 text-primary"><b>Favorecido: <?php echo mb_strtoupper($rows_rspag["favorecido"]) ?></b></p>
														<p class="text-muted mb-2"><b>Motivo: <?php echo $rows_rspag["dados"] ?></b></p>
														<p class="text-muted mb-2 text-primary"><b>
															<?php if($rows_rspag['parcelas'] == 0) {?>
																Parcela: Única
															<?php } else { ?>
																Parcela: <?php echo $rows_rspag['parcelas'] ;
															} ?>
														</b></p>
														<p class="text-muted mb-2"><b>Valor: <?php echo number_format($rows_rspag["valor"], 2, ",", ".") ?></b></p>
														<p class="text-muted mb-2"><b>Vencimento: <span class="text-danger"><?php echo $rows_rspag["dt_vencimento"] ?></span></b></p>
														<p class="text-muted mb-2"><b>Último Dia: <?php echo $rows_rspag["dt_ultimodia"] ?></b></p>
														<p class="text-muted mb-2  text-primary"><b><span class="text-danger">
															<?php if ($rows_rspag["quantidade_dias"] <= 0) { ?>
																Sem Atraso
															<?php } else {?>
																<?php echo $rows_rspag["quantidade_dias"] ?> Dias Atrasados
															<?php } ?>
														</span></b></p>
													</div>
												</li>
											<?php } ?>		
											</ol>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					
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