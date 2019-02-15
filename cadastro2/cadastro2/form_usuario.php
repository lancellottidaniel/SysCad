<html>
<head>
    <meta charset="UTF-8">

    <title>Criação de usuários</title>
</head>
<body>
<p>Para editar, apenas digite o nome de usuário que deseja editar.</p>
<p><a href="login.php">Clique aqui</a> para testar.</p>
<form action="" method="post">
    <table>
        <tr>
            <td>Usuário</td>
        </tr>
        <tr>
            <td><input type="text" name="form_usuario" required></td>
        </tr>
        <tr>
            <td>Senha</td>
        </tr>
        <tr>
            <td><input type="password" name="form_senha" required></td>
        </tr>
        <tr>
            <td>Nome:</td>
        </tr>
        <tr>
            <td><input type="text" name="form_nome" required></td>
        </tr>
        <tr>
            <td>Nível de usuário:</td>
        </tr>
        <tr>
        <td>
                <select name = "form_level" style="width: 174px">
                <option value="00" selected>Selecione</option>
                <option value="4">Superintendencia</option>
                <option value="3">Gerência</option>
                <option value="2">Supervisão</option>
                <option value="1">Operacional</option>
        </td>
        </tr>
		<tr>
            <td>Superior:</td>
        </tr>
        <tr>
        <td>
                <select name = "form_hierarquia" style="width: 174px">
                <option value="00" selected>Selecione</option>
                <option value="4">Diretoria</option>
                <option value="3">Wallace Nascimento</option>
                <option value="16">Maurício Montanari</option>
                <option value="17">Niufar Reis</option>
        </td>
        </tr>
        <tr>
            <td><input type="submit" value="Entrar"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
include ('ServiceDb.php');
include ('criausuario.php');
include ('conexao.php');

#função do arquivo
$cadastroinicial = new cadastroinicial();


if (!empty($_POST)) {

    $cadastroinicial->setLogin($login)
        ->setSenha($senha)
		->setUsuarioNome($usuario_nome)
        ->setUsuarioLevel($usuario_level)
		->setUsuarioHierarquia($usuario_hierarquia)
    ;}

$serviceDb = new ServiceDb($conexao, $cadastroinicial);
$serviceDb->inserir();

?>