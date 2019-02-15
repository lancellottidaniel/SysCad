<?php
include("menu.php");
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
	
	<input type="text" name="teste" id="teste" />
	<input type="button" onclick="pesquisar()" value="Buscar" />
	
	<?php
		$query = "SELECT cd_emp, emp, cnpj, end_emp, nr_emp, compl_emp, bairro_emp, cep_emp, cid_emp, UF, ddd1, ddd2, ddd3, fone1, fone2, fone3, ctt1, ctt2, email1, email2, dt_nasc1, dt_nasc2, status, usr
        FROM cd_clientes";
		$stmt = prepare($query);
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		print_r($result);
		echo "<table>"; 
		foreach($result as $x)
		{
			echo "<tr><td>".$x['cd_emp']."</td></tr>";
			echo "<tr><td>".$x['emp']."</td></tr>";
			echo "<tr><td>".$x['cnpj']."</td></tr>";
			echo "<tr><td>".$x['nr_emp']."</td></tr>";
		}
		echo "</table>";
	?>
	
    <table class="table table-bordered" >
    <thead class="thead-inverse">
        <th align="center" bgcolor="white">Código</th>
        <th align="center" bgcolor="white">Nome da empresa</th>
        <th align="center" bgcolor="white">Nome do corretor</th>
		<th align="center" bgcolor="white">#</th>
	</tr>
	</thead>
	
</table>


</div>
</BODY>
</html>
