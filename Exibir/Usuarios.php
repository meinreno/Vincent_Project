<?php 
	include_once '../Classes/Usuarios.php';
	$todosUsuarios = new ToolsUsuarios();
	$Usuarios = $todosUsuarios->MostrarTodosUsuarios();

	
?>
<div class="cell">
	<div class="template-header">
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
													<td>".$exibirUsuarios['nome']."</td>
													<td>".$exibirUsuarios['sobrenome']."</td>
													<td>".$exibirUsuarios['email']."</td>
													<td>".$exibirUsuarios['telefone']."</td>
													<td><div class='button infoUsuario'>Info</div></td>
													<td><div class='button resetUsuario'>Reset Pass</div></td>
													<td><div class='button excluirUsuario'>Excluir</div></td>
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




