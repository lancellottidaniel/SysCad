<?php 
	session_start();
	include('menu.php');
	include('ServiceDB_corretor.php');
	include ('cadastro_corretor.php');
?>

<html>
<head>
	<title>Relatórios - SysCad</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php if(($_SESSION['user_lvl'])<2)
		{
			echo '<body alert("Usuário sem permissão"); onload=window.history.back();>';
		}
		else
		{
			echo '<body>';
		}
?>
	<form method="post" action="" id="form_relatorio">
	<div class="container">
	<p><h1 style="font-family: oswald;margin-bottom: 44px;color: white;padding: 0px;">RELATÓRIOS</label></h1></p>
	</div>
	<div id="master">
	<div class="container"> 
        <div class="form-group row">
           	<label for="carteira" class="col-sm-2 col-form-label" style="color:white;">Carteira:</label>
            <select class="form-control col-sm-2" name="analistas">
			<?php
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
			<label for="data_ini" class="col-sm-2 col-form-label" style="color:white;">Data início:</label>
			<input type="date" id="data_ini" name="data_ini" class="form-control col-sm-3" />
		</div>
		<div class="form-group row">
			<label for="data_fim" style="color:white;margin-left:360px" class="col-sm-2 col-form-label">Data fim:</label>
			<input type="date" id="data_fim" name="data_fim" class="form-control col-sm-3" />
		</div>
		<div class="form-group row">
				<label for="tipo_ctt" class="col-sm-2 col-form-label" style="color:white;">Tipo Contato:</label> <select class="form-control col-sm-2" name="tipo_ctt" id="tipo_ctt">
		<br><br><br>
				<option value="00" selected>Selecione</option>
				<?php
				$result = $ServiceDb_corretor->consulta_tipo_ctt();
				foreach($result as $result_ctt)
				{
					echo "<option value='".$result_ctt['cd_tipo_ctt']."'>".$result_ctt['tipo_ctt']."</option>";
				}
				?>
                </select>
				<label for="tipo_neg" class="col-sm-2 col-form-label" style="color:white;">Tipo Negociação:</label> <select class="form-control col-sm-3" name="tipo_neg" id="tipo_neg">
		<br><br><br>
				<option value="00" selected>Selecione</option>
				<?php
				$result = $ServiceDb_corretor->consulta_tipo_neg();
				foreach($result as $result_neg)
				{
					echo "<option value='".$result_neg['cd_tipo_neg']."'>".$result_neg['tipo_neg']."</option>";
				}
				?>
                </select>				
	</div>
	<div class="form-group row">
		<input type="submit" class="btn btn-info" id="btn_gera_relatorio" name="btn_gera_relatorio" value="Gerar Relatório"><span class="glyphicon glyphicon-floppy-disk"></span></button>
	</div>
	</div>
	</form>

</body>
</html>

<?php	
	if(!empty($_POST))
	{	
		$flag = true;
		$x = strtotime($_POST['data_ini']);
		$y = strtotime($_POST['data_fim']);

		if(($x && $y) == "")
		{
			$flag = false;
			?>
			<script>
				alert('Favor informar a data do relatório');
				location.Reload();
			</script>
			<?php
		}
		else
		{
			if(($_POST['data_ini'] == "" && $_POST['data_fim'] != "") || ($_POST['data_ini'] != "" && $_POST['data_fim'] == "") || ($x > $y) )
			{
				$flag = false;
				?>
				<script>
					alert('Data de início e/ou fim incorreta');
					<?php $_POST['data_fim'] = ""; $_POST['data_ini'] = "";?>
					location.Reload();
				</script>
				<?php
			}
		}
		$_SESSION['resultados'] = $ServiceDb_corretor->pesquisa_relatorio();
		?>
	
		<form id='form_teste' name='form_teste' method='post' action='relatorio_impressao.php'>
		</form>	
	<?php
		if(isset($_POST['btn_gera_relatorio']) && $flag == true)
		{
				echo '<script>';
				echo 	'document.getElementById("form_teste").submit();';
				echo '</script>';	
		}
	}