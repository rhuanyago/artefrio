<?php
session_start();
include("Connections/conexao.php");

setlocale(LC_TIME, 'portuguese'); 
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');

$quantidade = 10;
$pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

//---------------------------------------------------------------------------//
$sqlTotal    = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE (MONTH(data_vencimento) = MONTH(NOW())) AND c.status = 'A' order by c.favorecido, c.parcelas asc";
$qrTotal     = mysqli_query($conexao, $sqlTotal);
$numTotal    = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal / $quantidade);

$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE (MONTH(data_vencimento) = MONTH(NOW())) AND c.status = 'A' order by c.favorecido, c.parcelas asc LIMIT $inicio, $quantidade;";
$rscli = mysqli_query($conexao, $query);

?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Consultar Usuários</title>
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
    <link rel="stylesheet" href="vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="vendor/dropzone/basic.css" />
    <link rel="stylesheet" href="vendor/dropzone/dropzone.css" />
    <link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="vendor/codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="vendor/codemirror/theme/monokai.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>
    <script src="text/javascript" src="javascriptpersonalizado.js"></script>

</head>

<body>

    <section class="body">

        <!-- start: header -->
        <?php include('header.php'); ?>

        <div class="inner-wrapper">
            <!-- start: sidebar -->

            <?php include('menu.php'); ?>

            <section role="main" class="content-body">
                <header class="page-header page-header-left-breadcrumb">
                    <div class="right-wrapper">
                        <ol class="breadcrumbs">
                            <li>
                                <a>
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Financeiro</span></li>
                            <li><span>Consultar Pagamentos</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-default">
                            <header class="card-header">
                                <h2 class="card-title">Consultar Pagamentos a Vencer </h2>
                                <h4 class="text-dark"><?php echo utf8_encode(strftime("%A, %d de %B de %Y", strtotime($date))); ?></h4>
                            </header>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col">
                                            <a class="btn btn-success text-white" href="pagamento_dia.php" style="border:none;"><i class="fas fa-plus"></i> Inserir Pagamento do Dia</a>
                                            <a class="btn btn-dark text-white text-right" href="gerar_planilha.php" style="border:none;"><i class="far fa-file-excel"></i> Exportar Excel</a><br><br>

                                        </div>
                                    </div>
                                </div>
                            <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['status_baixa_pag_dia'])) :
                                            ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Sucesso! <?php echo $_SESSION['status_baixa_pag_dia'] ?> </strong><br>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['status_baixa_pag_dia']);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="center">
                                        <?php
                                        if (isset($_SESSION['status_baixa_pag_dia_error'])) :
                                            ?>
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Atenção! <?php echo $_SESSION['status_baixa_pag_dia_error'] ?></strong>
                                            </div>
                                        <?php
                                        endif;
                                        unset($_SESSION['status_baixa_pag_dia_error']);
                                        ?>
                                    </div>
                                </div>
                                <form action="pesquisar.php" method="GET">
                                <div class="col-lg-12">
                                    <section class="card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Data de Vencimento</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control col-md-8" name="data" id="data" placeholder="Pesquisar Data...">
                                                <span class="input-group-append">
                                                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Favorecido</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control col-md-8" inputmode="numeric" name="favorecido" id="favorecido" placeholder="Pesquisar Favorecido...">
                                                <span class="input-group-append">
                                                    <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                        <table class="table table-responsive-md table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Favorecido</th>
                                                    <th class="text-left">Dados</th>
                                                    <th class="text-center">Parcela(s)</th>
                                                    <th class="text-left">Valor</th>
                                                    <th class="text-center">Vencimento</th>
                                                    <th class="text-center">Último Dia</th>
                                                    <th class="text-center">Observação</th>
                                                    <th class="text-center">Status</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($rscli)) { ?>
                                                    <tr>
                                                        <td class="text-left"><b><?php echo mb_strtoupper($row["favorecido"]) ?></b></td>
                                                        <td class="text-left"><?php echo $row["dados"]?></td>
                                                        <td class="text-center"><b>Única</b></td><td class="text-center"><b><?php echo $row["parcelas"] ?></b></td>
                                                        <td class="text-left text-danger"><b><?php echo number_format($row["valor"], 2, ",", ".") ?></b></td>
                                                        <td class="text-center"><b><?php echo $row["dt_vencimento"] ?></b></td>
                                                        <td class="text-center"><?php echo $row["dt_ultimodia"] ?></td>
                                                        <td class="text-center text-primary"><b>Sem atraso</b></td> 
                                                        <td class="text-center text-danger"><b><?php echo$row["quantidade_dias"]?> dias atrasados</b></td>
                                                        <td class="text-center"><b>Aguardando Pagamento</b></td>
                                                        <td class="text-center"><b>Pago</b></td>
                                                        <td class="actions-hover actions-fade ">
                                                            <a class="btn btn-dark text-white" title="Editar" href="pagamento_dia_alterar.php?id=<?php echo $row["idpag"]?>"><i class="fas fa-pencil-alt"></i></a>
                                                            <a class="btn btn-success text-white" title="Dar Baixa" href="pagamento_dia_baixa.php?idpag=<?php echo $row["idpag"]?>" class="delete-row"><i class="fas fa-check-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php  }
                                                ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="?pagina=1">Primeira</a>
                                            </li>
                                            <?php
                                            for ($i = 1; $i <= $totalPagina; $i++) { ?>
                                                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                                            <?php } ?>
                                            <a class="page-link" href="?pagina=<?php echo $totalPagina ?>">Última</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- end: page -->
            </section>
        </div>


    </section>

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
    <script src="vendor/jquery-ui/jquery-ui.js"></script>
    <script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
    <script src="vendor/select2/js/select2.js"></script>
    <script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
    <script src="vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
    <script src="vendor/fuelux/js/spinner.js"></script>
    <script src="vendor/dropzone/dropzone.js"></script>
    <script src="vendor/bootstrap-markdown/js/markdown.js"></script>
    <script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
    <script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
    <script src="vendor/codemirror/lib/codemirror.js"></script>
    <script src="vendor/codemirror/addon/selection/active-line.js"></script>
    <script src="vendor/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="vendor/codemirror/mode/javascript/javascript.js"></script>
    <script src="vendor/codemirror/mode/xml/xml.js"></script>
    <script src="vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="vendor/codemirror/mode/css/css.js"></script>
    <script src="vendor/summernote/summernote-bs4.js"></script>
    <script src="vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
    <script src="vendor/ios7-switch/ios7-switch.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
    <!-- Analytics to Track Preview Website -->

    <script type="text/javascript">
        function buscarNome(nome) {
            $.ajax({
                url: "pesquisa_pagamento.php",
                method: "POST",
                data: {
                    nome: nome
                },
                success: function(data) {
                    $('#resultado').html(data);
                }
            });
        }


        $(document).ready(function() {
            buscarNome();
            $('#buscar').keyup(function() {
                var nome = $(this).val();
                if (nome != '') {
                    buscarNome(nome);
                } else {
                    buscarNome();
                }
            });
        });
    </script>

<script type="text/javascript">
        function buscarFav(favorecido) {
            $.ajax({
                url: "pesquisa_pagamento.php",
                method: "POST",
                data: {
                    favorecido: favorecido
                },
                success: function(data) {
                    $('#resultado').html(data);
                }
            });
        }


        $(document).ready(function() {
            buscarFav();
            $('#buscarfav').keyup(function() {
                var favorecido = $(this).val();
                if (favorecido != '') {
                    buscarFav(favorecido);
                } else {
                    buscarFav();
                }
            });
        });
    </script>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>