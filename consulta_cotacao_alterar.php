<?php
session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];
$id = $_GET['id'];

$_SESSION['id'] = $id;

$query = "SELECT * FROM tbcotacao c, tbcotacao_precos a WHERE c.idcotacao = a.idcotacao and c.idcotacao = '$idcotacao' and a.id = '$id'";
$rsprod = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rsprod);

?>

<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Consultar Produtos</title>
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>

</head>

<body>

    <section class="body">

        <!-- start: header -->

            <!-- start: sidebar -->

            <section role="main" class="content-body">
                
                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-danger">
                            <header class="card-header">
                                <h2 class="card-title">Alterar Cotação</h2>
                            </header>
                            <div class="card-body">
                                <form class="form-horizontal form-bordered" method="POST" action="consulta_cotacao_update.php" id="Cadastro" name="Cadastro">

                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['alterar_item_cotacao_sucesso'])) :
                                            ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Sucesso! <?php echo $_SESSION['alterar_item_cotacao_sucesso'] ?> </strong><br>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['alterar_item_cotacao_sucesso']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['erro_alterar_item_cotacao'])) :
                                            ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Atenção! <?php echo $_SESSION['erro_alterar_item_cotacao'] ?></strong>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['erro_alterar_item_cotacao']);
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">ID</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-list-ol"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="idcotacao" class="form-control" value="<?php echo $row['idcotacao'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Item</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-list-ol"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="item" class="form-control" value="<?php echo $row['item'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Descrição </label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-box"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="descricao" class="form-control" value="<?php echo $row['descricao'] ?>" maxlength="200" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Tipo</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-barcode"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="tipo" class="form-control" value="<?php echo $row['tipo'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Quantidade</label>
                                        <div class="col-lg-1">
                                            <div class="input-group">
                                                <input type="number" name="quantidade" class="form-control" value="<?php echo $row['quantidade'] ?>">
                                            </div>
                                        </div>
                                    </div>                             

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Valor Unitário</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="valor_unitario" class="form-control" inputmode="numeric" onkeyup="valorreais(this);" value="<?php echo $row['valor_unitario'] ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Valor Total</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="valor_total" class="form-control" inputmode="numeric" onkeyup="valorreais(this);" value="<?php echo $row['valor_total'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-8 text-center">
                                            <button type="submit" name="btnCadastrar" class="btn btn-danger mt-2">Alterar</button>
                                            <a href="consulta_produtos.php" class="btn btn-dark mt-2">Voltar</a>
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
    <script src="vendor/select2/js/select2.js"></script>
    <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
    <script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>


    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
    <!-- Analytics to Track Preview Website -->

    <script src="js/examples/examples.advanced.form.js"></script>


                                
    </script>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>