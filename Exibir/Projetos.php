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
				<div class="cell">
					<div class="col width-2of12"><div class='negrito'>ID:</div> <div id="infoId"></div></div>
					<div class="col width-4of12"><div class='negrito'>Nome Projeto:</div> <div id="infoNomeProjeto"></div></div>
					<div class="col width-3of12"><div class='negrito'>CNPJ:</div> <div id="infoCnpj"></div></div>
					<div class="col width-3of12"><div class='negrito'>IE:</div> <div id="infoIe"></div></div>
				</div>

				<div class="cell">
					<div class="col width-4of8"><div class='negrito'>Razão Social:</div> <div id="infoRazaoSocial"></div></div>
					<div class="col width-4of8"><div class='negrito'>Nome Fantasia:</div> <div id="infoNomeFantasia"></div></div>
				</div>
				<div class="cell">
					<div class="col width-6of12"><div class='negrito'>Logradouro:</div> <div id="infoLogradouro"></div></div>
					<div class="col width-4of12"><div class='negrito'>Bairro:</div> <div id="infoBairro"></div></div>
					<div class="col width-2of12"><div class='negrito'>Numero:</div> <div id="infoNumero"></div></div>
				</div>
				<div class="cell">
					<div class="col width-1of4"><div class='negrito'>CEP:</div> <div id="infoCep"></div></div>
					<div class="col width-3of8"><div class='negrito'>Municipio:</div> <div id="infoMunicipio"></div></div>
					<div class="col width-3of8"><div class='negrito'>Estado:</div> <div id="infoEstado"></div></div>
				</div>
				<div class="cell">
					<div class="col width-3of12"><div class='negrito'>Telefone:</div> <div id="infoTelefone"></div></div>
					<div class="col width-3of12"><div class='negrito'>E-Mail:</div> <div id="infoEmail"></div></div>
					<div class="col width-3of12"><div class='negrito'>Cliente Responsavel:</div> <div id="infoCliResponsavel"></div></div>
					<div class="col width-3of12"><div class='negrito'>Telefone Responsavel:</div> <div id="infoTelResponsavel"></div></div>
				</div>
				<div class="cell">
					<div class="col width-2of12"><div class='negrito'>Dia Inicio:</div> <div id="infoDiaInicio"></div></div>
					<div class="col width-2of12"><div class='negrito'>Dia Fim:</div> <div id="infoDiaFim"></div></div>
					<div class="col width-2of12"><div class='negrito'>Dia Cobranca:</div> <div id="infoDiaCobranca"></div></div>
					<div class="col width-3of12"><div class='negrito'>Forma Pagamento:</div> <div id="infoFormaPagamento"></div></div>
					<div class="col width-3of12"><div class='negrito'>Valor Contrato:</div> <div id="infoValorContrato"></div></div>
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	
