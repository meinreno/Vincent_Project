$(document).on('click', '#Projetos', Projetos); //.load projeto no corpo do home
$(document).on('click', '#infoProjeto', infoProjeto); //mostrar todos as informações do projeto no Modal
$(document).on('click', '#NovoProjeto', NovoProjeto); //abrir cadastro de novo projeto
$(document).on('click', '#SalvarNovoProjeto', SalvarNovoProjeto); //.btn salvar projeto novo
$(document).on('click', '#Usuario', Usuario); //.load usuarios no corpo do Home
$(document).on('click', '#NovoUsuario', NovoUsuario); //.load novoUsuario no corpo do Home
$(document).on('click', '#InfoUsuario', InfoUsuario); //mostrar todos as informações do projeto no Modal
$(document).on('click', '#SalvarNovoUsuario', SalvarNovoUsuario); //.btn salvar Usuario novo
$(document).on('click', '#ExcluirUsuario', ExcluirUsuario); //Excluir Usuario
$(document).on('click', '#ResetSenhaUsuario', ResetSenhaUsuario); //Excluir Usuario





function Projetos(){
	$("#CorpoHome").load("./Exibir/Projetos.php");
	$("#projeto_btn1").html('<a id="Usuario">Usuarios</a>'); //botão no header
    $("#projeto_btn2").html(''); //botão no header
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
			Projetos();

			
		}//success
	})
}; 

function zerarInfoUsuario(){
	$("#infoId").html('');
	$("#infoNome").html('');
	$("#infoSobrenome").html('');
	$("#infoEmail").html('');
	$("#infoTelefone").html('');
	$("#infoLogradouro").html('');
	$("#infoBairro").html('');
	$("#infoNumero").html('');
	$("#infoCep").html('');
	$("#infoMunicipio").html('');
	$("#infoEstado").html('');

};

function Usuario(){
	$("#CorpoHome").load("./Exibir/Usuarios.php")
	$("#projeto_btn1").html('<a id="Projetos">Voltar a Projetos</a>'); //botão no header
    $("#projeto_btn2").html(''); //botão no header
};

function NovoUsuario(){
	modal('modalNovoUsuario', 'abrir');
};

function InfoUsuario(){
	zerarInfoUsuario();
	var idUsuario = Array("infoUsuario", $(this).closest('tr').find('#identificacao').html());

	$.ajax({
		url: '../Controle/Usuarios.php',
		dataType: 'json',
		type: 'POST',
		data: JSON.stringify(idUsuario),
		success: function(resultado){
			$("#infoId").html(resultado['id']);
			$("#infoNome").html(resultado['nome']);
			$("#infoSobrenome").html(resultado['sobrenome']);
			$("#infoEmail").html(resultado['email']);
			$("#infoTelefone").html(resultado['telefone']);
			$("#infoLogradouro").html(resultado['logradouro']);
			$("#infoBairro").html(resultado['bairro']);
			$("#infoNumero").html(resultado['numero']);
			$("#infoCep").html(resultado['cep']);
			$("#infoMunicipio").html(resultado['municipio']);
			$("#infoEstado").html(resultado['estado']);
			modal('modalInfoUsuario', 'abrir');
		}
	})
}

function SalvarNovoUsuario(){
	var informacoes = $('#FormNovoUsuario').serializeArray(); //informações do novo projeto
	informacoes.unshift('SalvarNovoUsuario');

	$.ajax({
		url: '../Controle/Usuarios.php',
		dataType: 'json',
		type: 'POST',
		data: JSON.stringify(informacoes),
		success: function(retorno){
			alert(retorno);
			modalClose();
			Usuario();
		}//success
	})
}

function ExcluirUsuario(){
	var informacoes = Array('ExcluirUsuario', $(this).closest('tr').find('#identificacao').html());
	var conf = confirm("Você realmente deseja Excluir o Usuario "+$(this).closest('tr').find('#exibirUsuario').html()+"?");
    if (conf == true) {
    	$.ajax({
    		url: '../Controle/Usuarios.php',
    		dataType: 'json',
    		type: 'POST',
    		data: JSON.stringify(informacoes),
    		success: function(resultado){
    			alert (resultado);
    			Usuario();

    		}//.Function
    	})
    }
}

function ResetSenhaUsuario(){
	var informacoes = Array("resetSenha", $(this).closest('tr').find('#identificacao').html()); 
	var confirmacao = confirm("Você deseja realmente resetar a Senha do Usuario "+$(this).closest('tr').find('#exibirUsuario').html()+"?");
	
	if (confirmacao == true){
		alert (informacoes[1]);
	}

}









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