<?php
	include_once "../Classes/Projetos.php";
	
	$informacoes = json_decode(file_get_contents('php://input')); //capturando informações vindo por post do Ajax

	if ($informacoes[0] == 'infoProjeto') {
		$resultadoRetorno = new ApresentarProjeto();

		$infoProjeto = $resultadoRetorno->MostrarInfoProjeto($informacoes[1]);
		$infoProjeto = $infoProjeto->fetch_array(MYSQLI_ASSOC);
		
		echo json_encode($infoProjeto);
	}

	
	