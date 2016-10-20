<!DOCTYPE html>
<html>
<head>
	<title>Pedidos Online</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="Scripts/jquery.js"></script>
</head>
<body>
	<form name="login_usuario" method="POST" action="#"><!--Form para login para usuarios já cadastro-->
		<h3>Faça o login</h3>
		E-mail: <input type="text" name="login_email"><br>
		Senha: <input type="password" name="login_senha"><br>
		<input type="submit" name="Enviar">
	</form>

	<form name="novo_usuario" method="POST" action="#"> <!-- Form de Cadastro de Novo usuario, Apos curto cadastro sem erros irá para a pagina já logada-->
		<h3>Novo Usuario? Preencha as informações para cadastro</h3>
		Nome: <input type="text" name="novo_nome"><br>
		Sobrenome: <input type="text" name="novo_sobrenome"><br>
		E-Mail: <input type="text" name="novo_email"><br>
		Senha: <input type="password" name="novo_senha"><br>
		<input type="submit" name="Enviar">
	</form>

<script type="text/javascript">

	
</script>


</body>
</html>


<?php 
	
	if(isset($_POST['novo_nome'])){
		include 'Classes/Usuarios.php';

		$novoUsuario = new novoUsuario($_POST['novo_nome'], $_POST['novo_sobrenome'], $_POST['novo_email'], $_POST['novo_senha']);

		$novoUsuario->cadastrar_novoUsuario();

		
	}

		if(isset($_POST['login_email'])){
		include 'Classes/Usuarios.php';

		$loginUsuario = new LoginUsuario($_POST['login_email'], $_POST['login_senha']);

		$loginUsuario->login();

		
	}





