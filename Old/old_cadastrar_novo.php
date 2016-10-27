<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Novo Usuario</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<a href="new_home.php">Projetos</a>
	<form name="novo_usuario" method="POST" action="#"> <!-- Form de Cadastro de Novo usuario, Apos curto cadastro sem erros irá para a pagina já logada-->
		<h3>Novo Usuario? Preencha as informações para cadastro</h3>
		Nome: <input type="text" name="novo_nome"><br>
		Sobrenome: <input type="text" name="novo_sobrenome"><br>
		E-Mail: <input type="text" name="novo_email"><br>
		Senha: <input type="password" name="novo_senha"><br>
		Telefone: <input type="text" name="novo_telefone"><br>
		Logradouro: <input type="text" name="novo_logradouro"><br>
		Bairro: <input type="text" name="novo_bairro"><br>
		Numero: <input type="text" name="novo_numero"><br>
		CEP: <input type="text" name="novo_cep"><br>
		Municipio: <input type="text" name="novo_municipio"><br>
		Estado(Exemplo: SP): <input type="text" name="novo_estado"><br>
		<input type="submit" name="Enviar">
	</form>
</body>
</html>
<?php

	if(isset($_POST['novo_nome'])){
		include '../Classes/Usuarios.php';

		$novoUsuario = new novoUsuario($_POST['novo_nome'], $_POST['novo_sobrenome'], $_POST['novo_email'], $_POST['novo_senha'], $_POST['novo_telefone'], $_POST['novo_logradouro'], $_POST['novo_bairro'], $_POST['novo_numero'], $_POST['novo_cep'], $_POST['novo_municipio'], $_POST['novo_estado']);

		$novoUsuario->cadastrar_novoUsuario();

		
	}