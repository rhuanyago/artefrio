<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
 <?php
	session_start();
	include("Connections/conexao.php");

	setlocale(LC_TIME, 'portuguese'); 
	date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'pagamentosdodia.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7">Pagamentos do Dia '.strftime("%d/%m/%Y", strtotime($date)).' </tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Favorecido</b></td>';
		$html .= '<td><b>Dados</b></td>';
		$html .= '<td><b>Valor</b></td>';
		$html .= '<td><b>Data de Vencimento</b></td>';
		$html .= '<td><b>Último Dia</b></td>';
		$html .= '<td><b>Observação</b></td>';
		$html .= '<td><b>Status</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$result_msg_contatos = "SELECT c.*, date_format(c.data_vencimento, '%d/%m/%Y') AS dt_vencimento, date_format(c.ultimo_dia, '%d/%m/%Y') AS dt_ultimodia, DATEDIFF (now(), data_vencimento ) AS quantidade_dias FROM tbpagamento_dia c WHERE c.status = 'A' order by c.data_vencimento asc";
		$resultado_msg_pag = mysqli_query($conexao , $result_msg_contatos);
		
		while($row_msg_pag = mysqli_fetch_assoc($resultado_msg_pag)){
			$html .= '<tr>';
			$html .= '<td>'.strtoupper($row_msg_pag["favorecido"]).'</td>';
			$html .= '<td>'.strtoupper($row_msg_pag["dados"]).'</td>';
			$html .= '<td>'.number_format($row_msg_pag["valor"],2, ",", ".").'</td>';
			$html .= '<td>'.$row_msg_pag["dt_vencimento"].'</td>';
			$html .= '<td>'.$row_msg_pag["dt_ultimodia"].'</td>';
			$html .= '<td>' . ( ($row_msg_pag["quantidade_dias"] < 0) ? 'Sem atraso' : ''.$row_msg_pag["quantidade_dias"]. ' dias atrasados'. '' ). '</td>';
			$html .= '<td>' . ( ($row_msg_pag["status"] == "A") ? 'Aguardando Pagamento' : '<td>Pago' ). '</td>';
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>