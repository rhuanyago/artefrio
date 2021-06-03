<?php
session_start();
include("Connections/conexao.php");

$idpag = $_GET['id'];

$sql = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia FROM tbpagamento_dia c WHERE idpag = '$idpag'";
$rspag = mysqli_query($conexao, $sql);
$row_pag = mysqli_fetch_array($rspag);

?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Alterar Pagamento do Dia</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
                            <li><span>Alterar</span></li>
                            <li><span>Pagamentos</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-default">
                                <header class="card-header">
                                    <h2 class="card-title">Alterar Pagamento | <?php echo $row_pag['favorecido'] ?></h2>
                                </header>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                                if (isset($_SESSION['status_update_pag_dia'])) :
                                                    ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong><?php echo $_SESSION['status_update_pag_dia'] ?> </strong><br>
                                                </div>
                                            <?php
                                                endif;
                                                unset($_SESSION['status_update_pag_dia']);
                                                ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                                if (isset($_SESSION['status_update_pag_dia_error'])) :
                                                    ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong><?php echo $_SESSION['status_update_pag_dia_error'] ?> </strong><br>
                                                </div>
                                            <?php
                                                endif;
                                                unset($_SESSION['status_update_pag_dia_error']);
                                                ?>
                                        </div>
                                    </div>
                                    <form class="form-horizontal form-bordered" method="POST" action="cad_pagamento_dia_update.php?idpag=<?php echo $row_pag['idpag'] ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Favorecido</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                    </span>
                                                    <input type="text" name="favorecido" autocomplete="off" value="<?php echo $row_pag['favorecido'] ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Dados</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="dados" autocomplete="off" value="<?php echo $row_pag['dados'] ?>" class="form-control" maxlength="20" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Valor</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="valor" inputmode="numeric" id="valor" value="<?php echo $row_pag['valor'] ?>" onkeyup="valorreais(this);" min="0"  class="form-control text-weight-bold text-dark col-sm-12" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Data de Vencimento</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </span>
                                                    </span>
                                                    <input id="date" name="dtvencimento" inputmode="numeric" autocomplete="off" id="dtvencimento" value="<?php echo $row_pag['dt_vencimento'] ?>" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Parcelas</label>
                                            <div class="col-lg-1">
                                                <input type="number" name="parcelas" inputmode="numeric" id="parcelas" value="<?php echo $row_pag['parcelas'] ?>" min="1" max="12"  class="form-control text-weight-bold text-dark col-sm-12" >
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label text-lg-right pt-2">Último Dia</label>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </span>
                                                    </span>
                                                    <input id="date" name="dtultimodia" inputmode="numeric" value="<?php echo $row_pag['dt_ultimodia'] ?>" autocomplete="off" id="dtultimodia" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Status da Conta</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-ban"></i>
                                                    </span>
                                                </span>
                                                <select name="status" id="status" class="form-control" required>
                                                    <?php if ($row_pag['status'] == "A") { ?>
                                                        <option value="<?php echo $row_pag['status'] ?>">Aguardando Pagamento</option>
                                                        <option value="P">Pago</option>
                                                    <?php } else {  ?>
                                                        <option value="<?php echo $row_pag['status'] ?>">Pago</option>
                                                        <option value="A">Aguardando Pagamento</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                                                                
                                        <div class="row">
                                            <div class="col-sm-8 text-center">
                                                <button type="submit" name="btnCadastrar" class="btn btn-danger mt-2">Alterar Informações</button>
                                                <a href="consulta_pagamento_dia.php" class="btn btn-dark mt-2">Voltar</a>
                                            </div>
                                        </div>



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
        jQuery.noConflict();
        jQuery(function($) {
            $("#telefone").mask("(99) 99999-9999");
        });
    </script>
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>