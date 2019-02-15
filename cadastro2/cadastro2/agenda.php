<?php
include ('ServiceDB_corretor.php');
include ('cadastro_corretor.php');
include ('menu.php');

#função do arquivo
$cadastro_corretor = new cadastro_corretor();


	if(isset($_GET['nconsulta'])){
			$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
			$result = $ServiceDb_corretor->nconsulta();
	if (isset($_POST['btn_agenda'])) {
		$cadastro_corretor->setMensagem($mensagem)
			->setVisitaData($visita_data)
			->setTipoCtt($tipo_ctt)
			->setTipoNeg($tipo_neg);
			$ServiceDb_agenda = new ServiceDB_corretor($conexao, $cadastro_corretor);
			$ServiceDb_agenda->inserir_agenda();	
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
		
	<link rel="stylesheet" href="css/bootstrap.css">

    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
<br><br><br>
<form action="" method="post">
	<p style="margin-top:50px"></p>
   <div id="master">
   <div class="container">
	<div class="form-group row">
		<label for="cd_emp" class="col-lg-2 col-form-label">Código:</label> <input type="text" class="form-control col-lg-1" name="cd_emp" value="<?php print_r($result['cd_emp']); ?>" readonly>
	</div>
	 <div class="form-group row">
			<label for="emp" class="col-lg-2 col-form-label">Empresa:</label> <input type="text" class="form-control col-lg-4" name="emp" value='<?php print_r($result['emp']); ?>' readonly>
			<label for="cnpj" class="col-sm-2 col-form-label">CNPJ: </label><input type="text" class="form-control col-lg-3" name="cnpj" value='<?php print_r($result['cnpj']); ?>' readonly>
		</div>	
	<div class="form-group row">
			<label for="visita_data" class="col-lg-2 col-form-label">Data contato:</label><input type="date" class="form-control col-lg-4" name="visita_data" maxlength="10">
	</div>
	<div class="form-group row">
				<label for="tipo_ctt" class="col-sm-2 col-form-label">Tipo Contato:</label> <select class="form-control col-lg-2" name="tipo_ctt">
		<br><br><br>
				<option value="00">Selecione</option>
                <?php
				$result = $ServiceDb_corretor->consulta_tipo_ctt();
				foreach($result as $result_ctt)
				{
					echo "<option value='".$result_ctt['cd_tipo_ctt']."'>".$result_ctt['tipo_ctt']."</option>";
				}
				?>
                </select>
				<label for="tipo_neg" class="col-sm-2 col-form-label" style="margin-left: 180;">Tipo Negociação:</label> <select class="form-control col-lg-3" name="tipo_neg">
		<br><br><br>
				<option value="00">Selecione</option>
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
			<label for="mensagem" class="col-lg-2 col-form-label">Mensagem:</label><textarea class="form-control col-lg-8" style="height:150px" name="mensagem" maxlength="1000"></textarea>
	</div>
	<div class="form-group row">
		<input type="submit" class="btn btn-info" name="btn_agenda"><span class="glyphicon glyphicon-floppy-disk"></span>
	</div>
	<div class="form-group row">
	<a href="hist_agenda.php?hist_nconsulta=<?php echo $_GET['nconsulta']; ?> "><button type="button" style="width:116px; height:37px" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span>Histórico</button></a>
	</div>
	</div>
	</div>	
</form>
</body>
</html>