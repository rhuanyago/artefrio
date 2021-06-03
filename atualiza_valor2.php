<?php
include("Connections/conexao.php");

function retorna($nome, $conexao)
{
    $result_aluno = "SELECT * FROM tbclientes WHERE nome = '$nome' limit 1";
    $resultado_aluno = mysqli_query($conexao, $result_aluno);
    if ($resultado_aluno->num_rows) {
        $row_aluno = mysqli_fetch_assoc($resultado_aluno);
        $valores['nome_cli'] = $row_aluno['nome'];
        $valores['cidade'] = $row_aluno['cidade'];
        $valores['idcliente'] = $row_aluno['reg'];
    } else {
        $valores['nome_cli'] = 'Cliente não encontrado';
    }
    return json_encode($valores);
}

if (isset($_GET['nome'])) {
    echo retorna($_GET['nome'], $conexao);
}



?>