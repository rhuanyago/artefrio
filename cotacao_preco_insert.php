<?php

session_start();
include("Connections/conexao.php");

$usuid = $_SESSION['usuario'];

$idpedido = mysqli_real_escape_string($conexao, trim($_POST['pedido']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$qtde = mysqli_real_escape_string($conexao, $_POST['qtde']);
$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

if($qtde <= 0){
    $_SESSION['msg_erro_prod_add'] = "Verifique a Quantidade do Produto!";
    header('Location: cotacao_preco.php');
    exit;
}else{

$_SESSION['idpedido'] = $idpedido;

$multi = $preco * $qtde;

$resultado = $resultado + $multi;

// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "select sum(valor*quantidade) as total from tbcotacao_precos where idpedido = '$idpedido' ";
$rstotvenda = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rstotvenda);
$totalvenda = $result['total'];


$total = $totalvenda + $resultado;



$sql = "INSERT INTO tbcotacao_precos (idpedido, referencia, descricao, quantidade, valor) VALUES ('$idpedido', '$referencia', '$descricao', '$qtde', '$preco')";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_prod_add'] = "Produto adicionado!";
}else {
    $_SESSION['msg_erro_prod_add'] = "Produto sem preço ou sem estoque!";
}


$sql2 = "INSERT INTO tbpedidos (idpedido, idcliente, tipo, usuinc, data_inc) VALUES ('$idpedido', '0', 'C', '$usuid', NOW())";

if($conexao->query($sql2) === TRUE) {

}else {

}


//$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

//if ($conexao->query($sql2) === TRUE) {
    //$_SESSION['status_prod_update'] = "Pedido Excluído com Sucesso!";
//} else {
   // $_SESSION['msg_erro_prod_update'] = "Pedido Não excluído, Tente novamente!";
//}


$conexao->close();

header('Location: cotacao_preco.php');
exit;

}
?>