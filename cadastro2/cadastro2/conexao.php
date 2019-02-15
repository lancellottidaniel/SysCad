<?php
# Define o limite de tempo da sessão em 60 minutos
session_cache_expire(60);

# Inicia a sessão
session_start();

# Variável que verifica se o usuário está logado
if ( ! isset( $_SESSION['logado'] ) ) {
    $_SESSION['logado'] = false;
}

// Erro do login
$_SESSION['login_erro'] = false;

#Bloco try para verificar conexão e retornar erro caso ocorra
try {
    $conexao = new PDO ("mysql:host=localhost;dbname=cadastro", "root", "n6260111");
	$conexao->exec("SET CHARACTER SET utf8");
}
catch (PDOException $erropdo)
{
    die("Não foi possível estabelecer a conexão com o BD. Erro: " . $erropdo->getCode() . $erropdo->getMessage());
}







