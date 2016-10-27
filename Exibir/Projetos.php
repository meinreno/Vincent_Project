<?php 
	include_once "../Classes/Projetos.php";
	$todosProjetos = new ApresentarProjeto();
	$Projetos = $todosProjetos->MostrarProjetos();



?>
<div class="cell">
	<div class="template-header">
		<div class="col width-1of11"><div class="button" id="NovoProjeto">Novo Projeto</div></div>
		<center><h1>Projetos</h1></center>
	</div>
	<div class="col">
		<div class="cell panel">
			<div class="body">
				<div class="cell">
					<div class="col">
						<div class="cell">
							<table class="outline-header">
								<thead>
									<tr>
										<th class="width-1of12">ID</th>
										<th class="width-1of12">Nome</th>
										<th class="width-2of12">Razão Social</th>
										<th class="width-1of12">CNPJ</th>
										<th class="width-1of12">Responsavel</th>
										<th class="width-1of12">Telefone</th>
										<th class="width-1of12"></th>
										<th class="width-1of12"></th>
										<th class="width-1of12"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//exibindo todos os usuarios em uma tabela
										while ($exibirProjetos = $Projetos->fetch_array(MYSQLI_ASSOC)) {
											printf("
												<tr>
													<td id='identificacao'>".$exibirProjetos['id']."</td>
													<td>".$exibirProjetos['nome_projeto']."</td>
													<td>".$exibirProjetos['razao_social']."</td>
													<td>".$exibirProjetos['cnpj']."</td>
													<td>".$exibirProjetos['cliente_responsavel']."</td>
													<td>".$exibirProjetos['tel_responsavel']."</td>
													<td><div class='button'>Selecionar</div></td>
													<td><div class='button' id='infoProjeto'>Info</div></td>
													<td><div class='button'>Excluir</div></td>
												</tr>");
										}
									 ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id="modalInfoProjeto">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
				<div class="header">
					<center>Informações Completas do Projeto</center>
				</div>
					<div class="body">
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
						<div class="cell">
							<div class="col width-2of12 button">Editar</div>
							<div class="col width-2of12 button" id="modalClose">Fechar</div>
						</div>
					</div> <!--.body-->
				</div> <!--.cell panel-->
			</div> <!--.modal-content-->
		</div><!--.modal-->
	</div>

</div>