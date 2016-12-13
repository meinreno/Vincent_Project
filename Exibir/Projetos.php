<?php 
	include_once "../Classes/Projetos.php";
	$todosProjetos = new ApresentarProjeto();
	$Projetos = $todosProjetos->MostrarProjetos();
?>
<button type="button" id="NovoProjeto" class="btn btn-primary" >Novo Projeto</button>
<div class="panel panel-default">
	<div class="panel-heading">
    	<h3 class="panel-title text-center">Projetos</h3>
  	</div>
  	<div class="panel-body">
    	<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">Nome</th>
					<th>Razão Social</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">CNPJ</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">Responsavel</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">Telefone</th>
					<th></th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					//exibindo todos os usuarios em uma tabela
					while ($exibirProjetos = $Projetos->fetch_array(MYSQLI_ASSOC)) {
						printf("
							<tr>
								<td scope='row' id='identificacao'>".$exibirProjetos['id']."</td>
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirProjetos['nome_projeto']."</td>
								<td>".$exibirProjetos['razao_social']."</td>
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirProjetos['cnpj']."</td>
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirProjetos['cliente_responsavel']."</td>
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirProjetos['tel_responsavel']."</td>
								
								<td><button type='button' class='btn btn-primary' id='SelecionarProjeto'>Selecionar</button>
								<button type='button'role='button' class='btn btn-primary' id='infoProjeto' >Info</button>
								<button type='button' role='button' class='btn btn-primary ExcluirProjeto'>Excluir</button></td>
							</tr>");
					}
				 ?>
			</tbody>
		</table>
  	</div>
</div>

<div class="modal " id="modalEditarProjeto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Editar Projeto</h4>
      </div>
      <div class="modal-body">
        	<form id="EditarProjeto">
        		<label class='negrito' for="infoID">ID: </label><span id="edit_Id"></span><br>
        		<div class="input-group">
  					<span class="input-group-addon">Nome Projeto:</span>
  					<input type="text" class="form-control" placeholder="Nome Projeto" id="edit_nomeProjeto" name="nome_projeto" aria-describedby="edit_nomeProjeto">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Razão Social:</span>
  					<input type="text" class="form-control" placeholder="Razão Social" id="edit_razaoSocial" name="razao_social" aria-describedby="edit_razaoSocial">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Nome Fantasia:</span>
  					<input type="text" class="form-control" placeholder="Nome Fantasia" id="edit_nomeFantasia" name="nome_fantasia" aria-describedby="edit_nomeFantasia">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CNPJ:</span>
  					<input type="text" class="form-control" placeholder="Ex:99.999.999/9999-99)" id="edit_cnpj" name="cnpj" aria-describedby="edit_cnpj">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">IE:</span>
  					<input type="text" class="form-control" placeholder="Ex:999.999.999.999)" id="edit_ie" name="ie" aria-describedby="edit_ie">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Logradouro:</span>
  					<input type="text" class="form-control" placeholder="Logradouro" id="edit_logradouro" name="logradouro" aria-describedby="edit_logradouro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Bairro:</span>
  					<input type="text" class="form-control" placeholder="Bairro" id="edit_bairro" name="bairro" aria-describedby="edit_bairro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Numero:</span>
  					<input type="text" class="form-control" placeholder="Numero" id="edit_numero" name="numero" aria-describedby="edit_numero">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CEP:</span>
  					<input type="text" class="form-control" placeholder="Exemplo: 08970-000" id="edit_cep" name="cep" aria-describedby="edit_cep">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Municipio:</span>
  					<input type="text" class="form-control" placeholder="Municipio" id="edit_municipio" name="municipio" aria-describedby="edit_municipio">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Estado:</span>
  					<input type="text" class="form-control" placeholder="Ex: SP" id="edit_estado" name="estado" aria-describedby="edit_estado">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone:</span>
  					<input type="text" class="form-control" placeholder="Telefone" id="edit_telefone" name="telefone" aria-describedby="edit_telefone">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">E-mail:</span>
  					<input type="text" class="form-control" placeholder="E-mail" id="edit_email" name="email" aria-describedby="edit_email">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Cliente Responsavel:</span>
  					<input type="text" class="form-control" placeholder="E-mail" id="edit_cliResp" name="cliente_responsavel" aria-describedby="edit_cliResp">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone Responsavel:</span>
  					<input type="text" class="form-control" placeholder="Telefone Responsavel" id="edit_telResp" name="telefone_responsavel" aria-describedby="edit_telResp">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Inicio:</span>
  					<input type="text" class="form-control" placeholder="Ex: 16/12/1991" id="edit_diaInic" name="dia_inicio" aria-describedby="edit_diaInic">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Fim:</span>
  					<input type="text" class="form-control" placeholder="Ex: 16/12/1991" id="edit_diaFim" name="dia_fim" aria-describedby="edit_diaFim">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Cobrança:</span>
  					<input type="text" class="form-control" placeholder="Dia Cobrança" id="edit_diaCobranca" name="dia_cobranca" aria-describedby="edit_diaCobranca">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Forma Pagamento:</span>
  					<input type="text" class="form-control" placeholder="Forma Pagamento" id="edit_FormPag" name="forma_pagamento" aria-describedby="edit_FormPag">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Valor Contrato:</span>
  					<input type="text" class="form-control" placeholder="Valor Contrato" id="edit_ValContra" name="valor_contrato" aria-describedby="edit_ValContra">
				</div>
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="SalvarEditProjeto">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal " id="modalInfoProjeto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Informações Completas do Projeto</h4>
      </div>
      <div class="modal-body">
        	<form id="info_projeto">
        		<label class='negrito' for="infoID">ID: </label><span  id="infoId"></span><br>
        		<label class='negrito' for="infoNomeProjeto">Nome Projeto: </label><span  id="infoNomeProjeto"></span><br>
        		<label class='negrito' for="infoCnpj">CNPJ: </label><span  id="infoCnpj"></span><br>
        		<label class='negrito' for="infoIe">IE: </label><span  id="infoIe"></span><br>
        		<label class='negrito' for="infoRazaoSocial">Razão Social: </label><span  id="infoRazaoSocial"></span><br>
        		<label class='negrito' for="infoNomeFantasia">Nome Fantasia: </label><span  id="infoNomeFantasia"></span><br>
        		<label class='negrito' for="infoLogradouro">Logradouro: </label><span  id="infoLogradouro"></span><br>
        		<label class='negrito' for="infoBairro">Bairro: </label><span  id="infoBairro"></span><br>
        		<label class='negrito' for="infoNumero">Numero: </label><span  id="infoNumero"></span><br>
        		<label class='negrito' for="infoCep">CEP: </label><span  id="infoCep"></span><br>
        		<label class='negrito' for="infoMunicipio">Municipio: </label><span  id="infoMunicipio"></span><br>
        		<label class='negrito' for="infoEstado">Estado: </label><span  id="infoEstado"></span><br>
        		<label class='negrito' for="infoTelefone">Telefone: </label><span  id="infoTelefone"></span><br>
        		<label class='negrito' for="infoEmail">E-Mail: </label><span  id="infoEmail"></span><br>
        		<label class='negrito' for="infoCliResponsavel">Cliente Responsavel: </label><span  id="infoCliResponsavel"></span><br>
        		<label class='negrito' for="infoTelResponsavel">Telefone Responsavel: </label><span  id="infoTelResponsavel"></span><br>
        		<label class='negrito' for="infoDiaInicio">Dia Inicio: </label><span  id="infoDiaInicio"></span><br>
        		<label class='negrito' for="infoDiaFim">Dia Fim: </label><span  id="infoDiaFim"></span><br>
        		<label class='negrito' for="infoDiaCobranca">Dia Cobranca: </label><span  id="infoDiaCobranca"></span><br>
        		<label class='negrito' for="infoFormaPagamento">Forma Pagamento: </label><span  id="infoFormaPagamento"></span><br>
        		<label class='negrito' for="infoValorContrato">Valor Contrato: </label><span  id="infoValorContrato"></span><br>
        	</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="editarProjeto">Editar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalNovoProjeto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Novo Projeto</h4>
      </div>
      <div class="modal-body">
        	<form id="novoProjeto">
        		<div class="input-group">
  					<span class="input-group-addon">Nome Projeto:</span>
  					<input type="text" class="form-control" placeholder="Nome Projeto" name="nome_projeto" aria-describedby="edit_nomeProjeto">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Razão Social:</span>
  					<input type="text" class="form-control" placeholder="Razão Social" name="razao_social" aria-describedby="edit_razaoSocial">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Nome Fantasia:</span>
  					<input type="text" class="form-control" placeholder="Nome Fantasia" name="nome_fantasia" aria-describedby="edit_nomeFantasia">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CNPJ:</span>
  					<input type="text" class="form-control" placeholder="Ex:99.999.999/9999-99)"  name="cnpj" aria-describedby="edit_cnpj">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">IE:</span>
  					<input type="text" class="form-control" placeholder="Ex:999.999.999.999)" name="ie" aria-describedby="edit_ie">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Logradouro:</span>
  					<input type="text" class="form-control" placeholder="Logradouro" name="logradouro" aria-describedby="edit_logradouro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Bairro:</span>
  					<input type="text" class="form-control" placeholder="Bairro" name="bairro" aria-describedby="edit_bairro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Numero:</span>
  					<input type="text" class="form-control" placeholder="Numero" name="numero" aria-describedby="edit_numero">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CEP:</span>
  					<input type="text" class="form-control" placeholder="Ex: 08970-000"  name="cep" aria-describedby="edit_cep">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Municipio:</span>
  					<input type="text" class="form-control" placeholder="Municipio" name="municipio" aria-describedby="edit_municipio">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Estado (Exemplo: SP):</span>
  					<input type="text" class="form-control" placeholder="Ex:SP" name="estado" aria-describedby="edit_estado">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone:</span>
  					<input type="text" class="form-control" placeholder="Telefone" name="telefone" aria-describedby="edit_telefone">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">E-mail:</span>
  					<input type="text" class="form-control" placeholder="E-mail" name="email" aria-describedby="edit_email">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Cliente Responsavel:</span>
  					<input type="text" class="form-control" placeholder="E-mail" name="cliente_responsavel" aria-describedby="edit_cliResp">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone Responsavel:</span>
  					<input type="text" class="form-control" placeholder="Telefone Responsavel"  name="telefone_responsavel" aria-describedby="edit_telResp">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Inicio:</span>
  					<input type="text" class="form-control" placeholder="Ex:16/12/1991"  name="dia_inicio" aria-describedby="edit_diaInic">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Fim:</span>
  					<input type="text" class="form-control" placeholder="Ex:16/12/1991"  name="dia_fim" aria-describedby="edit_diaFim">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Dia Cobrança:</span>
  					<input type="text" class="form-control" placeholder="Dia Cobrança" name="dia_cobranca" aria-describedby="edit_diaCobranca">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Forma Pagamento:</span>
  					<input type="text" class="form-control" placeholder="Forma Pagamento" name="forma_pagamento" aria-describedby="edit_FormPag">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Valor Contrato:</span>
  					<input type="text" class="form-control" placeholder="Valor Contrato" name="valor_contrato" aria-describedby="edit_ValContra">
				</div>
        	</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="SalvarNovoProjeto">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
