<?php

session_start();
include("Connections/conexao.php");

$favorecido = mysqli_real_escape_string($conexao, trim(mb_strtoupper($_POST['favorecido'], 'UTF-8')));
$dados = mysqli_real_escape_string($conexao, trim(mb_strtoupper($_POST['dados'], 'UTF-8')));
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$parcelas = mysqli_real_escape_string($conexao, $_POST['parcelas']);
$dtvencimento = mysqli_real_escape_string($conexao, $_POST['dtvencimento']);
$dtultimodia = mysqli_real_escape_string($conexao, $_POST['dtultimodia']);

$data = $dtvencimento;

$dtvencimento = implode('-', array_reverse(explode('/', $dtvencimento)));

if($data != null){
  $data = explode( "/",$data);

  $dia = $data[0];
  $mes = $data[1];
  $ano = $data[2];
} else {
    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");
  }

$dtultimodia = implode('-', array_reverse(explode('/', $dtultimodia)));

$valor=str_replace(",",".",$valor);

for($x = 0; $x < $parcelas; $x++){
    $dt_parcelas[$x] = date("Y-m-d",strtotime("+".$x." month",mktime(0, 0, 0,$mes,$dia,$ano)));
  }//for
  foreach($dt_parcelas as $indice => $datas){
    // echo $datas."<br>";
    // echo ($indice+1)."<br>";
  $indice = $indice + 1;
  $ins = "INSERT INTO tbpagamento_dia (favorecido, dados, valor, data_vencimento, parcelas, ultimo_dia) VALUES ('$favorecido', '$dados', '$valor', '$datas', '$indice', '$dtultimodia') ";
    
  if($conexao->query($ins) === TRUE) {
      $_SESSION['status_cad_pag_dia'] = "Pagamento Inserido com Sucesso!";
  }else{
      $_SESSION['status_cad_pag_dia_error'] = "Algo deu errado. Tente novamente!";
  }
 

}//foreach

// exit;



$conexao->close();

header('Location: pagamento_dia.php');
exit;
?>