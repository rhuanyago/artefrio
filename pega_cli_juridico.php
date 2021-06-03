<?php
include("Connections/conexao.php");

function retorna($nome, $conexao)
{
    $result_aluno = "SELECT c.*, date_format(c.dt_nascimento, '%d/%m/%Y') as data FROM tbclientes c WHERE c.nome = '$nome' and c.tipopessoa = 'J' limit 1";
    $resultado_aluno = mysqli_query($conexao, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['nome_empresa'] = $row_aluno['nome'];
        $valores['nome_fantasia'] = $row_aluno['nomefantasia'];
        $valores['cnpj'] = $row_aluno['cnpj'];
        $valores['telefoneJ'] = $row_aluno['telefone'];
        $valores['telefone2J'] = $row_aluno['telefone2'];
        $valores['cep'] = $row_aluno['cep'];
        $valores['endereco'] = $row_aluno['endereco'];
        $valores['bairro'] = $row_aluno['bairro'];
        $valores['uf'] = $row_aluno['uf'];
        $valores['cidade'] = $row_aluno['cidade'];
        $valores['complemento'] = $row_aluno['complemento'];
        $valores['numero'] = $row_aluno['numero'];
    } else {
        $valores['nome_cli'] = 'Cliente não encontrado!';
    }
    return json_encode($valores);
}

if (isset($_GET['nome'])) {
    echo retorna($_GET['nome'], $conexao);
}



?>