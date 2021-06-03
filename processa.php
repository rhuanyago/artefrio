<?php
	session_start();
	include_once("Connections/conexao.php");
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);

	$idcotacao = $_POST['orcamento'];

	$_SESSION['idcotacao'] = $idcotacao;

	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$item = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "Item: $item <br>";
				
				$descricao = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Descrição: $descricao <br>";
				
				$tipo = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "Unid: $tipo <br>";

				$qtde = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "Quantidade: $qtde <br>";
				
				$valor_unitario = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "Valor Unitário: $valor_unitario <br>";

				$valor_total = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "Valor Total: $valor_total <br>";

				echo "<hr>";
				
				//Inserir o usuário no BD
				echo $result_usuario = "INSERT INTO tbcotacao_precos (idcotacao, item, descricao, tipo, quantidade, valor_unitario, valor_total) VALUES ('$idcotacao','$item', '$descricao', '$tipo', '$qtde', '$valor_unitario', '$valor_total')";
				$resultado_usuario = mysqli_query($conexao, $result_usuario) or die ('Erro no Insert!');

				$dados = mysqli_affected_rows($conexao);

				if(isset($dados)){
					$_SESSION['excluir_item_cotacao_ok'] = "Os Itens do Excel foram inseridos com Sucesso.";
					//header('Location: cotacao_preco_item.php?idcotacao='.$idcotacao.'');
				}else{
					$_SESSION['excluir_item_cotacao_error'] = "Houve um problema, verifique o Excel e tente novamente.";
					header('Location: cotacao_preco_item.php?idcotacao='.$idcotacao.'');
				}

				
			}
			$primeira_linha = false;
		}
	}else{
		$_SESSION['excluir_item_cotacao_error'] = "Insira um arquivo XML primeiro!";
		header('Location: cotacao_preco_item.php?idcotacao='.$idcotacao.'');
	}

?>