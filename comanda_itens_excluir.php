<?php

session_start();
include("Connections/conexao.php");

$idpedido = $_GET['idpedido'];
$iditem = $_GET['iditem'];

$_SESSION['idpedido'] = $idpedido;

$sql = "select sum(valor*quantidade) as total from tbcotacao_precos where idpedido = '$idpedido' and iditem='$iditem' ";
$rstotvenda = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rstotvenda);
$totalitem = $result['total'];



// SELECT QUE PEGA RESULTADO COMO VARIAVEL //
$sql = "select sum(valor*quantidade) as total from tbcotacao_precos where idpedido = '$idpedido' ";
$rstotvenda = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($rstotvenda);
$totalvenda = $result['total'];


$total = $totalvenda - $totalitem;

$sql2 = "DELETE FROM tbcotacao_precos WHERE iditem='$iditem' and idpedido='$idpedido' ";

if ($conexao->query($sql2) === TRUE) {
    $_SESSION['status_produto'] = "Produto Excluído com Sucesso!";
} else {
    $_SESSION['msg_erro_produto'] = "Produto Não excluído, Tente novamente!";
}

//$sql2 = "UPDATE tbpedidos SET valor='$total' WHERE idpedido='$idpedido' ";

//if ($conexao->query($sql2) === TRUE) {

//} else {
    
//}

$conexao->close();

header('Location: pedido_itens_adiciona.php');
exit;
?>