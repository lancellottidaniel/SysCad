<?php
include("menu.php");
include ('ServiceDB_corretor.php');
include ('cadastro_corretor.php');
$cadastro_corretor = new cadastro_corretor();
$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
$result = $ServiceDb_corretor->tb_clientes();
?>



<!DOCTYPE html>
<html lang="en">
<HEAD>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
    <TITLE>Tabela de Clientes - Sistema de Cadastro</TITLE>

</HEAD>
<BODY>
<div class="container">
<p><h1 style="font-family: oswald;margin-bottom: 44px;color: white;padding: 0px;">CLIENTES CADASTRADOS</label></h1></p>
<form method="get">
	
    <table class="table table-bordered" >
    <thead class="thead-inverse">
        <th align="center" bgcolor="white">Código</th>
        <th align="center" bgcolor="white">Nome da empresa</th>
        <th align="center" bgcolor="white">Nome do corretor</th>
		<th align="center" bgcolor="white">#</th>
	</tr>
	</thead>

    <?php



	
	foreach($result as $select_linha)
		{
			echo '<tr>';
			echo '<td align="center" bgcolor="white"><a href="http://intranet.nunesegrossi.com.br/cadastro2/pagpesquisa.php?nconsulta=' . $select_linha['cd_emp'] . '">' . $select_linha['cd_emp'] . '</a></td>';
			echo '<td align="center" bgcolor="white">' . $select_linha['emp'] . '</td>';
			echo '<td align="center" bgcolor="white">' . $_SESSION['nome_usuario'] . '</td>';
			echo '<td align="center" bgcolor="white"><a href="http://intranet.nunesegrossi.com.br/cadastro2/agenda.php?nconsulta=' . $select_linha['cd_emp'] . '">Agenda</a></td>';
			echo '</tr>';

		}
	?>
	
</table>
</form>

</div>
</BODY>
</html>
