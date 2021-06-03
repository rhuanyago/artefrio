<?php
include("Connections/conexao.php");

function retorna($nome, $conexao)
{
    $result_aluno = "SELECT c.*, date_format(c.dt_nascimento, '%d/%m/%Y') as data FROM tbclientes c WHERE c.nome = '$nome' limit 1";
    $resultado_aluno = mysqli_query($conexao, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['nome_cli'] = $row_aluno['nome'];
        $valores['apelido'] = $row_aluno['apelido'];
        $valores['cpf'] = $row_aluno['cpf'];
        $valores['rg'] = $row_aluno['rg'];
        $valores['dtnascimento'] = $row_aluno['data'];
        $valores['telefone'] = $row_aluno['telefone'];
        $valores['cep'] = $row_aluno['cep'];
        $valores['endereco'] = $row_aluno['endereco'];
        $valores['bairro'] = $row_aluno['bairro'];
        $valores['uf'] = $row_aluno['uf'];
        $valores['cidade'] = $row_aluno['cidade'];
        $valores['complemento'] = $row_aluno['complemento'];
        $valores['numero'] = $row_aluno['numero'];
    } else {
        $valores['nome_cli'] = '';
    }
    return json_encode($valores);
}

if (isset($_GET['nome'])) {
    echo retorna($_GET['nome'], $conexao);
}



?>