<?php

session_start();
include("Connections/conexao.php");

$descricao = $_POST['descricao'];
$idcotacao = $_POST['idcotacao'];
$iditem = $_POST['id'];
$valor_unitario = $_POST['valor_unitario']; 
$valor_total = $_POST['valor_total'];
$qtde = $_POST['qtde'];

//$valor_unitario = str_replace(",",".",$valor_unitario);
//$valor_total = str_replace(",",".",$valor_total);
$valor_unitario = str_replace(',','.', str_replace('.','', $valor_unitario));
$valor_total = str_replace(',','.', str_replace('.','', $valor_total));

$sql4 = "SELECT count(*) as total from tbcotacao_precos where idcotacao = '$idcotacao' and item = '$iditem' ";
$result = mysqli_query($conexao, $sql4);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){

$sql = "UPDATE tbcotacao_precos SET quantidade='$qtde', valor_unitario='$valor_unitario', valor_total='$valor_total' WHERE idcotacao = '$idcotacao' and item='$iditem' ";

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

}else{

$sqlins = "INSERT INTO tbcotacao_precos (idcotacao, item, descricao, tipo, quantidade, valor_unitario, valor_total) VALUES ('$idcotacao', '$iditem', '$descricao', 'UNID', '$qtde', '$valor_unitario', '$valor_total' ) ";

if ($conexao->query($sqlins) === TRUE) {
     "Insert com sucesso";
} else {
     "Erro no Insert: " . $conexao->error;
}


$sql2 = "SELECT sum(valor_total) as total from tbcotacao_precos where idcotacao = '$idcotacao'  ";
$rs_valortotal = mysqli_query($conexao, $sql2);
$rows_total = mysqli_fetch_array($rs_valortotal);

$data = number_format($rows_total['total'],2, ",", ".");



echo $data;

}

?>