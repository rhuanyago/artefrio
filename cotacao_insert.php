<?php

session_start();
include("Connections/conexao.php");

$idcotacao = mysqli_real_escape_string($conexao, trim($_POST['idcotacao']));
$favorecido = mysqli_real_escape_string($conexao, trim($_POST['favorecido']));
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

$usuid = $_SESSION['usuario']; 

if($tipo == "ND"){
    $_SESSION['cotacao_escolhe'] = "Por favor, Escolha um tipo!";
    header('Location: nova_cotacao.php');
}else{

$sql = "INSERT INTO tbcotacao (idcotacao, favorecido, tipo, usuid, data_inc) VALUES ('$idcotacao', '$favorecido' , '$tipo', '$usuid', NOW()) ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cotacao'] = "Nova Cotação Criada!";
}else {
    $_SESSION['msg_erro_cotacao'] = "Tente novamente!";
}

$query = "select ifnull(max(idcotacao),0) ultimo from tbcotacao c;";

$result2 = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_array($result2);

$_SESSION['idcotacao'] = $resultado['ultimo'];

$idcotacao = $_SESSION['idcotacao'];

$conexao->close();

if($tipo == "CT"){
header('Location: cotacao_preco_item.php?idcotacao='.$idcotacao.'');
exit;
}else{
header('Location: cotacao_licitacao_preco_item.php?idcotacao='.$idcotacao.'');
exit;
}

}
?>