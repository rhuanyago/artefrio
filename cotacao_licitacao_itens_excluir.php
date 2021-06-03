<?php

session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];
$id = $_GET['id'];

$_SESSION['idcotacao'] = $idcotacao;

$sql2 = "DELETE FROM tbcotacao_precos WHERE id='$id' and idcotacao='$idcotacao' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['excluir_item_cotacao_ok'] = "Item Excluído com Sucesso!";
} else {
    $_SESSION['excluir_item_cotacao_error'] = "item Não excluído, Tente novamente!";
}

//$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

//if ($conexao->query($sql2) === TRUE) {

//} else {
    
//}

$conexao->close();

header('Location: cotacao_licitacao_preco_item.php?idcotacao='.$idcotacao.' ');
exit;
?>