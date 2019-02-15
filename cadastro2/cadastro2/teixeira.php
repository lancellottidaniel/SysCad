<?php 
$json = file_get_contents('https://www.receitaws.com.br/v1/cnpj/20977024000102');

$data = json_decode($json,true);

$cnpj = $data['atividade_principal'];

echo "<pre>";

print_r($cnpj[0][code]);

exit;