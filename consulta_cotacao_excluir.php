<?php

session_start();
include("Connections/conexao.php");

$id = $_GET['id'];
$idcotacao = $_GET['idcotacao'];

echo $sql = "DELETE FROM tbcotacao_precos WHERE id='$id' and idcotacao='$idcotacao'";


if ($conexao->query($sql) === TRUE) {
    $_SESSION['msg_cotacao_ok'] = "Cotação $idcotacao excluída com Sucesso!";
} else {
    $_SESSION['msg_cotacao_error'] = "Não foi possível excluir a cotação $idcotacao";
}

$conexao->close();

header('Location: consulta_cotacao.php');
exit;

?>