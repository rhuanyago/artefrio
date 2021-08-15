<?php
include("Connections/conexao.php");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE data_vencimento like '%".$busca."' order by c.favorecido, c.parcelas asc";
}elseif (isset($_POST["favorecido"])) {
	$favorecido = $_POST["favorecido"];
	$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE favorecido like '".$favorecido."%' order by c.favorecido, c.parcelas asc";
}
else {
	$query = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE c.status = 'A' order by c.favorecido, c.parcelas asc;";
}

$rscli = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($rscli);


if ($row > 0) {
	$data = '<br><div class="table-responsive">
                <table class="table table-responsive-md table-hover mb-0">
                    <tr>
                        <th class="text-left">Favorecido</th>
                        <th class="text-left">Dados</th>
                        <th class="text-center">Parcela(s)</th>
                        <th class="text-left">Valor</th>
                        <th class="text-center">Vencimento</th>
                        <th class="text-center">Último Dia</th>
                        <th class="text-center">Observação</th>
                        <th class="text-center">Status</th>
                        <th>Ações</th>
                    </tr>
	';
	foreach($rscli as $row) {
		$data .= '
			<tr>
                <td class="text-left"><b>'.mb_strtoupper($row["favorecido"]).'</b></td>
                <td class="text-left">'.($row["dados"]).'</td>
                ' . ( ($row["parcelas"] == 0) ? '<td class="text-center"><b>Única</b></td> ' : '<td class="text-center"><b>'.$row["parcelas"]. '</b></td>' ). '
                <td class="text-left text-danger"><b>'.number_format($row["valor"], 2, ",", "."). '</b></td>
                <td class="text-center"><b>' . $row["dt_vencimento"] . '</b></td>
                <td class="text-center">' . $row["dt_ultimodia"] . '</td>
                ' . ( ($row["quantidade_dias"] < 0) ? '<td class="text-center text-primary"><b>Sem atraso</b></td> ' : '<td class="text-center text-danger"><b>'.$row["quantidade_dias"]. ' dias atrasados'. '</b></td>' ). '
                ' . ( ($row["status"] == "A") ? '<td class="text-center"><b>Aguardando Pagamento</b></td>' : '<td class="text-center"><b>Pago</b></td>' ). ' 
                <td class="actions-hover actions-fade ">
                    <a class="btn btn-dark text-white" title="Editar" href="pagamento_dia_alterar.php?id='.$row["idpag"].'"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-success text-white" title="Dar Baixa" href="pagamento_dia_baixa.php?idpag='.$row["idpag"].'" class="delete-row"><i class="fas fa-check-circle"></i></a>
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