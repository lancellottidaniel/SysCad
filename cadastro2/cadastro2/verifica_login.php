<?php
// Verifica se estamos conectados ao BD
if ( ! isset( $conexao ) || ! is_object( $conexao ) ) {
    exit('Erro na conexão com o banco de dados.');
}

// Une $_SESSION e $POST para verificação
if ( isset( $_POST ) && ! empty( $_POST ) ) {
    $dados_usuario = $_POST;
} else {
    $dados_usuario = $_SESSION;
}

// Verifica se os campos de usuário e senha existem
// E se não estão em branco
if (
    isset ( $dados_usuario['login'] ) &&
    isset ( $dados_usuario['senha_usuario'] )   &&
    ! empty ( $dados_usuario['login'] ) &&
    ! empty ( $dados_usuario['senha_usuario'] )
) {
    // Faz a consulta do nome de usuário na base de dados
    $pdo_checa_user = $conexao->prepare('SELECT * FROM usuarios WHERE login = ? LIMIT 1');
    $verifica_pdo = $pdo_checa_user->execute( array( $dados_usuario['login'] ) );

    // Verifica se a consulta foi realizada com sucesso
    if ( ! $verifica_pdo ) {
        $erro = $pdo_checa_user->errorInfo();
        exit( $erro[2] );
    }

    // Busca os dados da linha encontrada
    $fetch_usuario = $pdo_checa_user->fetch();

    // Verifica se a senha do usuário está correta
    if ( crypt( $dados_usuario['senha_usuario'], $fetch_usuario['senha'] ) === $fetch_usuario['senha'] ) {
        // O usuário está logado
        $_SESSION['logado']       = true;
        $_SESSION['nome_usuario'] = $fetch_usuario['usuario_nome'];
        $_SESSION['usuario']      = $fetch_usuario['login'];
        $_SESSION['user_id']      = $fetch_usuario['ID'];
		$_SESSION['user_lvl']	  = $fetch_usuario['usuario_level'];
		$_SESSION['user_hierarquia']	  = $fetch_usuario['usuario_hierarquia'];		
    } else {
        // Continua deslogado
        $_SESSION['logado']     = false;

        // Preenche o erro para o usuário
        $_SESSION['login_erro'] = 'Usuário ou senha inválidos';
    }
}
?>