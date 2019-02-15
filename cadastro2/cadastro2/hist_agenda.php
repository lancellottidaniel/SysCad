<!DOCTYPE html>
	<html>
	<head>	
	<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"> 
		<script type="text/javascript" src="js/SysJS.js"></script>
		<TITLE>Histórico agenda - Sistema de Cadastro</TITLE>
	</head>
	<BODY>
	<?php
		include("menu.php");
		include ('ServiceDB_corretor.php');
		include ('cadastro_corretor.php');
		$cadastro_corretor = new cadastro_corretor();
		$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
		$result = $ServiceDb_corretor->hist_agenda();
		?>
	<div class="container">
	<p><h1 style="font-family: oswald;margin-bottom: 44px;color: white;padding: 0px;">HISTÓRICO</label></h1></p>
	<form method="post">
	<div style="color:white">
		<input type="radio" name="radBusca" value="1">Empresa</input>
		<input type="radio" name="radBusca" value="3">Data</input>
		<input type="radio" name="radBusca" value="4">Mensagem</input>
	</div>
	<div id="divBusca" class="form-group row">
		<img src="imagens/search3.png" alt="Buscar..."/>
		<input type="text" id="txtBusca" name="txtBusca" onkeyup="buscaDinamica()"/>
		<div id="erroForm" style="color:red"></div>
	</div>
		<table class="table table-bordered" name="tabela_hist" id="tabela_hist">
			<thead class="thead-inverse">
			<tr>
				<th align="center" bgcolor="white">Código</th>
				<th align="center" bgcolor="white" style="width:300px">Nome da empresa</th>
				<th class="th" bgcolor="white" style="width:200px">CNPJ</th>
				<th align="center" bgcolor="white">Data da visita</th>
				<th align="center" bgcolor="white" style="width:300px">Mensagem</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($result as $select_linha)
			{
				echo '<tr>';
				echo '<td align="center" bgcolor="white">' . $select_linha['cd_emp'] . '</td>';
				echo '<td align="center" bgcolor="white">' . $select_linha['emp'] . '</td>';
				echo '<td align="center" bgcolor="white">' . $select_linha['cnpj'] . '</td>';
				echo '<td align="center" bgcolor="white">' . $select_linha['visita_data'] . '</td>';
				echo '<td align="center" bgcolor="white">' . $select_linha['mensagem'] . '</td>';
				echo '</tr>';

			}
			
		?>
</tbody>	
</table>
</form>
</div>
</BODY>
</html>