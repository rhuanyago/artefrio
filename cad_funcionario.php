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
    <title>Cadastro de Funcionários</title>
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
    <script src="master/style-switcher/style.switcher.localstorage.js"></script>

</head>

<body>

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
                            <li><span>Funcionários</span></li>
                        </ol>
                    </div>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col-xl-12 order-1 mb-4">
                        <section class="card card-default">
                            <header class="card-header">
                                <h2 class="card-title">Cadastro de Funcionários <i class="fas fa-user-plus"></i></h2>
                            </header>
                            <div class="card-body">
                                <form class="form-horizontal form-bordered" method="POST" action="verifica_cad_cliente.php" id="Cadastro" name="Cadastro">

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
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Nome</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="nome" autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">CPF</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="cpf" inputmode="numeric" data-plugin-masked-input data-input-mask="999.999.999-99" autocomplete="off" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">RG</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="rg" inputmode="numeric" autocomplete="off" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Data de Nascimento</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </span>
                                                <input id="date" name="dtnascimento" id="dtnascimento" inputmode="numeric" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label text-lg-right pt-2">Telefone</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </span>
                                                <input id="telefone" name="telefone" id="telefone" inputmode="numeric" autocomplete="off" placeholder="(DD) 99699-1234" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
										<label class="col-lg-3 control-label text-lg-right pt-2">Função</label>
										<div class="col-lg-6">
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fas fa-user"></i>
													</span>
												</span>
                                                <?php 
												$query = "SELECT * FROM tbfuncoes;";
												$rsfuncao = mysqli_query($conexao, $query);
											?>
												<select name="permissao" id="permissao" class="form-control">
													<option>Selecione</option>
                                                    <?php while ($rows_rsfunc = mysqli_fetch_assoc($rsfuncao)) { ?>
                                                        <option value=""><?php echo $rows_rsfunc['nome'] ?></option>
                                                    <?php } ?>    
												</select>
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
                                                <input type="text" name="cep" id="cep" autocomplete="off" class="form-control" data-plugin-masked-input data-input-mask="99.999-999" required>
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
                                                <input type="text" name="rua" id="rua" autocomplete="off" class="form-control" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Bairro</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="bairro" id="bairro" autocomplete="off" class="form-control" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Estado</label>
                                        <div class="col-lg-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="uf" id="uf" required readonly></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Cidade</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="cidade" id="cidade" autocomplete="off" class="form-control" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Complemento</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input type="text" name="complemento" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row campoPessoaFisica">
                                    <label class="col-lg-3 control-label text-lg-right pt-2 ">Número</label>
                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <input type="text" name="endereco" autocomplete="off" class="form-control" required >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="row">
                                        <div class="col-sm-8 text-center">
                                            <button type="submit" name="btnCadastrar" class="btn btn-success mt-2">Cadastrar</button>
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

    
<script type="text/javascript" >

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
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
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
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
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/pages-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jun 2018 18:56:35 GMT -->

</html>