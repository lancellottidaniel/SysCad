<?php 
	include ('menu.php');
	include ('ServiceDB_corretor.php');
	include ('cadastro_corretor.php');
	$cadastro_corretor = new cadastro_corretor();
	$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>

</style>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/SysJS.js"></script>
    <meta charset="UTF-8">
    <title>Cadastro de clientes PF - SysCad</title>
</head>
<body>
<div class="container">
		<p><h1 style="font-family:oswald;margin-bottom:48px;">CADASTRO DE CLIENTES - PF</label></h1></p>
			
</div>
<form action="" method="post">
	<table>
	<div id="master">
	<div class="container"> 
        <div class="form-group row">
			<label for="nm_pf" class="col-sm-2 col-form-label">Nome*:</label> <input class="form-control col-sm-4" type="text"  name="nm_pf" maxlength="60" required>
			<label for="cpf" class="col-sm-2 col-form-label">CPF:</label> <input class="form-control col-sm-3" type="text" name="cpf" placeholder="Ex: 999.999.999-99" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
        </div>
		
		<div class="form-group row">
			<label for="end_pf" class="col-sm-2 col-form-label">Endereço:</label> <input class="form-control col-sm-4" type="text" name="end_pf">
			<label for="nr_pf" class="col-sm-1 col-form-label">Número:</label> <input class="form-control col-sm-1" type="text" name="nr_pf"  maxlength="5" >
			<label for="compl_pf" class="col-sm-1 col-form-label">Compl:</label><input class="form-control col-sm-2" type="text" name="compl_pf">
        </div>
		<div class="form-group row">
			<label for="bairro_pf" class="col-sm-2 col-form-label">Bairro:</label> <input class="form-control col-sm-3" type="text" name="bairro_pf" >
			<label for="cep_pf" class="col-sm-1 col-form-label">Cep:</label> <input class="form-control col-sm-2" type="text" name="cep_pf" placeholder="Ex: 99999-999" maxlength="10" OnKeyPress="formatar('##.###-###', this)">
			<label for="cid_pf" class="col-sm-1 col-form-label">Cidade:</label> <input class="form-control col-sm-2" type="text" name="cid_pf" >
		</div>	
		<div class="form-group row">
			<label for="UF_pf" class="col-sm-2 col-form-label">UF:</label>
			<select class="form-control col-sm-1" name="UF_pf">
			<option value="0"/>
		
                <?php
				$result = $ServiceDb_corretor->consulta_uf();
				foreach($result as $result_uf)
				{
					echo '<option value="'.$result_uf['cd_uf'].'">'.$result_uf['nm_uf'].'</option>';
				}
				?>
			</select>
		</div>
	<div class="form-group row">
			<label for="ddd1" class="col-sm-2 col-form-label">DDD*:</label>  <input type="text" class="form-control col-sm-1" style="width:50px" name="ddd1" maxlength="2" required>
			<label for="fone1" class="col-sm-1 col-form-label">Fone*:</label>  <input class="form-control col-sm-2" type="text" style="width:100px" name="fone1" maxlength="10" OnKeyPress="formatar('#####-####', this)" required>
	</div>
	<div class="form-group row">
        <label for="ddd2" class="col-sm-2 col-form-label">DDD:</label> <input class="form-control col-sm-1" type="text" name="ddd2" maxlength="2">
        <label for="fone2" class="col-sm-1 col-form-label">Fone:</label> <input type="text" class="form-control col-sm-2" name="fone2" maxlength="10" OnKeyPress="formatar('#####-####', this)">
	</div>
        <div class="form-group row">
			<label for="ddd3" class="col-sm-2 col-form-label">DDD:</label>  <input type="text" class="form-control col-sm-1" style="width:50px" name="ddd3" maxlength="2">
			<label for="fone3" class="col-sm-1 col-form-label">Fone:</label>  <input class="form-control col-sm-2" type="text" style="width:100px" name="fone3" maxlength="10" OnKeyPress="formatar('#####-####', this)">
			<label for="vidas" class="col-sm-1 col-form-label">Vidas:</label> <select class="form-control col-sm-4" name="vidas">
			<option value="00" selected>Selecione a quantidade de vidas</option>
			<option value="1">1 vida</option>
            <option value="2+">2+ vidas</option>
			</select>
	</div>
	<div class="form-group row">
        <label for="ctt1" class="col-sm-2 col-form-label">Contato 1*:</label><input type="text" class="form-control col-sm-4" name="ctt1" required>
	</div>
	<div class="form-group row">
        <label for="email1" class="col-sm-2 col-form-label">E-mail:</label><input class="form-control col-sm-4" type="e-mail"  name="email1">
        <label for="dt_nasc1" class="col-sm-3 col-form-label">Data de nascimento:</label><input class="form-control col-sm-2" type="date" OnKeyPress="formatar('##/##/####', this)" name="dt_nasc1" maxlength="10">
	</div>
    <div class="form-group row">
        <label for="ctt2" class="col-sm-2 col-form-label">Contato 2:</label><input type="text" class="form-control col-sm-4" name="ctt2">
	</div>
	<div class="form-group row">
        <label for="email2" class="col-sm-2 col-form-label">E-mail:</label><input class="form-control col-sm-4" type="e-mail" style="width:500px" name="email2">
        <label for="dt_nasc2" class="col-sm-3 col-form-label">Data de nascimento:</label><input class="form-control col-sm-2" type="date" style="width:140px" name="dt_nasc2" OnKeyPress="formatar('##/##/####', this)" maxlength="10">
	</div>
	<div class="form-group row">
	<label for="status" class="col-sm-2 col-form-label">Status:</label>
		<select class="form-control col-sm-2" style="width:200px" name="status">
           <option value="00" selected>Selecione</option>
			<?php
				$result = $ServiceDb_corretor->consulta_status_cliente();
				foreach($result as $result_status)
				{
					echo '<option value="'.$result_status['cd_status_cliente'].'">'.$result_status['status_cliente'].'</option>';
				}
			?>
        </select>
	</div>
	<div class="form-group row">
		<input type="submit" class="btn btn-info" value="Cadastrar"><span class="glyphicon glyphicon-floppy-disk"></span></button>
	</div>

        
    <div class="form-group row">
		* Itens obrigatórios.
	</div>
		
		
		
</div>
</div>
</table>
</form>
</body>
</html>

<?php




#função do arquivo
$cadastro_corretor = new cadastro_corretor();

if (!empty($_POST)) {

    $cadastro_corretor->setPf($nm_pf)
        ->setCpf($cpf)
        ->setEndPf($end_pf)
        ->setNrPf($nr_pf)
        ->setComplPf($compl_pf)
        ->setBairroPf($bairro_pf)
        ->setCepPf($cep_pf)
        ->setCidPf($cid_pf)
        ->setUFPf($UF_pf)
        ->setDdd1($ddd1)
        ->setDdd2($ddd2)
        ->setDdd3($ddd3)
        ->setFone1($fone1)
        ->setFone2($fone2)
        ->setFone3($fone3)
		->setVidas($vidas)
        ->setCtt1($ctt1)
        ->setCtt2($ctt2)
        ->setEmail1($email1)
        ->setEmail2($email2)
        ->setDtNasc1($dt_nasc1)
        ->setDtNasc2($dt_nasc2)
        ->setStatus($status)
        ->setUsr($usr)
    ;}

$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
$ServiceDb_corretor->inserir_pf();
print_r($ServiceDb_corretor);
 echo 'EM MANUTENÇÃO';
?>
