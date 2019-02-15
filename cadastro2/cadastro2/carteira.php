<?php
include ('ServiceDB_corretor.php');
include ('cadastro_corretor.php');
include ('conexao.php');
include ('menu.php');

$_POST['usr_carteira'] = $_GET['analista'];
$cadastro_corretor = new cadastro_corretor();
$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
$cadastro_corretor->setUsrCarteira($_POST['usr_carteira']);
$return = $ServiceDb_corretor->carteira();



?>

<!DOCTYPE html>
<html lang="en">
<HEAD>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
    <TITLE>Carteira de clientes</TITLE>
	<style>

	
	
	</style>
	</HEAD>
	<BODY>
	<div class="container">
	<p><h1 style="font-family: oswald;margin-bottom: 44px;color: white;padding: 0px;">CARTEIRA DE CLIENTES</label></h1></p>
	<form method="get">
		<table class="table table-bordered" >
		<thead class="thead-inverse">
			<th align="center" bgcolor="white">Código</th>
			<th align="center" bgcolor="white">Nome da empresa</th>
			<th align="center" bgcolor="white">Nome do corretor</th>
			<th align="center" bgcolor="white">Status</th>
			<th align="center" bgcolor="white">#</th>
		</tr>
		</thead>

    <?php
	
		foreach($return as $select_linha)
		{
			#print_r($return);
			echo '<tr>';
			echo '<td align="center" bgcolor="white"><a href="http://intranet.nunesegrossi.com.br/cadastro2/pagpesquisa.php?nconsulta=' . $select_linha['cd_emp'] . '">' . $select_linha['cd_emp'] . '</a></td>';
			echo '<td align="center" bgcolor="white">' . $select_linha['emp'] . '</td>';
			echo '<td align="center" bgcolor="white">' . $select_linha['usuario_nome'] . '</td>';
			echo '<td align="center" bgcolor="white">' . $select_linha['status_cliente'] . '</td>';
			echo '<td align="center" bgcolor="white"><a href="http://intranet.nunesegrossi.com.br/cadastro2/agenda.php?nconsulta=' . $select_linha['cd_emp'] . '">Agenda</a></td>';
			echo '</tr>';

		}
		
?>
	
</table>
</form>

</div>
</BODY>
</html>