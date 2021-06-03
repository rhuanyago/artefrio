<?php

session_start();
include("Connections/conexao.php");

if(isset($_POST['btnCadastrar'])) {

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$situacao = mysqli_real_escape_string($conexao, $_POST['situacao']);
$tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
$classificacao = mysqli_real_escape_string($conexao, trim($_POST['classificacao']));
$meta = mysqli_real_escape_string($conexao, trim($_POST['meta']));
$dtadmissao = mysqli_real_escape_string($conexao, trim($_POST['dtadmissao']));
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);
$rg = mysqli_real_escape_string($conexao, $_POST['rg']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
$uf = mysqli_real_escape_string($conexao, $_POST['uf']);
$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
$complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);

$meta=str_replace(",",".",$meta);

$dtadmissao = implode("-",array_reverse(explode("/",$dtadmissao)));

$usuid = $_SESSION['usuario'];

$sql = "select count(*) as total from tbvendedores where rg = '$rg' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = "Vendedor já existe em nosso sistema!";
    header('Location: cad_vendedor.php');
    exit;
}

echo $sql = "INSERT INTO tbvendedores (nome, rg, situacao, tipo, classificacao, meta, data_admissao, telefone, observacao, usuid, cep, endereco, bairro, uf, cidade, complemento, numero) VALUES ('$nome', '$rg', '$situacao', '$tipo', '$classificacao', '$meta', '$dtadmissao', '$telefone', '$observacao', '$usuid' ,'$cep', '$endereco', '$bairro', '$uf', '$cidade', '$complemento', '$numero') ";

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro_vendedor'] = "Vendedor Cadastrado com Sucesso!";
    header('Location: cad_vendedor.php');
    exit;
}else{
    $_SESSION['usuario_existe'] = "Houve um problema ao Cadastrar!";
    header('Location: cad_vendedor.php');
    exit;
}

$conexao->close();

header('Location: cad_vendedor.php');
exit;

}
?>