<!DOCTYPE html>
<html>
<head>
	<title>Pedidos Online</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--<script type="text/javascript" src="Scripts/jquery.js"></script>-->
</head>
<body>
	<form name="login_usuario" method="POST" action="#"><!--Form para login para usuarios já cadastro-->
		<h3>Faça o login</h3>
		E-mail: <input type="text" name="login_email"><br>
		Senha: <input type="password" name="login_senha"><br>
		<input type="submit" name="Enviar">
	</form>

	

<script type="text/javascript">

	
</script>


</body>
</html>


<?php 
	
	if(isset($_POST['login_email'])){
		include 'Classes/Usuarios.php';

		$loginUsuario = new LoginUsuario($_POST['login_email'], $_POST['login_senha']);

		$loginUsuario->login();

		
	}





