<?php

session_start();
include("Connections/conexao.php");

$idpedido = mysqli_real_escape_string($conexao, trim($_POST['pedido']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$qtde = mysqli_real_escape_string($conexao, $_POST['qtde']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

$multi = $preco * $qtde;
$resultado = 0;
$resultado = $resultado + $multi;

// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "select sum(valor*quantidade) as total from tbpedidos_item where idpedido = '$idpedido' ";
$rstotvenda = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rstotvenda);
$totalvenda = $result['total'];

$total = $totalvenda + $resultado;


$sql = "INSERT INTO tbpedidos_item (idpedido, referencia, descricao, quantidade, valor) VALUES ('$idpedido', '$referencia', '$descricao', '$qtde', '$preco')";

if($conexao->query($sql) === TRUE) {

}else {

}

//$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

//if ($conexao->query($sql2) === TRUE) {

//} else {
    
//}
//
$conexao->close();

header('Location: nova_venda.php');
exit;
?>