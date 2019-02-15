<?php
include ('ServiceDB_corretor.php');
include ('cadastro_corretor.php');
include ('conexao.php');
include ('menu.php');

#função do arquivo
$cadastro_corretor = new cadastro_corretor();


if(isset($_GET['nconsulta'])){
	$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
	$result = $ServiceDb_corretor->nconsulta();
}
else{
if (isset($_GET['emp']) || isset($_GET['cnpj'])) {
    $_POST['emp'] = $_GET['emp'];
	$_POST['cnpj'] = $_GET['cnpj'];
	$cadastro_corretor->setEmp($_POST['emp'])
	->setCnpj($_POST['cnpj']);
    }

$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
$result = $ServiceDb_corretor->consultar();
print_r($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/bootstrap.css">

    <meta charset="UTF-8">
    <title>Pesquisa de clientes</title>
</head>
<body>
<br><br><br>

<form action="" method="post">
 <p style="margin-top:50px"></p>
   <div id="master">
   <div class="container">
  
	<div class="form-group row">
			<label for="cd_emp" class="col-lg-2 col-form-label">Código:</label> <input type="text" class="form-control col-lg-1" name="cd_emp" value="<?php echo $result['cd_emp']; ?>" >
	</div>
		<div class="form-group row">
		<label for="emp" class="col-sm-2 col-form-label">Empresa*: </label> <input type="text" class="form-control col-lg-4" name="emp" value="<?php echo $result['emp'] ?>" >
		<label for="cnpj" class="col-sm-2 col-form-label">CNPJ: </label><input type="text" class="form-control col-lg-3" name="cnpj" value='<?php echo $result['cnpj']; ?>' >
	</div>
	<div class="form-group row">
		<label for="end_emp" class="col-sm-2 col-form-label">Endereço:</label> <input type="text" class="form-control col-lg-4" name="end_emp" value='<?php echo $result['end_emp']; ?>' >
		<label for="nr_emp" class="col-sm-1 col-form-label">Número:</label> <input type="text" class="form-control col-lg-1" name="nr_emp" value='<?php echo $result['nr_emp']; ?>' >
		<label for="compl_emp" class="col-sm-1 col-form-label">Compl.:</label><input type="text" class="form-control col-lg-2" name="compl_emp" value='<?php echo $result['compl_emp']; ?>' >
	</div>
	<div class="form-group row">
		<label for="bairro_emp" class="col-sm-2 col-form-label">Bairro:</label> <input type="text" class="form-control col-lg-3" name="bairro_emp" value='<?php echo $result['bairro_emp']; ?>' >
		<label for="cep_emp" class="col-sm-1 col-form-label">Cep: </label><input type="text" class="form-control col-lg-2" name="cep_emp" value='<?php echo $result['cep_emp']; ?>' >
		<label for="cid_emp" class="col-sm-1 col-form-label">Cidade*: </label><input type="text" class="form-control col-lg-2" name="cid_emp" value='<?php echo $result['cid_emp']; ?>' >
	</div>
	<div class="form-group row">
		<label for="UF" class="col-sm-2 col-form-label">UF: </label><input type="text" class="form-control col-lg-1" name="UF" value='<?php echo $result['UF']; ?>' >
	</div>	
	<div class="form-group row">
		<label for="ddd1" class="col-sm-2 col-form-label">DDD*: </label> <input type="text" class="form-control col-lg-1" name="ddd1" value='<?php echo $result['ddd1']; ?>' >
		<label for="fone1" class="col-sm-1 col-form-label">Fone*: </label> <input type="text" class="form-control col-lg-2" name="fone1" value='<?php echo $result['fone1']; ?>' >
	</div>
	<div class="form-group row">
		<label for="ddd2" class="col-sm-2 col-form-label">DDD: </label><input type="text" class="form-control col-lg-1" name="ddd2" value='<?php echo $result['ddd2']; ?>' >
		<label for="fone2" class="col-sm-1 col-form-label">Fone:</label> <input type="text" class="form-control col-lg-2" name="fone2" value='<?php echo $result['fone2']; ?>' >
		<label for="CNAE" class="col-sm-1 col-form-label">CNAE:</label> <input type="text" class="form-control col-lg-4" value='<?php echo $result['cnae']; ?>' name="CNAE" readonly>
	</div>
	<div class="form-group row">		
		<label for="ddd3" class="col-sm-2 col-form-label">DDD:</label> <input type="text" class="form-control col-lg-1"  name="ddd3" value='<?php echo $result['ddd3']; ?>' >
		<label for="fone3" class="col-sm-1 col-form-label">Fone:</label><input type="text" class="form-control col-lg-2" name="fone3" value='<?php echo $result['fone3']; ?>' >
		<label for="vidas" class="col-sm-1 col-form-label">Vidas:</label><input type="text" class="form-control col-lg-4" name="vidas" value='<?php echo $result['vidas']; ?>' readonly>
	</div>
	<div class="form-group row">
		<label for="ctt1" class="col-sm-2 col-form-label">Contato 1:</label><input type="text" class="form-control col-lg-4" name="ctt1" value='<?php echo $result['ctt1']; ?>' >
	</div>
	<div class="form-group row">
		<label for="email1" class="col-sm-2 col-form-label">E-mail:</label><input type="e-mail" class="form-control col-lg-4" name="email1" value='<?php echo $result['email1']; ?>' >
		<label for="dt_nasc1" class="col-sm-3 col-form-label">Data de nascimento:</label><input type="text" class="form-control col-lg-2" name="dt_nasc1" value='<?php echo $result['dt_nasc1']; ?>' >
	</div>
	<div class="form-group row">
		<label for="ctt2" class="col-sm-2 col-form-label">Contato 2:</label><input type="text" class="form-control col-lg-4" name="ctt2" value='<?php echo $result['ctt2']; ?>' >
	</div>
	<div class="form-group row">
		<label for="email2" class="col-sm-2 col-form-label">E-mail:</label><input type="e-mail" class="form-control col-lg-4" name="email2" value='<?php echo $result['email2']; ?>' >
		<label for="dt_nasc2" class="col-sm-3 col-form-label">Data de nascimento:</label><input type="text" class="form-control col-lg-2" name="dt_nasc2" value='<?php echo $result['dt_nasc2']; ?>' >
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status:</label><input type="text" class="form-control col-lg-2" name="status" value='<?php echo $result['status_cliente']; ?>' readonly >
	</div>
	<div class="form-group row">
		<input type="Submit" class="btn btn-info" value="Atualizar" name="btn_atualizar"><span class="glyphicon glyphicon-floppy-disk"></span>
	</div>
	<div class="form-group row">
		<a href="agenda.php?nconsulta=<?php print_r($ServiceDb_corretor->cadastro_corretor->cd_emp); ?> "><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span>Agenda</button></a>
	</div>
	</div>
	</div>
	</form>
    </body>
    </html>
	
	
<?php
if(isset($_POST['btn_atualizar']))
{	
	if (!empty($_POST)) {
    $cadastro_corretor->setEmp($emp)
        ->setCnpj($cnpj)
        ->setEndEmp($end_emp)
        ->setNrEmp($nr_emp)
        ->setComplEmp($compl_emp)
        ->setBairroEmp($bairro_emp)
        ->setCepEmp($cep_emp)
        ->setCidEmp($cid_emp)
        ->setDdd1($ddd1)
        ->setDdd2($ddd2)
        ->setDdd3($ddd3)
        ->setFone1($fone1)
        ->setFone2($fone2)
        ->setFone3($fone3)
        ->setCtt1($ctt1)
        ->setCtt2($ctt2)
        ->setEmail1($email1)
        ->setEmail2($email2)
        ->setDtNasc1($dt_nasc1)
        ->setDtNasc2($dt_nasc2)
    ;}

	$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
	$ServiceDb_corretor->atualizar_cliente();	
	#print_r($ServiceDb_corretor);
}

?>
