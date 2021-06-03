<?php

session_start();
include("Connections/conexao.php");

$idpag = $_GET['idpag'];

$favorecido = mysqli_real_escape_string($conexao, trim($_POST['favorecido']));
$dados = mysqli_real_escape_string($conexao, trim($_POST['dados']));
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$parcelas = mysqli_real_escape_string($conexao, $_POST['parcelas']);
$dtvencimento = mysqli_real_escape_string($conexao, $_POST['dtvencimento']);
$dtultimodia = mysqli_real_escape_string($conexao, $_POST['dtultimodia']);
$status = mysqli_real_escape_string($conexao, $_POST['status']);

$dtvencimento = implode('-', array_reverse(explode('/', $dtvencimento)));
$dtultimodia = implode('-', array_reverse(explode('/', $dtultimodia)));

$valor=str_replace(",",".",$valor);

$dt1 = strtotime($dtvencimento);
$dt2 = strtotime(date('d-m-Y'));

echo $sql = "UPDATE tbpagamento_dia SET favorecido='$favorecido',dados='$dados', valor='$valor', data_vencimento='$dtvencimento', parcelas='$parcelas', ultimo_dia='$dtultimodia', status='$status' WHERE idpag = '$idpag' ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_update_pag_dia'] = "Pagamento Alterado com Sucesso!";
}else{
    $_SESSION['status_update_pag_dia_error'] = "Algo deu errado. Tente novamente!";
}

$conexao->close();

header('Location: pagamento_dia_alterar.php?id='.$idpag.'');
exit;
?>