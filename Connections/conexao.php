<?php
//Conexão com o Banco de Dados

$serverip = "localhost";
$username = "root";
$password = "";
$db_name = "sistemarubber";

$conexao = mysqli_connect($serverip, $username, $password, $db_name) or die ('Não foi possível conectar!');
$conexao -> set_charset("utf8");

ini_set('default_charset','UTF-8');
?>