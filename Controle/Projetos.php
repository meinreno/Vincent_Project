<?php
	include_once "../Classes/Projetos.php";
	
	$informacoes = json_decode(file_get_contents('php://input'), true); //capturando informações vindo por post do Ajax

	if ($informacoes[0] == 'infoProjeto') {
		$resultadoRetorno = new ApresentarProjeto();

		$infoProjeto = $resultadoRetorno->MostrarInfoProjeto($informacoes[1]);
		$infoProjeto = $infoProjeto->fetch_array(MYSQLI_ASSOC);
		
		echo json_encode($infoProjeto);
	}

	if ($informacoes[0] == 'salvarNovoProjeto') {
		$novoProjeto = new NovoProjeto($informacoes[1]['value'], $informacoes[2]['value'], $informacoes[3]['value'], $informacoes[4]['value'], $informacoes[5]['value'], $informacoes[6]['value'], $informacoes[7]['value'], $informacoes[8]['value'], $informacoes[9]['value'], $informacoes[10]['value'], $informacoes[11]['value'], $informacoes[12]['value'], $informacoes[13]['value'], $informacoes[14]['value'], $informacoes[15]['value'], $informacoes[16]['value'], $informacoes[17]['value'], $informacoes[18]['value'], $informacoes[19]['value'], $informacoes[20]['value']);
	
		$msgRetorno = $novoProjeto->cadastrar_novoProjeto();
		echo json_encode("Projeto cadastrado com sucesso ");
	}
	
	