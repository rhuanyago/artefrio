<?php

session_start();
include("Connections/conexao.php");

if(isset($_POST['btnCadastrar'])) {

$tipocad = mysqli_real_escape_string($conexao, $_POST['tipocad']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$iss = mysqli_real_escape_string($conexao, $_POST['iss']);
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$nomeEmpresa = mysqli_real_escape_string($conexao, trim($_POST['nomeJuridico']));
$nomeFantasia = mysqli_real_escape_string($conexao, trim($_POST['nomeFantasia']));
$apelido = mysqli_real_escape_string($conexao, trim($_POST['apelido']));
$cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$rg = mysqli_real_escape_string($conexao, trim($_POST['rg']));
$dtnascimento = mysqli_real_escape_string($conexao, trim($_POST['dtnascimento']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$telefoneJ = mysqli_real_escape_string($conexao, $_POST['telefoneJ']);
$telefone2J = mysqli_real_escape_string($conexao, $_POST['telefone2J']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
$uf = mysqli_real_escape_string($conexao, $_POST['uf']);
$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));

$usuid = $_SESSION['usuario'];

$sql = "select count(*) as total from tbclientes where cpf = '".$cpf."' or cnpj = '".$cnpj."' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = "Cadastro já existe em nosso sistema!";
    header('Location: cad_cliente.php');
    exit;
}

$sql = "INSERT INTO tbclientes (nome, nomefantasia, apelido, tipocad, tipopessoa, iss, cpf, cnpj, rg, telefone, telefone2, dt_nascimento, data_cadastro, usuid, habilitado, cep, endereco, bairro, uf, cidade, complemento, numero) VALUES ('$nome', '$nomeFantasia', '$apelido', '$tipocad', '$tipo', '$iss', '$cpf', '$cnpj', '$rg', '$telefone', '$telefone2', '$dtnascimento', NOW(), '$usuid', 'S', '$cep', '$endereco', '$bairro', '$uf', '$cidade', '$complemento', '$numero') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_cliente'] = "Cliente Cadastrado com Sucesso!";
    header('Location: cad_cliente.php');
    exit;
}else{
    $_SESSION['usuario_existe'] = "Houve um problema ao Cadastrar!";
    header('Location: cad_cliente.php');
    exit;
}

$conexao->close();

header('Location: cad_cliente.php');
exit;

}
?>