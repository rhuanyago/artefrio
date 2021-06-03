<?php

session_start();
include("Connections/conexao.php");

$id = $_SESSION['id'];

$idcotacao = mysqli_real_escape_string($conexao, trim($_POST['idcotacao']));
$item = mysqli_real_escape_string($conexao, trim($_POST['item']));
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
$valor_unitario = mysqli_real_escape_string($conexao, $_POST['valor_unitario']);
$valor_total = mysqli_real_escape_string($conexao, $_POST['valor_total']);

$valor_unitario = str_replace(",",".",$valor_unitario);
$valor_total = str_replace(",",".",$valor_total);

echo $sql = "UPDATE tbcotacao_precos SET item='$item', descricao='$descricao', tipo='$tipo', quantidade='$quantidade', valor_unitario='$valor_unitario', valor_total='$valor_total' WHERE idcotacao = '$idcotacao' and id='$id' ";

if($conexao->query($sql) === TRUE){
	$_SESSION['msg_cotacao_ok'] = "Item da Cotação $idcotacao alterado com Sucesso!";
}else {
    $_SESSION['msg_cotacao_error'] = "Não foi possível alterar o Item $item!";
}

$conexao->close();

header('Location: consulta_cotacao.php ');

exit;


?>