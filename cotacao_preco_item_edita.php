<?php
session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];


$sql = "SELECT * from tbcotacao c where c.idcotacao = '$idcotacao' ";
$rs_cot = mysqli_query($conexao, $sql);
$rows_cotacao = mysqli_fetch_array($rs_cot);

$sql = "SELECT c.* from tbcotacao_precos c where c.idcotacao = '$idcotacao' order by item  ";
$rs_itenscot = mysqli_query($conexao, $sql);

$sql2 = "SELECT sum(valor_total) as total from tbcotacao_precos where idcotacao = '$idcotacao'  ";
$rs_valortotal = mysqli_query($conexao, $sql2);
$rows_total = mysqli_fetch_array($rs_valortotal);



?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'dark', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Cotação Produtos</title>
    <meta name="keywords" content="BR Rubber" />
    <meta name="description" content="Brasil Recapagem">
    <meta name="author" content="">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                            <li><span>Cotações</span></li>
                            <li><span>Adicionar Produto</span></li>
                        </ol>


                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-md-12 order-1 mb-4">
                        <section class="card card-default">
                            <header class="card-header">
                                <h2 class="card-title">Editar Cotação - <?php echo $idcotacao ?></h2>
                            </header>
                            <div class="card-body">
                                <div id="foo" data-appear-animation="fadeOut" data-appear-animation-delay="4000">
                                    <div class="col-lg-12">
                                        <div class="center" >
                                            <?php
                                            if (isset($_SESSION['excluir_item_cotacao_ok'])) :
                                            ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Sucesso! <?php echo $_SESSION['excluir_item_cotacao_ok'] ?> </strong><br>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['excluir_item_cotacao_ok']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['excluir_item_cotacao_error'])) :
                                            ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Atenção! <?php echo $_SESSION['excluir_item_cotacao_error'] ?></strong>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['excluir_item_cotacao_error']);
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                        <a href="cotacoes.php" class="btn btn-dark btn-block"><i class="fas fa-arrow-left"></i> Voltar</a>
                                        </div>
                                    </div>
                                </div>
                                <?php if($rows_cotacao['status'] == "F"){ ?>
                                    <label><h4>Finalizada</h4></label>
                                <?php }else{ ?>
                                    <div class="row mb-4">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <form method="POST" action="processa.php" enctype="multipart/form-data">
                                                    <label><h4>Arquivo XML</h4></label>
                                                    <input type="file" name="arquivo"><br><br>
                                                    <input type="submit" value="Enviar">
                                                                                          
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Orçamento</label>
                                                <input type="text" name="orcamento" value="<?php echo $idcotacao ?>" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Favorecido</label>
                                                    <input type="text" name="tipo" value="<?php echo mb_strtoupper($rows_cotacao['favorecido']) ?>" class="form-control" readonly />

                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label  text-weight-bold">Tipo</label>
                                                <?php if($rows_cotacao['tipo'] == "L"){
                                                        $rows_cotacao['tipo'] = "LICITAÇÃO";
                                                    }elseif($rows_cotacao['tipo'] == "CT"){
                                                        $rows_cotacao['tipo'] = "COTAÇÃO";
                                                    }  ?>
                                                    <input type="text" name="tipo" value="<?php echo $rows_cotacao['tipo'] ?>" class="form-control" readonly />

                                            </div>
                                        </div>
                                    </div> <!-- fim row-->

                                     
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <br />
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md table-hover mb-0">
                                                    <div class="scrollable visible-slider colored-slider" data-plugin-scrollable>
                                                        <div class="scrollable-content">
                                                            <thead>

                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Descrição</th>
                                                                    <th class="text-center">Unid</th>
                                                                    <th class="text-center">Quant.</th>
                                                                    <th class="text-center">Valor Unitario</th>
                                                                    <th class="text-center">Valor Total</th>
                                                                    <?php if($rows_cotacao['status'] == "F"){ }else{ ?>                                                                    
                                                                    <th class="text-center">Opção</th>
                                                                    <?php } ?>
                                                                </tr>

                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $resultado = 0;
                                                                $qtde = 0;
                                                                $item = 1;
                                                                ?>
                                                                <?php while ($rows_rsitens = mysqli_fetch_array($rs_itenscot)) {

                                                                    $bruto = 0;
                                                                    $bruto = $rows_rsitens['valor_unitario'] *  $rows_rsitens['quantidade'];

                                                                    

                                                                ?>
                                                                    
                                                                    <tr style="font-size:14px;">
                                                                        <td><?php echo $rows_rsitens['item'] ?></td>
                                                                        <td class="text-left" style="width:40%;"><?php echo $rows_rsitens['descricao'] ?></td>
                                                                        <td class="text-center"><?php echo $rows_rsitens['tipo'] ?></td>
                                                                        <td class="text-center"><input type="number" name="quantidade" id="quantidade<?php echo $item; ?>" class="form-control text-center " inputmode="numeric" value="<?php echo $rows_rsitens['quantidade'] ?>"></td>
                                                                        <td class="text-center"><input type="text" name="valor_unitario" id="valor_unitario<?php echo $item; ?>"  onkeyup="valorreais(this)" value="<?php echo number_format($rows_rsitens['valor_unitario'],2,",","." ) ?>" inputmode="numeric" class="form-control text-center valor" value=""></td>
                                                                        <td class="text-center"><input type="text" name="preco_total" id="preco_total<?php echo $item; ?>" value="<?php echo number_format($rows_rsitens['valor_total'],2, ",", "." ) ?>" inputmode="numeric" class="form-control text-center" ></td>
                                                                       
                                                                        <?php if($rows_cotacao['status'] == "F"){ }else{ ?>     
                                                                        <td class="actions-hover actions-fade text-center">
                                                                            <a href="cotacao_itens_excluir.php?idcotacao=<?php echo $rows_rsitens['idcotacao'] ?>&id=<?php echo $rows_rsitens['id'] ?>" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                                                                        </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    
                                                                    <script language="javascript" type="text/javascript">

                                                                        $(document).ready(function() {
                                                                            $("#valor_unitario<?php echo $item; ?>").blur(function() {
                                                                            var qtd = $("#quantidade<?php echo $item; ?>").val();
                                                                            var valor = $("#valor_unitario<?php echo $item; ?>").val().replace(',','.');
                                                                            var calculo = qtd * valor;
                                                                            $("#preco_total<?php echo $item; ?>").val(calculo.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                                                                            
                                                                            var v_unitario = $("#valor_unitario<?php echo $item; ?>").val();
                                                                            var v_total = $("#preco_total<?php echo $item; ?>").val();
                                                                            var idcotacao = "<?php echo $rows_rsitens['idcotacao'] ?>";
                                                                            var id = "<?php echo $rows_rsitens['id'] ?>"
                                                                            var qtde = $("#quantidade<?php echo $item; ?>").val();
                                                                            $.ajax({
                                                                                    url: 'atualiza_valor.php', 
                                                                                    type: 'POST',
                                                                                    data: { 
                                                                                        valor_unitario: v_unitario,
                                                                                        valor_total: v_total,
                                                                                        idcotacao: idcotacao,
                                                                                        id: id ,
                                                                                        qtde:qtde                                                                           
                                                                                    },
                                                                                    success: function(data){
                                                                                        $('#total').val(data);
                                                                                    }                                                                       
                                                                                })
                                                                            });
                                                                        });

                                                                    </script>
                                                                    
                                                                <?php

                                                                    $qtde = $qtde + $rows_rsitens['quantidade'];

                                                                    $multi = $rows_rsitens['valor_unitario'] * $rows_rsitens['quantidade'];

                                                                    $item = $item + 1;
                                                                } ?>
                                                                <tr style="font-size:16px;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right" style="color:red"><b>Total<b></td>
                                                                    <td class="text-center"><b><input type="text" name="total" id="total" value="<?php echo number_format($rows_total['total'], 2, ",", "." )?>" inputmode="numeric" class="form-control text-center" readonly ><b></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </form>  
                                <div class="card-footer">
                                    <br>
                                        <a href="cotacao_finaliza.php?idcotacao=<?php echo $idcotacao ?>" class="btn btn-danger float-right text-weight-bold text-white" style="border:none;"><i class="fas fa-print"></i> Salvar e Imprimir </a>
                                    <br>
                                </div>
                            </div>
                        </section>
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
        function valorreais(i) {
            var v = i.value.replace(/\D/g, '');
            v = (v / 100).toFixed(2) + '';
            v = v.replace(".", ",");
            i.value = v;
        }
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