<?php

session_start();
include("Connections/conexao.php");

$idcliente = mysqli_real_escape_string($conexao, trim($_POST['idcliente']));
$nome_cli = mysqli_real_escape_string($conexao, trim($_POST['nome_cli']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$tipo = mysqli_real_escape_string($conexao, trim($_POST['tipo']));

$usuid = $_SESSION['usuario']; 

$sql = "INSERT INTO tbpedidos (idcliente, tipo, usuid, data_inc) VALUES ('$idcliente', 'P', '$usuid', NOW()) ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_comanda'] = "Novo Pedido Criado!";
}else {
    $_SESSION['msg_erro_comanda'] = "Tente novamente!";
}

$query = "select max(idpedido)ultimo from tbpedidos c;";

$result2 = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_array($result2);

$_SESSION['idpedido'] = $resultado['ultimo'];

$idpedido = $_SESSION['idpedido'];

$conexao->close();

header('Location: pedido_itens_adiciona.php?idpedido='.$idpedido.'');
exit;

?>