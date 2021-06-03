<?php
session_start();
include("Connections/conexao.php");

$query = "select ifnull(max((idcotacao)+1),0) ultimo from tbcotacao c;";

$result2 = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_array($result2);

$_SESSION['idcotacao'] = $resultado['ultimo'];

$idcotacao = $_SESSION['idcotacao'];

?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Nova Cotação</title>
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

    <style>
        .rhu {
            background-color: #eee;
            color: black;
            cursor: pointer;
        }

        .listin {
            padding: 12px;
        }
    </style>

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
                                <a href="home.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Nova Cotação</span></li>
                            <li><span>Adicionar Cotação</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-md-12">
                        <section class="card card-default">
                            <header class="card-header">
                                <h2 class="card-title">Nova Cotação</h2>
                            </header>
                            <div class="card-body">
                                <form method="POST" action="cotacao_insert.php">
                                     <div id="foo" data-appear-animation="fadeOut" data-appear-animation-delay="4000">
                                            <div class="col-lg-12">
                                                <div class="center" >
                                                    <?php
                                                    if (isset($_SESSION['cotacao_escolhe'])) :
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Atenção! <?php echo $_SESSION['cotacao_escolhe'] ?> </strong><br>
                                                        </div>
                                                    <?php
                                                    endif;
                                                    unset($_SESSION['cotacao_escolhe']);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="center">
                                                    <?php
                                                    if (isset($_SESSION['msg_erro_cotacao'])) :
                                                    ?>
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Atenção! <?php echo $_SESSION['msg_erro_cotacao'] ?></strong>
                                                        </div>
                                                    <?php
                                                    endif;
                                                    unset($_SESSION['msg_erro_cotacao']);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-sm-1">
                                            <label class="control-label  text-weight-bold">ID</label>
                                            <div class="input-group">
                                                <input type="text" name="idcotacao" value ="<?php echo $idcotacao ?>" class="form-control" autocomplete="off" readonly required >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="control-label  text-weight-bold">Favorecido</label>
                                            <div class="input-group">
                                                <input type="text" name="favorecido"  class="form-control" autocomplete="off" autofocus required >
                                            </div>
                                            <div id="countryList"></div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Tipo</label>
                                                    <select name="tipo" id="tipo" class="form-control">
                                                    <option value="ND">---- ESCOLHA ----</option>
                                                        <option value="CT">COTAÇÃO</option>
                                                        <option value="L">LICITAÇÃO</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Incluir</label>
                                                <input id="Submit1" class="btn btn-dark btn-block" type="submit" value="Nova Cotação" />
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            </form>
                        </section>
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


    <script>
        function myFunction() {
            var x = document.getElementById("referencia");
            x.value = x.value.toUpperCase();
        }
    </script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $("input[name='nome_cli']").blur(function() {
                var $nome_cli = $("input[name='nome_cli']");
                var $cidade = $("input[name='cidade']");
                var $idcliente = $("input[name='idcliente']")
                $.getJSON('pega_cli2.php', {
                    nome: $(this).val()
                }, function(json) {
                    $nome_cli.val(json.nome_cli);
                    $cidade.val(json.cidade);
                    $idcliente.val(json.idcliente);
                });
            });
        });
    </script>

    <script type="text/javascript">
        function buscarRg(nome) {
            $.ajax({
                url: "pesquisa_cliente.php",
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
            buscarRg();
            $('#rg').keyup(function() {
                var rg = $(this).val();
                if (rg != '') {
                    buscarRg(rg);
                } else {
                    buscarRg();
                }
            });
        });
    </script>

    <script>
        function ativa() {
            var div = document.getElementById('div')
            /* se conteúdo está escondido, mostra e troca o valor do botão para: esconde */
            if (div.style.display == 'none') {
                document.getElementById("botao").value = 'esconde'
                div.style.display = 'block'
            } else {
                /* se conteúdo está a mostra, esconde o conteúdo e troca o valor do botão para: mostra */
                div.style.display = 'none'
                document.getElementById("botao").value = 'mostra'
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#nome_cli').keyup(function() {
                var nome = $(this).val();
                if (nome != '') {
                    $.ajax({
                        url: "complete.php",
                        method: "POST",
                        data: {
                            nome: nome
                        },
                        success: function(data) {
                            $('#countryList').fadeIn();
                            $('#countryList').html(data);
                        }
                    });
                }
            });
            $(document).on('click', 'li', function() {
                $('#nome_cli').val($(this).text());
                $('#countryList').fadeOut();
                $('#nome_cli').focus();
            });
        });
    </script>

    <script>
        // Iniciará quando todo o corpo do documento HTML estiver pronto.
            $().ready(function() {
                setTimeout(function () {
                    $('#foo').hide(); // "foo" é o id do elemento que seja manipular.
                }, 7500); // O valor é representado em milisegundos.
            });
    </script>
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>