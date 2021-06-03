<?php
include("Connections/conexao.php");

if (isset($_POST["id"])) {
	$buscacot = $_POST["id"];
	$query = "SELECT * FROM tbcotacao c, tbcotacao_precos a WHERE c.idcotacao = a.idcotacao LIKE '%".$buscacot."%' order by c.idcotacao;";
}
    elseif (isset($_POST["favorecido"])) {
        $buscafav = $_POST["favorecido"];
        $query = "SELECT * FROM tbcotacao c, tbcotacao_precos a where c.favorecido like '".$buscafav."%' and c.idcotacao = a.idcotacao order by c.idcotacao;";
}
    else {
	    $query = "SELECT * FROM tbcotacao c, tbcotacao_precos a where c.idcotacao = a.idcotacao order by c.idcotacao; ";
}


$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);

if ($row > 0) {
	$data = '<br><div class="table-responsive">
                <table class="table table-responsive-md table-hover mb-0">
                    <tr>
                        <th>Orçamento</th>
                        <th>Favorecido</th>
                        <th>Item</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                        <th>Ações</th>
                    </tr>
	';
	foreach($rscli as $row) {
		$data .= '
            <tr>
                <td>'.$row["idcotacao"].'</td>
                <td>'.$row["favorecido"].'</td>
                <td>'.$row["item"].'</td>
                <td>'.$row["descricao"].'</td>
                <td>'.$row["tipo"].'</td>
                <td>'.$row["quantidade"].'</td>
                <td>'.number_format($row["valor_unitario"],2, ",", ".").'</td>
                <td>'.number_format($row["valor_total"],2, ",", ".").'</td>
                <td class="actions-hover actions-fade">
                    <a href="consulta_cotacao_alterar.php?idcotacao='.$row["idcotacao"]. '&id='.$row["id"].'" class="btn btn-dark text-white" data-toggle="modal" data-target="#largeModal"><i class="fas fa-pencil-alt"></i></a>
                    <a href="consulta_cotacao_excluir.php?idcotacao='.$row["idcotacao"].'&id='.$row["id"].'" class="btn btn-danger text-white"><i class="far fa-trash-alt"></i></a>
                </td>
			</tr>
		';
	}
	$data .= '</table></div>';
}
else {
	$data = "Nenhum registro localizado.";
}
echo $data;