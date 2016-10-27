$(document).on('click', '#Projetos', Projetos); //.load projeto no corpo do home
$(document).on('click', '#Usuario', Usuario); //.load usuarios no corpo do Home
$(document).on('click', '#NovoUsuario', NovoUsuario); //.load novoUsuario no corpo do Home
$(document).on('click', '#infoProjeto', infoProjeto); //mostrar todos as informações do projeto no Modal
$(document).on('click', '#NovoProjeto', NovoProjeto); //abrir cadastro de novo projeto
$(document).on('click', '#SalvarNovoProjeto', SalvarNovoProjeto); //.btn salvar projeto novo



function Projetos(){
	$("#CorpoHome").load("./Exibir/Projetos.php")
};

function Usuario(){
	$("#CorpoHome").load("./Exibir/Usuarios.php")
	$("#projeto_btn1").html('<a id="NovoUsuario">Novo Usuario</a>'); //botão no header
    $("#projeto_btn2").html(''); //botão no header
};

function NovoUsuario(){
	$("#CorpoHome").load("./Exibir/NovoUsuario.php")
};

function zerarInfoProjeto(){
	$("#infoId").html('');
	$("#infoNomeProjeto").html('');
	$("#infoCnpj").html('');
	$("#infoIe").html('');
	$("#infoRazaoSocial").html('');
	$("#infoNomeFantasia").html('');
	$("#infoLogradouro").html('');
	$("#infoBairro").html('');
	$("#infoNumero").html('');
	$("#infoCep").html('');
	$("#infoMunicipio").html('');
	$("#infoEstado").html('');
	$("#infoTelefone").html('');
	$("#infoEmail").html('');
	$("#infoCliResponsavel").html('');
	$("#infoTelResponsavel").html('');
	$("#infoDiaInicio").html('');
	$("#infoDiaFim").html('');
	$("#infoDiaCobranca").html('');
	$("#infoFormaPagamento").html('');
	$("#infoValorContrato").html('');
}

function infoProjeto(){
	zerarInfoProjeto();
	var idProjeto = Array("infoProjeto", $(this).closest('tr').find('#identificacao').html());

	$.ajax({
		url: "../Controle/Projetos.php",
		data: JSON.stringify(idProjeto),
		type: "POST",
		dataType: "json",
		success: function(resultado){
			$("#infoId").html(resultado['id']);
			$("#infoNomeProjeto").html(resultado['nome_projeto']);
			$("#infoCnpj").html(resultado['cnpj']);
			$("#infoIe").html(resultado['ie']);
			$("#infoRazaoSocial").html(resultado['razao_social']);
			$("#infoNomeFantasia").html(resultado['nome_fantasia']);
			$("#infoLogradouro").html(resultado['logradouro']);
			$("#infoBairro").html(resultado['bairro']);
			$("#infoNumero").html(resultado['numero']);
			$("#infoCep").html(resultado['cep']);
			$("#infoMunicipio").html(resultado['municipio']);
			$("#infoEstado").html(resultado['estado']);
			$("#infoTelefone").html(resultado['telefone']);
			$("#infoEmail").html(resultado['email']);
			$("#infoCliResponsavel").html(resultado['cliente_responsavel']);
			$("#infoTelResponsavel").html(resultado['tel_responsavel']);
			$("#infoDiaInicio").html(resultado['dia_inicio']);
			$("#infoDiaFim").html(resultado['dia_fim']);
			$("#infoDiaCobranca").html(resultado['dia_cobranca']);
			$("#infoFormaPagamento").html(resultado['forma_pagamento']);
			$("#infoValorContrato").html(resultado['valor_contrato']);
			modal('modalInfoProjeto', 'abrir');

		} 
			
		});

	
}

function NovoProjeto(){
	modal('modalNovoProjeto', 'abrir');
}

function SalvarNovoProjeto(){ //.btn salvar projeto novo
	var informacoes = $('#novoProjeto').serializeArray(); //informações do novo projeto
	informacoes.unshift('salvarNovoProjeto');

	$.ajax({
		url: '../Controle/Projetos.php',
		dataType: 'json',
		type: 'POST',
		data: JSON.stringify(informacoes),
		success: function(retorno){
			alert(retorno);
			
		}//success
	})
	

	
}; 










//Modal/////////////////////

var meuModal;

$(document).on('click', '#modalClose', modalClose);
function modalClose(){
	meuModal.style.display = 'none';
}


window.onclick = function(event){
			if (event.target == meuModal){
				meuModal.style.display = 'none';
			}
		}

function modal(nomeModal, comando){
	meuModal = document.getElementById(nomeModal);

	if (comando === 'abrir'){
		meuModal.style.display = "block";
	}else if(comando === 'fechar'){
		meuModal.style.display = "none";
	} 
}