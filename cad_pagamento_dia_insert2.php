<?php

session_start();
include("Connections/conexao.php");

$favorecido = mysqli_real_escape_string($conexao, trim(mb_strtoupper($_POST['favorecido'], 'UTF-8')));
$dados = mysqli_real_escape_string($conexao, trim(mb_strtoupper($_POST['dados'], 'UTF-8')));
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$dataPrimeiraParcela = mysqli_real_escape_string($conexao, $_POST['dtvencimento']);
$nParcelas = mysqli_real_escape_string($conexao, $_POST['parcelas']);
$dtultimodia = mysqli_real_escape_string($conexao, $_POST['dtultimodia']);

$dataPrimeiraParcela = implode('-', array_reverse(explode('/', $dataPrimeiraParcela)));
$dtultimodia = implode('-', array_reverse(explode('/', $dtultimodia)));

$valor=str_replace(",",".",$valor);

function calcularParcelas($nParcelas, $dataPrimeiraParcela = null){
    if($dataPrimeiraParcela != null){
      $dataPrimeiraParcela = explode( "/",$dataPrimeiraParcela);
      $dia = $dataPrimeiraParcela[0];
      $mes = $dataPrimeiraParcela[1];
      $ano = $dataPrimeiraParcela[2];
    } else {
      $dia = date("d");
      $mes = date("m");
      $ano = date("Y");
    }
   
    for($x = 1; $x <= $nParcelas; $x++){
      $dt_parcelas[$x] = date("Y-m-d",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano)));
    }//for
    foreach($dt_parcelas as $indice => $datas){
       echo $ins = "INSERT INTO cad_parcelas(
      nr_parcelas,
      data_vencimento_parcelas,
      valor_parcelas
       )VALUES(
      '$indice',
      '$datas',
      '1.99'
       )";
    }//foreach
  }//function
  calcularParcelas($nParcela, $dataPrimeiraParcela);


if($conexao->query($ins) === TRUE) {
    $_SESSION['status_cad_pag_dia'] = "Pagamento Inserido com Sucesso!";
}else{
    $_SESSION['status_cad_pag_dia_error'] = "Algo deu errado. Tente novamente!";
}

$conexao->close();

header('Location: pagamento_dia.php');
exit;
?>