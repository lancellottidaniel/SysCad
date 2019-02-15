<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 

<?php
include("conexao.php");
	if(empty($_SESSION['logado'])){
		
		?>
		<script>
		window.location="http://intranet.nunesegrossi.com.br/cadastro2/login.html";
		</script>
<?php		
	}
print_r ($_SESSION['usuario_hierarquia']);
?>
<link rel="stylesheet" href="css/menu.css">
</head>
<!--<div id="logoP"><img src="http://intranet.nunesegrossi.com.br/cadastro2/imagens/2---Logo_N&amp;G_Benef_horizontal_Branco.png" alt="Nunes &amp; Grossi" style="position:static; height:250px; width:350px"> </div>--> 
<body class="">

<ul id="menu-bar">
 <li id="menu-item-1"><a href='menu.php'>Logo</a></li>
 <li><a href="#">Analista</a>
  <ul>
   <li><a href="#">Cadastrar</a>
   <ul style="margin-top:-62px; margin-left:158px">
   <li><a href="pagcadastro_pf.php">Pessoa Física</a></li>
   <li><a href="pagcadastro.php">Pessoa Jurídica</a></li>
   </ul></li>
   <li><a href="#">Clientes - PJ</a>
   <ul style="margin-top:-62px; margin-left:158px">
   <li><a href="tb_clientes.php">Clientes Nunes</a></li>
   <li><a href="tb_clientes_novo_cliente.php">Novos Clientes</a></li>
   <li><a href="tb_clientes_susepado.php">Susepado</a></li>
   </ul></li>
   <li><a href="#">Clientes - PF</a>
   <ul style="margin-top:-62px; margin-left:158px">
   <li><a href="tb_clientes_pf.php">Clientes Nunes</a></li>
   <li><a href="tb_clientes_novo_cliente_pf.php">Novos Clientes</a></li>
   <li><a href="tb_clientes_susepado_pf.php">Susepado</a></li>
   </ul></li>
  </ul>
 </li>
 <li><a href="#">Gerência</a>
  <ul>
   <li><a href="pesquisa_cliente.php">Pesquisar</a></li>
  </ul>
 </li>
 <li><a href="relatorios.php">Relatórios</a></li>
  <li><a href="sair.php" align="right">Logout</a></li>
</ul>
</body>
</html>
