<?php
	include_once "../Classes/Usuarios.php";
	
	$informacoes = json_decode(file_get_contents('php://input'), true); //capturando informações vindo por post do Ajax

	if ($informacoes[0] == 'infoUsuario') {
		$resultadoRetorno = new ApresentarUsuario();

		$infoUsuario = $resultadoRetorno->MostrarInfoUsuario($informacoes[1]);
		$infoUsuario = $infoUsuario->fetch_array(MYSQLI_ASSOC);
		
		echo json_encode($infoUsuario);
	}

	if ($informacoes[0] == 'SalvarNovoUsuario') {
		$novoUsuario = new novoUsuario($informacoes[1]['value'], $informacoes[2]['value'], $informacoes[3]['value'], $informacoes[4]['value'], $informacoes[5]['value'], $informacoes[6]['value'], $informacoes[7]['value'], $informacoes[8]['value'], $informacoes[9]['value'], $informacoes[10]['value'], $informacoes[11]['value']);

		$novoUsuario->cadastrar_novoUsuario();
		echo json_encode("Usuario cadastrado com sucesso ");
	}

	if ($informacoes[0] == "ExcluirUsuario") {
		$excluir = new ToolsUsuarios;

		$excluir->ExcluirUsuario($informacoes[1]);

		echo json_encode("Usuario Excluido com Sucesso");
	}