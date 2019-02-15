<?php
// Inclui o arquivo de configuração
include('conexao.php');

// Inclui o arquivo de verificação de login
include('verifica_login.php');

#include('login/redirect.php');
if ( $_SESSION['logado'] === true ) {
    include('menu.php');
}
    elseif ( $_SESSION['logado'] != true ) {
        header('location: ' . dirname( $_SERVER['PHP_SELF'] ) . '/cadastro2/login.html');
    }
?>

<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
<title>Principal - SysCad</title>

</head>
</html>

