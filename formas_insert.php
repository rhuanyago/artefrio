<?php
session_start();
include("Connections/conexao.php");

$idpedido = mysqli_real_escape_string($conexao, $_POST['pedido']);
$reg = mysqli_real_escape_string($conexao, $_POST['reg']);
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$forma = mysqli_real_escape_string($conexao, $_POST['forma']);
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$valorrecebido = mysqli_real_escape_string($conexao, $_POST['valorrecebido']);

$valor=str_replace(",",".",$valor);
$valorrecebido=str_replace(",",".",$valorrecebido);

$_SESSION['idpedido'] = $idpedido;

$troco = $valor - $valorrecebido;

$troco=str_replace(",",".",$troco);

$sql = "select * from tbpedido_pagamento where forma = '$forma' AND idpedido = '$idpedido'; ";
$rsforma_verifica = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($rsforma_verifica);

if(($valor == "0") or ($forma == "")) {
    $_SESSION['msg_erro_forma'] = "Insira um Valor ou Forma de Pagamento em Branco!";
    header('Location: form_pagamento.php');
    exit;
}else{

    if($forma == "R$"){

        $sql = "INSERT INTO tbpedido_pagamento (idpedido, forma, valor, troco, tipo) VALUES ('$idpedido', '$forma', '$valor', '$troco', '$tipo') ";

        if($conexao->query($sql) === TRUE) {
            $_SESSION['status_forma'] = "Forma de Pagamento adicionada!";
        }else {
            $_SESSION['msg_erro_forma'] = "Tente novamente!";
        }

        $conexao->close();

        header('Location: form_pagamento.php');
        exit;

    }else{


$sql = "INSERT INTO tbpedido_pagamento (idpedido, forma, valor, troco, tipo) VALUES ('$idpedido', '$forma', '$valor', '0', '$tipo') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_forma'] = "Forma de Pagamento adicionada!";
}else {
    $_SESSION['msg_erro_forma'] = "Tente novamente!";
}

$conexao->close();

header('Location: form_pagamento.php');
exit;

    }

}

?>