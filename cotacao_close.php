<?php
session_start();
include("Connections/conexao.php");

$idcotacao = $_GET['idcotacao'];

$sql2 = "SELECT count(*) as total from tbcotacao_precos where idcotacao = '$idcotacao' ";
$rs_cot = mysqli_query($conexao, $sql2);
$rows_cot = mysqli_fetch_assoc($rs_cot);

if($rows_cot['total'] == 0 ){
    $_SESSION['excluir_item_cotacao_error'] = "Preencha os campos antes de finalizar!";
    header('Location: cotacao_licitacao_preco_item.php?idcotacao='.$idcotacao.' ');
}else{

$sql = "UPDATE tbcotacao SET status='F' WHERE idcotacao='$idcotacao' ";

if ($conexao->query($sql) === TRUE) {
    $_SESSION['status_cotacao_finaliza'] = "Cotação $idcotacao Finalizada!";
} else {
    $_SESSION['excluir_item_cotacao_error'] = "Cotação $idcotacao não finalizada, Tente novamente!";
}

$conexao->close();

header('Location: cotacao_finaliza.php?idcotacao='.$idcotacao.' ');
exit;

}
?>