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
	<script src="lib/jquery.min.js"></script>
    <script src="dist/js/jquery.receita-ws.js"></script>
	
	
	<script>	
	$(document).ready(function () {
        function fecharMensagem() {
            setTimeout(function () {
                $('#status').html('');
                $('#cnpj').prop('disabled', false);
            }, 2000);
        }

        $('#cnpj').receitaws({
            afterRequest: function () {
                var cnpj = $('#cnpj').val();
                $('#status').html('<div class="alert alert-info">Buscando CNPJ</div>');
                $('form').find("input[type=text]").val("");
                $('#cnpj').val(cnpj);
                $('#cnpj').prop('disabled', true);
            },
            success: function (data) {
                $('#status').html('<div class="alert alert-success">CNPJ Encontrado</div>');

                fecharMensagem();
            },
            fail: function (message) {
                $('#status').html('<div class="alert alert-danger">' + message + '</div>');

                fecharMensagem();
            },
            notfound: function (message) {
                $('#status').html('<div class="alert alert-warning">CNPJ inexistente</div>');

                fecharMensagem();
            },

            fields: {
				text: '#cnae',
                nome: '#emp',
                complemento: '#compl_emp',
                logradouro: '#end_emp',
                numero: '#nr_emp',
                bairro: '#bairro_emp',
                municipio: '#cid_emp',
                uf: '#uf',
				cep: '#cep_emp',
				

                telefone: function (data) {
                    var separa = data.split('/');
                    if (typeof separa[0] != 'undefined') {
                        $('#fone1').val(separa[0]);
                    }
                },
                qsa: function (data) {
                    var responsaveis = [];
                    $.each(data, function(i, val) {
                        if (typeof val != 'undefined') {
                            responsaveis[i] = val.nome
                        }
                    });
                    //$('#responsavel').val(responsaveis.join(','));
                }
            }
        });

    });
	
	
	</script>

    <meta charset="UTF-8">
    <title>Cadastro de clientes</title>
</head>
<body>
<div class="container">
		<p><h1 style="font-family:oswald;margin-bottom:-40px;">CADASTRO DE CLIENTES - PJ</label></h1></p>
		<br><br><br>	
</div>
<form id="form_cd_pj" action="" method="post">
	<table>
	<div id="master">
	<div class="container" id="form"> 
        <div class="form-group row">
			<label for="emp" class="col-sm-2 col-form-label" style="height: 40px">Empresa*:</label> <input class="form-control col-sm-4" type="text"  name="emp" id="emp" maxlength="60" required>
			<label for="cnpj" class="col-sm-2 col-form-label">CNPJ:</label> <input class="form-control col-sm-3" type="text" name="cnpj" id="cnpj" maxlength="18">
        </div>		
		<div class="form-group row">
			<label for="end_emp" class="col-sm-2 col-form-label">Endereço:</label> <input class="form-control col-sm-4" type="text" name="end_emp" id="end_emp">
			<label for="nr_emp" class="col-sm-1 col-form-label">Número:</label> <input class="form-control col-sm-1" type="text" name="nr_emp" id="nr_emp"  maxlength="5" >
			<label for="compl_emp" class="col-sm-1 col-form-label">Compl:</label><input class="form-control col-sm-2" type="text" name="compl_emp" id="compl_emp">
        </div>
		<div class="form-group row">
			<label for="bairro_emp" class="col-sm-2 col-form-label">Bairro:</label> <input class="form-control col-sm-3" type="text" name="bairro_emp" id="bairro_emp" >
			<label for="cep_emp" class="col-sm-1 col-form-label">Cep:</label> <input class="form-control col-sm-2" type="text" name="cep_emp" id="cep_emp" placeholder="Ex: 99999-999" maxlength="10">
			<label for="cid_emp" class="col-sm-1 col-form-label">Cidade:</label> <input class="form-control col-sm-2" type="text" name="cid_emp" id="cid_emp" ><br>
		</div>	
		<div class="form-group row">
			<label for="UF" class="col-sm-2 col-form-label">UF:</label>
			<select class="form-control col-sm-1" name="UF">
			<option value="0"/>
		<br><br><br>
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
        <label for="cnae" class="col-sm-1 col-form-label">CNAE:</label> <select class="form-control col-sm-4" name="cnae" id="cnae">
		<option value="0" selected>Selecione o CNAE</option>
			<?php
				$result = $ServiceDb_corretor->consulta_cnae();
				foreach($result as $result_cnae)
				{
					echo '<option value="'.$result_cnae['cd_cnae'].'">'.$result_cnae['ds_cnae'].' - '.$result_cnae['nm_cnae'].'</option>';
				}
			?>		
		</select>
	</div>
        <div class="form-group row">
			<label for="ddd3" class="col-sm-2 col-form-label">DDD:</label>  <input type="text" class="form-control col-sm-1" style="width:50px" name="ddd3" maxlength="2">
			<label for="fone3" class="col-sm-1 col-form-label">Fone:</label>  <input class="form-control col-sm-2" type="text" style="width:100px" name="fone3" maxlength="10" OnKeyPress="formatar('#####-####', this)">
			<label for="vidas" class="col-sm-1 col-form-label">Vidas:</label> <select class="form-control col-sm-4" name="vidas">
			<option value="0" selected>Selecione a quantidade de vidas</option>
			<?php
				$result = $ServiceDb_corretor->consulta_qt_vidas();
				foreach($result as $result_vidas)
				{
					echo '<option value="'.$result_vidas['cd_qt_vidas'].'">'.$result_vidas['qt_vidas'].'</option>';
				}
			?>
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
		<input type="submit" class="btn btn-info" value="Cadastrar" id="btn_cadastro"><span class="glyphicon glyphicon-floppy-disk"></span></button>
	</div>

        <br><br><br>
		<div class="form-group row">
        * Itens obrigatórios.
		</div>
		<br><br><br>
		
		
</div>
</div>
</table>
</form>
</body>
</html>

<?php

#função do arquivo
$cadastro_corretor = new cadastro_corretor();

	if (!empty($_POST)) 
	{
		$cadastro_corretor->setEmp($emp)
			->setCnpj($cnpj)
			->setEndEmp($end_emp)
			->setNrEmp($nr_emp)
			->setComplEmp($compl_emp)
			->setBairroEmp($bairro_emp)
			->setCepEmp($cep_emp)
			->setCidEmp($cid_emp)
			->setUF($UF)
			->setDdd1($ddd1)
			->setDdd2($ddd2)
			->setDdd3($ddd3)
			->setFone1($fone1)
			->setFone2($fone2)
			->setCnae($cnae)
			->setFone3($fone3)
			->setVidas($vidas)
			->setCtt1($ctt1)
			->setCtt2($ctt2)
			->setEmail1($email1)
			->setEmail2($email2)
			->setDtNasc1($dt_nasc1)
			->setDtNasc2($dt_nasc2)
			->setStatus($status)
			->setUsr($usr);
	}

$ServiceDb_corretor = new ServiceDB_corretor($conexao, $cadastro_corretor);
$ServiceDb_corretor->inserir();

?>
