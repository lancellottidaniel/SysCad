<?php include ("menu.php"); ?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">

    <title>Consultar Clientes - SysCad</title>
</head>

<?php

include ('conexao.php');

	if(($_SESSION['user_lvl'])<=2)
	{
		echo '<body alert("Usuário sem permissão"); onload=window.history.back();>';
	}
	else
	{
		echo '<body>';
	}
?>
<br><br>
<form action="" method="post" id="form_pesquisa">
	<div class="container">
			<p><h1><label for="h1" style="font-family:oswald;margin-bottom:-40px;">Pesquisa de Clientes</label></h1></p>
			<br><br><br>			
	<div id="master">
	<div class="container"> 
        <div class="form-group row">
            <label for="cnpj" class="col-lg-1 col-form-label">CNPJ:</label>
            <input type="text" class="form-control col-lg-2" name="cnpj" maxlength="18">
			<label for="cnpj" class="col-lg-1 col-form-label">Carteira:</label>
            <select class="form-control col-lg-2" name="analistas">
			<?php
				include ('ServiceDB_corretor.php');
				include ('cadastro_corretor.php');
				include ('conexao.php');

				$cadastro_corretor = new cadastro_corretor();
				$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
				$result = $ServiceDb_corretor->pesquisa_cliente();
				echo '<option value="00" selected>Selecione</option>';
				foreach($result as $select_linha)
				{
					echo '<option value="'.$select_linha["ID"].'">'.$select_linha["usuario_nome"].'</option>';
				}
			?>
			</select>
		</div>
		<div class="form-group row">
             <label for="emp" class="col-lg-1 col-form-label">Empresa:</label>
             <input type="text" class="form-control col-lg-2" name="emp"></td>
			</div>
            <div class="form-group row">
		<input type="submit" class="btn btn-info" value="Pesquisar" name="btn_pesquisar"/>
		<?php
		
		if(isset($_POST['btn_pesquisar']) && $_POST['analistas']!="00")
		{		
			echo '<script>';
			echo 'window.location="http://intranet.nunesegrossi.com.br/cadastro2/carteira.php?analista='.$_POST['analistas'].'";';
			echo '</script>';				
		} 
		if(isset($_POST['btn_pesquisar']) && $_POST['analistas']=="00" && !empty($_POST['cnpj']))
		{
			echo '<script>';
			echo 'window.location="http://intranet.nunesegrossi.com.br/cadastro2/pagpesquisa.php?cnpj='.$_POST['cnpj'].'";';
			echo '</script>';
		} else if(isset($_POST['btn_pesquisar']) && $_POST['analistas']=="00" && !empty($_POST['emp']))
		{
			echo '<script>';
			echo 'window.location="http://intranet.nunesegrossi.com.br/cadastro2/pagpesquisa.php?emp='.$_POST['emp'].'";';
			echo '</script>';
		} 
		
		?>
	</div>
	</div>
	</div>
	</div>	
</form>
</body>
</html>


