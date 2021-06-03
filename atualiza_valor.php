<?php

session_start();
include("Connections/conexao.php");

$idcotacao = $_POST['idcotacao'];
$id = $_POST['id'];
$valor_unitario = $_POST['valor_unitario']; 
$valor_total = $_POST['valor_total'];
$qtde = $_POST['qtde'];

//$valor_unitario = str_replace(",",".",$valor_unitario);
//$valor_total = str_replace(",",".",$valor_total);
$valor_unitario = str_replace(',','.', str_replace('.','', $valor_unitario));
$valor_total = str_replace(',','.', str_replace('.','', $valor_total));

$sql = "UPDATE tbcotacao_precos SET quantidade='$qtde', valor_unitario='$valor_unitario', valor_total='$valor_total' WHERE idcotacao = '$idcotacao' and id='$id' ";

if ($conexao->query($sql) === TRUE) {
    "Update com sucesso";
} else {
    "Erro no Update: " . $conexao->error;
}

$sql2 = "SELECT sum(valor_total) as total from tbcotacao_precos where idcotacao = '$idcotacao'  ";
$rs_valortotal = mysqli_query($conexao, $sql2);
$rows_total = mysqli_fetch_array($rs_valortotal);

$data = number_format($rows_total['total'],2, ",", ".");



echo $data;



?>