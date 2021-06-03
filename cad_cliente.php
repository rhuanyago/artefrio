<?php
session_start();
include("Connections/conexao.php");
?>
<!doctype html>
<html class="has-tab-navigation header-dark boxed" data-style-switcher-options="{'headerColor': 'dark', 'backgroundColor': 'light', 'headerColor': 'dark', 'changeLogo': false, 'layoutStyle': 'boxed'}">

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
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

</head>

<body class="loading-overlay-showing" data-loading-overlay>

    <div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

    <section class="body">

        <?php include('header.php'); ?>
            
            <!-- end: header -->

			<div class="inner-wrapper">
                
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
                            <li><span>Cadastros</span></li>
                            <li><span>Clientes</span></li>
                        </ol>
                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-default">
                            <header class="card-header">
                                <h2 class="card-title">Cadastro de Clientes <i class="fas fa-user-plus"></i></h2>
                            </header>
                            <div class="card-body">
                                <form class="form-horizontal form-bordered" method="POST" action="cad_cliente_insert.php" id="Cadastro" name="Cadastro">

                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['status_cadastro_cliente'])) :
                                            ?>
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Sucesso! <?php echo $_SESSION['status_cadastro_cliente'] ?> </strong><br>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['status_cadastro_cliente']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="center">
                                            <?php
                                            if (isset($_SESSION['usuario_existe'])) :
                                            ?>
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Atenção! <?php echo $_SESSION['usuario_existe'] ?></strong>
                                                </div>
                                            <?php
                                            endif;
                                            unset($_SESSION['usuario_existe']);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Tipo</label>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </span>
                                                <select class="form-control" name="tipocad">
                                                    <option value="C">Cliente</option>
                                                    <option value="F">Fornecedor</option>
                                                    <option value="A">Ambos</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-sm-right pt-0"></label>
                                        <div class="col-sm-2">
                                            <div class="radio-custom radio-primary">
                                                <input id="F" name="tipo" id="tipo" type="radio" value="F" required />
                                                <label for="F">Pessoa Física</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="radio-custom radio-primary">
                                                <input id="J" name="tipo" id="tipo" type="radio" value="J" required />
                                                <label for="J">Pessoa Jurídica</label>
                                            </div>
                                        </div>
                                    </div>     

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">ISS</label>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <select name="iss" class="form-control">
                                                    <option value="N">Não Retem</option>
                                                    <option value="RO">Retido pelo Órgão Público</option>
                                                    <option value="RT">Retido pelo Tomador</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Nome</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="nome" id="nome" autofocus maxlength="50" autocomplete="off" class="form-control" >
                                                
                                            </div>
                                            <div id="countryList"></div>
                                        </div>
                                    </div>                                  

                                    <div class="form-group row campoPessoaJuridica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Nome Empresa</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="nomeJuridico" id="nomeJuridico" autocomplete="off" class="form-control"  >
                                                
                                            </div>
                                            <div id="countryListJ"></div>
                                        </div>
                                    </div>                                    

                                    <div class="form-group row campoPessoaJuridica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Nome Fantasia</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-circle"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="nomeFantasia" id="nomeFantasia" autocomplete="off" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Apelido</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-circle"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="apelido" id="apelido" autocomplete="off" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaJuridica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">CNPJ</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="cnpj" id="cnpj" inputmode="numeric" data-plugin-masked-input data-input-mask="99.999.999/9999-99" autocomplete="off" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">CPF</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="cpf" id="cpf" inputmode="numeric" data-plugin-masked-input data-input-mask="999.999.999-99" autocomplete="off" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">RG</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="rg" inputmode="numeric" maxlength="20" autocomplete="off" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Data de Nascimento</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </span>
                                                <input id="date" name="dtnascimento" id="dtnascimento" inputmode="numeric" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Telefone</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </span>
                                                <input name="telefone" inputmode="numeric" autocomplete="off" data-plugin-masked-input data-input-mask="(99) 99999-9999" placeholder="(DD) 99699-1234" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaJuridica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Telefone</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </span>
                                                <input name="telefoneJ" id="telefoneJ" inputmode="numeric" autocomplete="off" placeholder="(DD) 9969-1234" data-plugin-masked-input data-input-mask="(99) 9999-9999" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaJuridica">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Telefone 2</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </span>
                                                <input name="telefone2J" id="telefone2J" inputmode="numeric" autocomplete="off" placeholder="(DD) 9969-1234" data-plugin-masked-input data-input-mask="(99) 9999-9999" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                                                          
                                        <header class="card-header mb-4">
                                            <h2 class="card-title text-center col-lg-4">Endereço <i class="fas fa-address-card"></i></h2>
                                        </header>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">CEP</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="cep" id="cep" autocomplete="off" class="form-control" data-plugin-masked-input data-input-mask="99999-999" required="required">
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Endereço</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-truck"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="endereco" id="endereco" autocomplete="off" class="form-control" required="required" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Bairro</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="bairro" id="bairro" autocomplete="off" class="form-control" required="required" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Estado</label>
                                        <div class="col-lg-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="uf" id="uf" required="required" readonly></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Cidade</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="cidade" id="cidade" autocomplete="off" class="form-control" required="required" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Complemento</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="complemento" id="complemento" autocomplete="off" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Número</label>
                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <input type="text" name="numero" id="numero" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <div class="col-sm-8 text-center">
                                            <button type="submit" id="cadastrar" name="btnCadastrar" class="btn btn-success mt-2">Cadastrar</button>
                                            <a href="home.php" class="btn btn-dark mt-2">Voltar</a>
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
    <script src="js/examples/examples.modals.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            $(".campoPessoaJuridica, .campoPessoaFisica").hide();
        });

        $("input:radio[name=tipo]").on("change", function () {   
            if($(this).val() == "F")
            {
                $(".campoPessoaFisica").show(); 
                $('.campoPessoaFisica').attr('required'); 
                $(".campoPessoaJuridica").hide();
            }
            else if($(this).val() == "J")
            {
                $(".campoPessoaFisica").hide(); 
                $('.campoPessoaJuridica').attr('required'); 
                $(".campoPessoaJuridica").show();   
            }

            
        });

    </script>

