<?php 
	include_once '../Classes/Usuarios.php';
	$todosUsuarios = new ApresentarUsuario();
	$Usuarios = $todosUsuarios->MostrarTodosUsuarios();
?>
<div class="cell">
	<div class="template-header">
		<div class="col width-1of11"><div class="button" id="NovoUsuario">Novo Usuario</div></div>
		<center><h1>Usuarios</h1></center>
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
										<th class="width-1of12">Sobrenome</th>
										<th class="width-2of12">E-Mail</th>
										<th class="width-1of12">Celular</th>
										<th class="width-1of12"></th>
										<th class="width-1of12"></th>
										<th class="width-1of12"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//exibindo todos os usuarios em uma tabela
										while ($exibirUsuarios = $Usuarios->fetch_array(MYSQLI_ASSOC)) {
											printf("
												<tr>
													<td id='identificacao'>".$exibirUsuarios['id']."</td>
													<td id='exibirUsuario'>".$exibirUsuarios['nome']."</td>
													<td>".$exibirUsuarios['sobrenome']."</td>
													<td>".$exibirUsuarios['email']."</td>
													<td>".$exibirUsuarios['telefone']."</td>
													<td><div class='button' id='InfoUsuario'>Info</div></td>
													<td><div class='button ResetSenhaUsuario' id=''>Reset Pass</div></td>
													<td><div class='button' id='ExcluirUsuario'>Excluir</div></td>
												</tr>");
										}
									 ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!--.cellPanel-->

		
		<div class="modal" id="modalInfoUsuario">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
				<div class="header">
					<center>Informações Usuario</center>
				</div>
					<div class="body">
						<form id="">
							<div class="cell">
								<div class="col width-1of12"><div class='negrito'>ID:</div> <div id="infoId"></div></div>
								<div class="col width-2of12"><div class='negrito'>Nome:</div> <div id="infoNome"></div></div>
								<div class="col width-3of12"><div class='negrito'>Sobrenome:</div> <div id="infoSobrenome"></div></div>
								<div class="col width-3of12"><div class='negrito'>Email:</div> <div id="infoEmail"></div></div>
								<div class="col width-3of12"><div class='negrito'>Telefone:</div> <div id="infoTelefone"></div></div>
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
						</form>
						<div class="cell">
							<div class="col width-2of12 button" id="EditarUsuario">Editar</div>
							<div class="col width-2of12 button" id="modalClose">Fechar</div>
						</div>
					</div> <!--.body-->
				</div> <!--.cell panel-->
			</div> <!--.modal-content-->
		</div><!--.modal-->

		<div class="modal" id="modalResetSenha">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
				<div class="header">
					<center>Reset Senha</center>
				</div>
					<div class="body">
						<div class="cell">
							<div class="col width-4of12">
								ID: <negrito id='idUsuario'></negrito>
							</div>
							<div class="col width-4of12">
								Usuario: <negrito id='nomeUsuario'></negrito>
							</div>
						</div>
						<form id="">
							<div class="cell">
								<div class="col width-4of12">
									Senha: <input type="password" placeholder="Nova Senha" id="novaSenha">
								</div>
							</div>
							<div class="cell">
								<div class="col width-4of12">
									Confirma Senha: <input type="password" placeholder="Confirma Senha" id="confirmaSenha">
								</div>
							</div>
						</form>
						<div class="cell">
							<div class="col width-2of12 button" id="SalvarNovaSenha">Salvar</div>
							<div class="col width-2of12 button" id="modalClose">Fechar</div>
						</div>
					</div> <!--.body-->
				</div> <!--.cell panel-->
			</div> <!--.modal-content-->
		</div><!--.modal-->

		<div class="modal" id="modalEditarUsuario">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
				<div class="header">
					<center>Editar Usuario</center>
				</div>
					<div class="body">
						<form id="FormEditarUsuario">
							<div class="cell">
								<div class="col width-1of12"><div class='negrito'>ID:</div> <div id="editar_id"></div></div>
							</div>
							<div class="cell">
								<div class="col width-4of12">
									Nome: <input type="text" placeholder="Nome" id="editar_nome" name="editar_nome">
								</div>
								<div class="col width-4of12">
									Sobrenome: <input type="text" placeholder="Sobrenome" id="editar_sobrenome" name="editar_sobrenome">
								</div>
								<div class="col width-4of12">
									E-Mail: <input type="text" placeholder="E-Mail" id="editar_email" name="editar_email">
								</div>
							</div>

							<div class="cell">
								<div class="col width-6of12">
									Telefone: <input type="text" placeholder="Telefone" id="editar_telefone" name="editar_telefone">
								</div>
							</div>
							<div class="cell">
								<div class="col width-12of12">
									Logradouro: <input type="text" placeholder="Logradouro Ex.: Rua dos Alfeneiros" id="editar_logradouro" name="editar_logradouro">
								</div>
							</div>
							<div class="cell">
								<div class="col width-4of12">
									Bairro: <input type="text" placeholder="Bairro" id="editar_bairro" name="editar_bairro">
								</div>
								<div class="col width-4of12">
									Numero: <input type="text" placeholder="Numero Ex.: 4" id="editar_numero" name="editar_numero">
								</div>
								<div class="col width-4of12">
									CEP: <input type="text" placeholder="Cep Ex. 08970-000" id="editar_cep" name="editar_cep">
								</div>
							</div>
							<div class="cell">
								<div class="col width-6of12">
									Municipio: <input type="text" placeholder="Municipio" id="editar_municipio" name="editar_municipio">
								</div>
								<div class="col width-6of12">
									Estado(Exemplo: SP): <input type="text" placeholder="Estado Ex.: SP" id="editar_estado" name="editar_estado">
							</div>
						</form>
						<div class="cell">
							<div class="col width-2of12 button" id="SalvarEditarUsuario">Salvar</div>
							<div class="col width-2of12 button" id="modalClose">Fechar</div>
						</div>
					</div> <!--.body-->
				</div> <!--.cell panel-->
			</div> <!--.modal-content-->
		</div><!--.modal-->

		<div class="modal" id="modalNovoUsuario">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
				<div class="header">
					<center>Novo Usuario</center>
				</div>
					<div class="body">
						<form id="FormNovoUsuario">
							<div class="cell">
								<div class="col width-4of12">
									Nome: <input type="text" placeholder="Nome" name="novo_nome">
								</div>
								<div class="col width-4of12">
									Sobrenome: <input type="text" placeholder="Sobrenome" name="novo_sobrenome">
								</div>
								<div class="col width-4of12">
									E-Mail: <input type="text" placeholder="E-Mail" name="novo_email">
								</div>
							</div>

							<div class="cell">
								<div class="col width-6of12">
									Senha: <input type="password" placeholder="Senha" name="novo_senha">
								</div>
								<div class="col width-6of12">
									Telefone: <input type="text" placeholder="Telefone" name="novo_telefone">
								</div>
							</div>
							<div class="cell">
								<div class="col width-12of12">
									Logradouro: <input type="text" placeholder="Logradouro Ex.: Rua dos Alfeneiros" name="novo_logradouro">
								</div>
							</div>
							<div class="cell">
								<div class="col width-4of12">
									Bairro: <input type="text" placeholder="Bairro" name="novo_bairro">
								</div>
								<div class="col width-4of12">
									Numero: <input type="text" placeholder="Numero Ex.: 4" name="novo_numero">
								</div>
								<div class="col width-4of12">
									CEP: <input type="text" placeholder="Cep Ex. 08970-000" name="novo_cep">
								</div>
							</div>
							<div class="cell">
								<div class="col width-6of12">
									Municipio: <input type="text" placeholder="Municipio" name="novo_municipio">
								</div>
								<div class="col width-6of12">
									Estado(Exemplo: SP): <input type="text" placeholder="Estado Ex.: SP" name="novo_estado">
							</div>
						</form>
						<div class="cell">
							<div class="col width-2of12 button" id="SalvarNovoUsuario">Salvar</div>
							<div class="col width-2of12 button" id="modalClose">Fechar</div>
						</div>
					</div> <!--.body-->
				</div> <!--.cell panel-->
			</div> <!--.modal-content-->
		</div><!--.modal-->

		
		
	</div>

</div>




