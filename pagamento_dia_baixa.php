<?php

session_start();
include("Connections/conexao.php");

$idpag = $_GET['idpag'];

echo $sql = "UPDATE tbpagamento_dia SET status='P', data_pagamento=NOW() WHERE idpag = '$idpag' ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_baixa_pag_dia'] = "Pagamento baixado com Sucesso!";
}else{
    $_SESSION['status_baixa_pag_dia_error'] = "Algo deu errado. Tente novamente!";
}

$conexao->close();

header('Location: consulta_pagamento_dia.php');
exit;
?>