<script type="text/javascript" >

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#endereco").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                        $("#complemento").focus();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>

<script> // PESSOA FÍSICA COMPLETE

    $(document).ready(function() { 
        $('#nome2').keyup(function() {
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
            $('#nome2').val($(this).text());
            $('#countryList').fadeOut();
            $('#modalAnim').modal('hide');
            $('#nome').focus();
        });
    });

    $(document).on('click', 'li', function() { // Completar campos P Física
            $('#modalAnim').modal('hide');
            $(nome).val($(this).text());
            $("input[name='nome']").blur(function() {
            var $nome_cli = $("input[name='nome']");
            var $apelido =  $("input[name='apelido']");
            var $cpf =      $("input[name='cpf']");
            var $rg =       $("input[name='rg']");
            var $dtnascimento = $("input[name='dtnascimento']");
            var $telefone = $("input[name='telefone']");
            var $cep = $("input[name='cep']");
            var $endereco = $("input[name='endereco']");
            var $bairro = $("input[name='bairro']");
            var $uf = $("input[name='uf']");
            var $cidade = $("input[name='cidade']");
            var $complemento = $("input[name='complemento']");
            var $numero = $("input[name='numero']");
            $.getJSON('pega_cli.php', {
                nome: $(this).val()
            }, function(json) {
                $nome_cli.val(json.nome_cli);
                $apelido.val(json.apelido);
                $cpf.val(json.cpf);
                $rg.val(json.rg);
                $dtnascimento.val(json.dtnascimento);
                $telefone.val(json.telefone);
                $cep.val(json.cep);
                $endereco.val(json.endereco);
                $bairro.val(json.bairro);
                $uf.val(json.uf);
                $cidade.val(json.cidade);
                $complemento.val(json.complemento);
                $numero.val(json.numero);
            });
        });
            $('#countryList').fadeOut();
            $('#nome').focus();
        });



        $(document).on('click', 'li', function() { // Completar campos P Juridica
            $('#modalAnim').modal('hide');
            $(nome).val($(this).text());
            $("input[name='nomeJuridico']").blur(function() {
            var $nome_empresa = $("input[name='nomeJuridico']");
            var $nome_fantasia =  $("input[name='nomeFantasia']");
            var $cnpj =      $("input[name='cnpj']");
            var $telefoneJ =  $("input[name='telefoneJ']");
            var $telefone2J = $("input[name='telefone2J']");
            var $cep = $("input[name='cep']");
            var $endereco = $("input[name='endereco']");
            var $bairro = $("input[name='bairro']");
            var $uf = $("input[name='uf']");
            var $cidade = $("input[name='cidade']");
            var $complemento = $("input[name='complemento']");
            var $numero = $("input[name='numero']");
            $.getJSON('pega_cli.php', {
                nome: $(this).val()
            }, function(json) {
                $nome_empresa.val(json.nome_empresa);
                $nome_fantasia.val(json.nome_fantasia);
                $cnpj.val(json.cnpj);
                $telefoneJ.val(json.telefoneJ);
                $telefone2J.val(json.telefone2J);
                $cep.val(json.cep);
                $endereco.val(json.endereco);
                $bairro.val(json.bairro);
                $uf.val(json.uf);
                $cidade.val(json.cidade);
                $complemento.val(json.complemento);
                $numero.val(json.numero);
            });
        });
            $('#countryList').fadeOut();
            $('#nomeJuridico').focus();
        });
    

</script> 









</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>