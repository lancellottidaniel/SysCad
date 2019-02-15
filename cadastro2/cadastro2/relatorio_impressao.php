<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
		<body>
				<table class="table table-bordered" >
				<thead class="thead-inverse">
					<th align="center" bgcolor="white">Nome da empresa</th>
					<th align="center" bgcolor="white">CNPJ</th>
					<th align="center" bgcolor="white">Tipo de Cliente</th>
					<th align="center" bgcolor="white">Tipo de Contato</th>
					<th align="center" bgcolor="white">Tipo de Negociação</th>
					<th align="center" bgcolor="white">Mensagem</th>
					<th align="center" bgcolor="white">Data do Contato</th>
					<th align="center" bgcolor="white">Nome do Corretor</th>
				</tr>
				</thead>
				<?php
				session_start();
				include('ServiceDB_corretor.php');
				include ('cadastro_corretor.php');
				$result = $_SESSION['resultados'];
				foreach($result as $result_relatorio)
				{
					echo '<tr>';
					echo '<td align="middle" bgcolor="white">'.$result_relatorio['emp'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['cnpj'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['status_cliente'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['tipo_ctt'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['tipo_neg'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['mensagem'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['visita_data'].'</td>';
					echo '<td align="center" bgcolor="white">'.$result_relatorio['usuario_nome'].'</td>';
					echo '</tr>';
				}
				?>
				</table>
		</body>
</html>		