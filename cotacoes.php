<?php
session_start();
include("Connections/conexao.php");

$quantidade = 10;
$pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

$sql = "SELECT a.*,date_format(data_inc, '%d/%m/%Y') AS data FROM tbcotacao a where a.status = 'A' order by a.idcotacao LIMIT $inicio, $quantidade;";
$result = mysqli_query($conexao, $sql);
//--------------------------------------------------------------------
$sqlTotal    = " SELECT idcotacao FROM tbcotacao c where c.status = 'A';";
$qrTotal     = mysqli_query($conexao, $sqlTotal);
$numTotal    = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal / $quantidade);



$quantidadef = 10;
$pagina2 = (isset($_GET['pagina2'])) ? (int) $_GET['pagina2'] : 1;
$inicio2 = ($quantidadef * $pagina2) - $quantidadef;

//--------------------FINALIZADAS-----------------------------------------//
$sqlTotal    = " SELECT a.*,date_format(data_inc, '%d/%m/%Y') AS data FROM tbcotacao a where a.status = 'F' order by a.idcotacao";
$qrTotal2     = mysqli_query($conexao, $sqlTotal);
$numTotal    = mysqli_num_rows($qrTotal2);
$totalPaginafinalizado = ceil($numTotal / $quantidade);


$sql2 = "SELECT a.*,date_format(data_inc, '%d/%m/%Y') AS data FROM tbcotacao a where a.status = 'F' order by a.idcotacao LIMIT $inicio2, $quantidadef;";
$finalizadas = mysqli_query($conexao, $sql2);

?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed"
    data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:16 GMT -->

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Pedidos Finalizados</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>
</head>

