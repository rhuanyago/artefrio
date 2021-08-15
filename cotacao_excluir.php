<?php

session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];

$sql = "DELETE FROM tbcotacao WHERE idcotacao='$idcotacao' ";

$sql2 = "DELETE FROM tbcotacao_precos WHERE idcotacao='$idcotacao' ";

if ($conexao->query($sql) === TRUE && $conexao->query($sql2)) {
    $_SESSION['status_cotacao'] = "Cotação $idcotacao excluída com Sucesso!";
} else {
    $_SESSION['msg_erro_cotacao'] = "Cotação $idcotacao não excluída, Tente novamente!";
}


$conexao->close();

header('Location: cotacoes.php#finalizadas');
exit;
?>