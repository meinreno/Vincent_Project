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
													<td><div class='button infoUsuario'>Info</div></td>
													<td><div class='button resetUsuario'>Excluir</div></td>
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
	</div>

</div>