<body>
    <section class="body">

        <?php include('header.php'); ?>

        <div class="inner-wrapper">

            <?php include('menu.php'); ?>

            <section role="main" class="content-body">
                <header class="page-header page-header-left-breadcrumb">
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Dashboard</span></li>
                        </ol>

                    </div>

                    <h2>Ordens de Serviço em Aberto</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col">
                                <a class="btn btn-success text-white mb-2" href="nova_cotacao.php"
                                    style="border:none;"><i class="fas fa-plus"></i> Nova OS</a>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card">

                            <div class="col-lg-12">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#aberto" data-toggle="tab"><i
                                                    class="far fa-folder-open"></i> Abertas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#finalizadas" data-toggle="tab"><i
                                                    class="fas fa-check-circle"></i> Finalizadas</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="aberto" class="tab-pane active">
                                            <header class="card-header card-header-primary">
                                                <h2 class="card-title">Últimas OS</h2>
                                            </header>
                                            <div class="card-body">
                                                <div id="foo" data-appear-animation="fadeOut"
                                                    data-appear-animation-delay="4000">
                                                    <div class="col-lg-12">
                                                        <div class="center">
                                                            <?php
                                                        if (isset($_SESSION['status_cotacao'])) :
                                                        ?>
                                                            <div class="alert alert-success">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-hidden="true">×</button>
                                                                <strong>Sucesso!
                                                                    <?php echo $_SESSION['status_cotacao'] ?>
                                                                </strong><br>
                                                            </div>
                                                            <?php
                                                        endif;
                                                        unset($_SESSION['status_cotacao']);
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="center">
                                                            <?php
                                                        if (isset($_SESSION['msg_erro_cotacao'])) :
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-hidden="true">×</button>
                                                                <strong>Atenção!
                                                                    <?php echo $_SESSION['msg_erro_cotacao'] ?></strong>
                                                            </div>
                                                            <?php
                                                        endif;
                                                        unset($_SESSION['msg_erro_cotacao']);
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-responsive-md table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>OS</th>
                                                            <th>Favorecido</th>
                                                            <th>Status</th>
                                                            <th>Tipo</th>
                                                            <th>Data</th>
                                                            <th class="text-center">Ações?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($rows_rspedidos = mysqli_fetch_array($result)) { ?>
                                                        <tr style="font-size:14px;">
                                                            <td><?php echo $rows_rspedidos['idcotacao']; ?></td>
                                                            <td><?php echo mb_strtoupper($rows_rspedidos['favorecido']) ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($rows_rspedidos['status'] == 'A') { ?>
                                                                <span class="badge badge-info">Aberto</span>
                                                                <?php } ?>
                                                                <?php if ($rows_rspedidos['status'] == 'F') { ?>
                                                                <span class="badge badge-success">Finalizado</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($rows_rspedidos['tipo'] == 'CT') { ?>
                                                                COTAÇÃO
                                                                <?php }elseif($rows_rspedidos['tipo'] == 'L'){ ?>
                                                                OS
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $rows_rspedidos['data'] ?></td>
                                                            <td class="actions-hover actions-fade text-center">
                                                                <?php if ($rows_rspedidos['tipo'] == 'CT') { ?>
                                                                <a class="btn btn-dark text-white" title="Abrir Cotação"
                                                                    href="cotacao_preco_item.php?idcotacao=<?php echo $rows_rspedidos['idcotacao'] ?>"><i
                                                                        class="fas fa-file-alt"></i></a>
                                                                <?php }elseif($rows_rspedidos['tipo'] == 'L'){ ?>
                                                                <a class="btn btn-dark text-white" title="Abrir OS"
                                                                    href="cotacao_licitacao_preco_item.php?idcotacao=<?php echo $rows_rspedidos['idcotacao'] ?>"><i
                                                                        class="fas fa-file-alt"></i></a>
                                                                <?php } ?>
                                                                <a href="cotacao_close.php?idcotacao=<?php echo $rows_rspedidos['idcotacao'] ?>"
                                                                    class="btn btn-success text-white text-center" title="Finalizar OS"
                                                                    style="border:none;"> <i
                                                                        class="fas fa-check-circle"></i></a>
                                                                <a class="btn btn-danger text-white text-center"
                                                                    title="Excluir"
                                                                    href="cotacao_excluir.php?idcotacao=<?php echo $rows_rspedidos['idcotacao'] ?>"><i
                                                                        class="fas fa-times-circle"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php  }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link" href="?pagina=1#aberto">Primeira</a>
                                                        </li>
                                                        <?php
                                                        for ($i = 1; $i <= $totalPagina; $i++) { ?>
                                                        <li class="page-item"><a class="page-link"
                                                                href="?pagina=<?php echo $i ?>#aberto"><?php echo $i ?></a>
                                                        </li>
                                                        <?php } ?>
                                                        <a class="page-link"
                                                            href="?pagina=<?php echo $totalPagina ?>#aberto">Última</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                        <div id="finalizadas" class="tab-pane">
                                            <div class="card-body">
                                                <div id="foo" data-appear-animation="fadeOut"
                                                    data-appear-animation-delay="4000">
                                                    <div class="col-lg-12">
                                                        <div class="center">
                                                            <?php
                                                    if (isset($_SESSION['status_cotacao'])) :
                                                    ?>
                                                            <div class="alert alert-success">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-hidden="true">×</button>
                                                                <strong>Sucesso!
                                                                    <?php echo $_SESSION['status_cotacao'] ?>
                                                                </strong><br>
                                                            </div>
                                                            <?php
                                                    endif;
                                                    unset($_SESSION['status_cotacao']);
                                                    ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="center">
                                                            <?php
                                                    if (isset($_SESSION['msg_erro_cotacao'])) :
                                                    ?>
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-hidden="true">×</button>
                                                                <strong>Atenção!
                                                                    <?php echo $_SESSION['msg_erro_cotacao'] ?></strong>
                                                            </div>
                                                            <?php
                                                    endif;
                                                    unset($_SESSION['msg_erro_cotacao']);
                                                    ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <table class="table table-responsive-md table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>OS</th>
                                                            <th>Favorecido</th>
                                                            <th>Status</th>
                                                            <th>Tipo</th>
                                                            <th>Data</th>
                                                            <th class="text-center">Ações?</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($rows_rsfinalizado = mysqli_fetch_array($finalizadas)) { ?>
                                                        <tr style="font-size:14px;">
                                                            <td><?php echo $rows_rsfinalizado['idcotacao']; ?></td>
                                                            <td><?php echo mb_strtoupper($rows_rsfinalizado['favorecido']) ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($rows_rsfinalizado['status'] == 'A') { ?>
                                                                <span class="badge badge-info">Aberto</span>
                                                                <?php } ?>
                                                                <?php if ($rows_rsfinalizado['status'] == 'F') { ?>
                                                                <span class="badge badge-success">Finalizado</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($rows_rsfinalizado['tipo'] == 'CT') { ?>
                                                                COTAÇÃO
                                                                <?php }else{ ?>
                                                                OS
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $rows_rsfinalizado['data'] ?></td>
                                                            <td class="actions-hover actions-fade text-center">
                                                                <?php if ($rows_rsfinalizado['tipo'] == 'CT') { ?>
                                                                <a class="btn btn-dark text-white"
                                                                    title="Editar Cotação"
                                                                    href="cotacao_preco_item_edita.php?idcotacao=<?php echo $rows_rsfinalizado['idcotacao'] ?>"><i
                                                                        class="far fa-edit"></i></a>
                                                                <?php }elseif($rows_rsfinalizado['tipo'] == "L"){ ?>
                                                                <a class="btn btn-dark text-white"
                                                                    title="Editar Cotação"
                                                                    href="cotacao_licitacao_preco_item.php?idcotacao=<?php echo $rows_rsfinalizado['idcotacao'] ?>"><i
                                                                        class="far fa-edit"></i></a>
                                                                <?php } ?>
                                                                <a class="btn btn-default text-dark text-center"
                                                                    title="Imprimir"
                                                                    href="cotacao_finaliza.php?idcotacao=<?php echo $rows_rsfinalizado['idcotacao'] ?>"><i
                                                                        class="fas fa-print"></i></a>
                                                                <a class="btn btn-danger text-white text-center"
                                                                    title="Cancelar"
                                                                    href="cotacao_cancelar.php?idcotacao=<?php echo $rows_rsfinalizado['idcotacao'] ?>"><i
                                                                        class="fas fa-times-circle"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php  }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-end">
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="?pagina2=1#finalizadas">Primeira</a>
                                                        </li>
                                                        <?php
                                                        for ($i = 1; $i <= $totalPaginafinalizado; $i++) { ?>
                                                        <li class="page-item"><a class="page-link"
                                                                href="?pagina2=<?php echo $i ?>#finalizadas"><?php echo $i ?></a>
                                                        </li>
                                                        <?php } ?>
                                                        <a class="page-link"
                                                            href="?pagina2=<?php echo $totalPaginafinalizado ?>#finalizadas">Última</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
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
</body>
<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="master/style-switcher/style.switcher.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/pnotify/pnotify.custom.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<!-- Analytics to Track Preview Website -->

<script src="js/examples/examples.modals.js"></script>

<script>
// Iniciará quando todo o corpo do documento HTML estiver pronto.
$().ready(function() {
    setTimeout(function() {
        $('#foo').hide(); // "foo" é o id do elemento que seja manipular.
    }, 7500); // O valor é representado em milisegundos.
});
</script>

</body>
<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/ui-elements-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:57:17 GMT -->

</html>