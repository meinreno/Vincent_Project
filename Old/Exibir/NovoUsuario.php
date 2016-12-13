<div class="cell">
	<div class="template-header">
		<center><h1>Cadastrar Usuario</h1></center>
	</div>
	<div class="col">
		<div class="cell panel">
			<div class="body">
				<form name="novo_usuario"> <!-- Form de Cadastro de Novo usuario, Apos curto cadastro sem erros irá para a pagina já logada-->
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
					<div class="cell">
						<div class="col width-4of12"></div>
						<div class="col width-4of12"><input class="button" type="submit" name="Enviar"></div>
						<div class="col width-4of12"></div>
					</div>
				</form>
				<?php

					if(isset($_POST['novo_nome'])){
						include 'Classes/Usuarios.php';

						$novoUsuario = new novoUsuario($_POST['novo_nome'], $_POST['novo_sobrenome'], $_POST['novo_email'], $_POST['novo_senha'], $_POST['novo_telefone'], $_POST['novo_logradouro'], $_POST['novo_bairro'], $_POST['novo_numero'], $_POST['novo_cep'], $_POST['novo_municipio'], $_POST['novo_estado']);

						$novoUsuario->cadastrar_novoUsuario();

						
					} ?>	
			</div>
		</div>
	</div>
</div>