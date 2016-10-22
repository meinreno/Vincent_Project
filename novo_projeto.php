<!DOCTYPE html>
<html>
<head>
	<title>Novo Projeto</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<a href="home.php">Projetos</a>
	<h3>Preencha as informações para novo Projeto</h3>

	<form name="novo_projeto" method="POST" action="#">
		Nome Projeto: <input type="text" name="nome_projeto"><br>
		Razão Social: <input type="text" name="razao_social"><br>
		Nome Fantasia: <input type="text" name="nome_fantasia"><br>
		CNPJ (Exemplo: 99.999.999/9999-99): <input type="text" name="cnpj"><br>
		IE (Exemplo: 999.999.999.999): <input type="text" name="ie"><br>
		Logradouro: <input type="text" name="logradouro"><br>
		Bairro: <input type="text" name="bairro"><br>
		Numero: <input type="text" name="numero"><br>
		CEP (Exemplo: 08970-000): <input type="text" name="cep"><br>
		Municipio: <input type="text" name="municipio"><br>
		Estado (Exemplo: SP): <input type="text" name="estado"><br>
		Telefone: <input type="text" name="telefone"><br>
		E-mail: <input type="text" name="email"><br>
		Cliente Responsavel: <input type="text" name="cliente_responsavel"><br>
		Telefone Responsavel: <input type="text" name="telefone_responsavel"><br>
		Dia Inicio (Exemplo: 16/12/1991): <input type="text" name="dia_inicio"><br>
		Dia Fim (Exemplo: 16/12/1991): <input type="text" name="dia_fim"><br>
		Dia Cobrança: <input type="text" name="dia_cobranca"><br>
		Forma Pagamento: <input type="text" name="forma_pagamento"><br>
		Valor Contrato: <input type="text" name="valor_contrato"><br>
		<input type="submit" name="Enviar">
	</form>
</body>
</html>

<?php
	if (isset($_POST['nome_projeto'])) {

		include 'Classes/Projetos.php';

		$novoProjeto = new NovoProjeto($_POST['nome_projeto'], $_POST['razao_social'], $_POST['nome_fantasia'], $_POST['cnpj'], $_POST['ie'], $_POST['logradouro'], $_POST['bairro'], $_POST['numero'], $_POST['cep'], $_POST['municipio'], $_POST['estado'], $_POST['telefone'], $_POST['email'], $_POST['cliente_responsavel'], $_POST['telefone_responsavel'], $_POST['dia_inicio'], $_POST['dia_fim'], $_POST['dia_cobranca'], $_POST['forma_pagamento'], $_POST['valor_contrato']);
	
		$novoProjeto->cadastrar_novoProjeto();
	}