<?php
session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];

$sql = "SELECT c.* from tbcotacao_precos c where c.idcotacao = '$idcotacao' order by item  ";
$rs_itenscot = mysqli_query($conexao, $sql);

$sql3 = "SELECT * from tbcotacao c, tbclientes a where a.reg = c.idcliente AND c.idcotacao = '$idcotacao'; ";
$rs_cot = mysqli_query($conexao, $sql3);
$rows_cot = mysqli_fetch_array($rs_cot);

$sql2 = "SELECT sum(valor_total) as total from tbcotacao_precos where idcotacao = '$idcotacao'  ";
$rs_valortotal = mysqli_query($conexao, $sql2);
$rows_total = mysqli_fetch_array($rs_valortotal);

$sql2 = "SELECT sum(valor_unitario) as total_uni from tbcotacao_precos where idcotacao = '$idcotacao'  ";
$rs_valortotaluni = mysqli_query($conexao, $sql2);
$rows_totuni = mysqli_fetch_array($rs_valortotaluni);

setlocale(LC_TIME, 'portuguese'); 
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');



?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed"
    data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Ordem de Serviço</title>
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

</head>

<body>

    <section class="body">

        <!-- start: header -->
        <?php include('header.php'); ?>

        <div class="inner-wrapper">
            <!-- start: sidebar -->

            <?php include('menu.php'); ?>

            <section role="main" class="content-body">

                <!-- start: page -->
                <div class="col-md-12">
                    <section class="card">
                        <div class="card-body">
                            <div class="invoice mb-4">
                                <header class="clearfix">
                                    <div class="row">
                                        <div class="col-sm-3 text-left mt-3 mb-3">
                                            <img alt="Porto Website Template" src="img/logo-refrigeracao.png"
                                                height="120">
                                        </div>
                                        <div class="col-sm-6 text-center mt-3 mb-3">
                                            <div class="ib">
                                                <h5 class="h5 mt-0 mb-1 text-dark font-weight-bold">Refrigeração Artfrio
                                                    - MEI</h5>
                                                <h6 class="h6 mt-0 mb-1 text-dark font-weight-bold">CNPJ:
                                                    22.083.362/0001-26</h6>
                                                <!-- <h6 class="h6 mt-0 mb-1 text-dark font-weight-bold">RUA
                                                    SUZANA PACHECO, N° 111</h6>
                                                <h6 class="h6 mt-0 mb-1 text-dark font-weight-bold">VILA SOCIAL - CEP:
                                                    86804-490</h6> -->
                                                <h6 class="h6 mt-0 mb-1 text-dark font-weight-bold">APUCARANA, PR</h6>
                                                <h6 class="h6 mt-0 mb-1 text-dark font-weight-bold">REPARAÇÃO E
                                                    MANUTENÇÃO DE EQUIPAMENTOS ELETROELETRÔNICOS DE USO PESSOAL E
                                                    DOMÉSTICO</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 text-right mt-3 mb-3">
                                            <h5 class="h5 mt-0 mb-1 text-dark font-weight-bold">
                                                <?php echo date("d/m/Y") ?></h5>
                                            <div class="ib">
                                                assistencia.artfrio@gmail.com
                                            </div>
                                            <h5 class="h5 mt-0 mb-1 text-dark font-weight-bold">(43) 99810-9689</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3 mb-3">
                                            <h2 class="h3 mt-0 mb-1 text-dark font-weight-bold">ORDEM DE SERVIÇO -
                                                <?php echo $idcotacao; ?></h2>
                                            <br>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Favorecido:
                                                <?php echo mb_strtoupper($rows_cot['favorecido']) ?> </h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Telefone:
                                                <?php echo mb_strtoupper($rows_cot['telefone']) ?> </h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Endereço:
                                                <?php echo mb_strtoupper($rows_cot['endereco']) ?>
                                            </h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Bairro:
                                                <?php echo mb_strtoupper($rows_cot['bairro']) ?> </h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Cidade:
                                                <?php echo mb_strtoupper($rows_cot['cidade']) ?></h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Produto:
                                                <?php echo mb_strtoupper($rows_cot['produto']) ?></h4>
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Modelo:
                                                <?php echo mb_strtoupper($rows_cot['modelo']) ?></h4>
                                        </div>
                                        <div class="col-sm-6 mt-3 mb-3">
                                            <br><br>
                                            <h4 class="h5 mb-1 text-dark font-weight-bold">
                                                <?php echo !empty($rows_cot['cpf']) ? 'CPF' : 'CNPJ' ?>
                                                <?php echo mb_strtoupper((!empty($rows_cot['cpf'])) ? $rows_cot['cpf'] : $rows_cot['cnpj']) ?>
                                            </h4>
                                            <h4 class="h5 mt-4 text-dark font-weight-bold">Número:
                                                <?php echo mb_strtoupper($rows_cot['numero']) ?> </h4>
                                                <h4 class="h5 mt-4 text-dark font-weight-bold">UF:
                                                <?php echo mb_strtoupper($rows_cot['uf']) ?> </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 mt-3 mb-3">
                                            <h4 class="h5 m-0 text-dark font-weight-bold">Defeito Reclamado:
                                                <?php echo mb_strtoupper($rows_cot['defeito']) ?> </h4>
                                        </div>
                                    </div>
                                </header>
                                <div class="bill-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="bill-to text-right">
                                                <p class="mb-0">
                                                <p class="h3 mb-1 text-dark font-weight-semibold">Total: R$
                                                    <?php echo number_format($rows_total['total'],2,",","." ) ?> </p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <table class="table table-responsive-md invoice-items">
                                        <thead>
                                            <tr class="text-dark text-left" style="font-size:18px; width:100%;">
                                                <th class="d-none d-sm-table-cell">Item</th>
                                                <th class="text-left ">Descrição</th>
                                                <th class="text-center d-none d-sm-table-cell">Unid</th>
                                                <th class="text-center">Quant.</th>
                                                <th class="text-center">Valor Unitario</th>
                                                <th class="text-right">Valor Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($rows_rsitens = mysqli_fetch_array($rs_itenscot)) { ?>
                                            <tr style="font-size:14px;">
                                                <td class="d-none d-sm-table-cell"><?php echo $rows_rsitens['item'] ?>
                                                </td>
                                                <td class="text-left" style="width:60%;">
                                                    <?php echo $rows_rsitens['descricao'] ?></td>
                                                <td class="text-center d-none d-sm-table-cell">
                                                    <?php echo $rows_rsitens['tipo'] ?></td>
                                                <td class="text-center"><?php echo $rows_rsitens['quantidade'] ?></td>
                                                <td class="text-center">R$
                                                    <?php echo number_format($rows_rsitens['valor_unitario'],2,",","." ) ?>
                                                </td>
                                                <td class="text-right">R$
                                                    <?php echo number_format($rows_rsitens['valor_total'],2, ",", "." ) ?>
                                                </td>
                                            </tr>
                                            <?php
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="invoice-summary">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <table class="table h6 text-dark">
                                                <tbody>
                                                    <tr class="b-top-0 mb-4">
                                                        <td colspan="2"><b></b></td>
                                                        <td class="text-right h5 text-dark font-weight-semibold"></td>
                                                    </tr>
                                                    <br>
                                                    <tr class="h4">
                                                        <td colspan="2"><b>Valor Total</b></td>
                                                        <td class="text-right"><b
                                                                class="h3 text-dark font-weight-semibold">R$
                                                                <?php echo number_format($rows_total['total'],2,",","." ) ?></b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mr-4">
                                <?php if($rows_cot['tipo'] == "CT"){ ?>
                                <a href="cotacao_preco_item.php?idcotacao=<?php echo $idcotacao ?>"
                                    class="btn btn-dark ml-3"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                <?php }else{?>
                                <a href="cotacao_licitacao_preco_item.php?idcotacao=<?php echo $idcotacao ?>"
                                    class="btn btn-dark ml-3"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                <?php } ?>
                                <a href="cotacao_finaliza_print.php?idcotacao=<?php echo $idcotacao ?>" id="id_imprimir"
                                    target="_blank" class="btn btn-danger ml-3"><i class="fas fa-print"></i>
                                    Imprimir</a>
                            </div>
                        </div>
                    </section>
                    <!-- end: page -->
                </div>
            </section>
        </div>
    </section>
    </div>
    </div>
    </form>

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

</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>