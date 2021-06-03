<?php

session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];

$sql = "UPDATE tbcotacao SET status='D' WHERE idcotacao='$idcotacao' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cotacao'] = "Cotação $idcotacao Cancelada com Sucesso!";
} else {
    $_SESSION['msg_erro_cotacao'] = "Cotação $idcotacao não excluída, Tente novamente!";
}


$conexao->close();

header('Location: cotacoes.php');
exit;
?>