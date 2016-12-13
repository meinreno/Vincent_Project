<?php 
	include_once '../Classes/Usuarios.php';
	$todosUsuarios = new ApresentarUsuario();
	$Usuarios = $todosUsuarios->MostrarTodosUsuarios();
?>

<button type="button" id="NovoUsuario" class="btn btn-primary">Novo Usuario</button>
<div class="panel panel-default">
	<div class="panel-heading">
    	<h3 class="panel-title text-center">Usuarios</h3>
  	</div>
  	<div class="panel-body">
   		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">E-Mail</th>
					<th class="hidden-xs hidden-sm visible-md visible-lg">Celular</th>
					<th></th>
					
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
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirUsuarios['email']."</td>
								<td class='hidden-xs hidden-sm visible-md visible-lg'>".$exibirUsuarios['telefone']."</td>
								<td><button type='button' class='btn btn-primary' id='InfoUsuario'>Info</button>
									<button type='button' class='btn btn-primary ResetSenhaUsuario'>Reset Pass</button>
									<button type='button' class='btn btn-primary' id='ExcluirUsuario'>Excluir</button></td>
							</tr>");
					}
				 ?>
			</tbody>
		</table>
  	</div>
</div>

<div class="modal " id="modalInfoUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Informações Usuario</h4>
      </div>
      <div class="modal-body">
        	<form id="">
        		<label class='negrito' for="infoId">ID: </label><span  id="infoId"></span><br>
        		<label class='negrito' for="infoNome">Nome: </label><span  id="infoNome"></span><br>
        		<label class='negrito' for="infoSobrenome">Sobrenome: </label><span  id="infoSobrenome"></span><br>
        		<label class='negrito' for="infoEmail">Email: </label><span  id="infoEmail"></span><br>
        		<label class='negrito' for="infoTelefone">Telefone: </label><span  id="infoTelefone"></span><br>
        		<label class='negrito' for="infoLogradouro">Logradouro: </label><span  id="infoLogradouro"></span><br>
        		<label class='negrito' for="infoBairro">Bairro: </label><span  id="infoBairro"></span><br>
        		<label class='negrito' for="infoNumero">Numero: </label><span  id="infoNumero"></span><br>
        		<label class='negrito' for="infoCep">CEP: </label><span  id="infoCep"></span><br>
        		<label class='negrito' for="infoMunicipio">Municipio: </label><span  id="infoMunicipio"></span><br>
        		<label class='negrito' for="infoEstado">Estado: </label><span  id="infoEstado"></span><br>
        	</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="EditarUsuario">Editar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal " id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">
        	<form id="FormEditarUsuario">
        		<label class='negrito' for="editar_id">ID: </label><span id="editar_id"></span><br>
        		<div class="input-group">
  					<span class="input-group-addon">Nome:</span>
  					<input type="text" class="form-control" placeholder="Nome" id="editar_nome" name="editar_nome" aria-describedby="editar_nome">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Sobrenome:</span>
  					<input type="text" class="form-control" placeholder="Sobrenome" id="editar_sobrenome" name="editar_sobrenome" aria-describedby="editar_sobrenome">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">E-Mail:</span>
  					<input type="text" class="form-control" placeholder="E-Mail" id="editar_email" name="editar_email" aria-describedby="editar_email">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone:</span>
  					<input type="text" class="form-control" placeholder="Telefone" id="editar_telefone" name="editar_telefone" aria-describedby="editar_telefone">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Logradouro:</span>
  					<input type="text" class="form-control" placeholder="Ex.: Rua dos Alfeneiros" id="editar_logradouro" name="editar_logradouro" aria-describedby="editar_logradouro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Bairro:</span>
  					<input type="text" class="form-control" placeholder="Bairro" id="editar_bairro" name="editar_bairro" aria-describedby="editar_bairro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Numero:</span>
  					<input type="text" class="form-control" placeholder="Ex.: 4" id="editar_numero" name="editar_numero" aria-describedby="editar_numero">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CEP:</span>
  					<input type="text" class="form-control" placeholder="Ex. 08970-000" id="editar_cep" name="editar_cep" aria-describedby="editar_cep">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Municipio:</span>
  					<input type="text" class="form-control" placeholder="Municipio" id="editar_municipio" name="editar_municipio" aria-describedby="editar_municipio">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Estado(Exemplo: SP):</span>
  					<input type="text" class="form-control" placeholder="Ex.: SP" id="editar_estado" name="editar_estado" aria-describedby="editar_estado">
				</div>
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="SalvarEditarUsuario">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal " id="modalResetSenha" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Reset Senha</h4>
      </div>
      <div class="modal-body">
      		<label class='negrito' for="idUsuario">ID: </label><span  id="idUsuario"></span><br>
      		<label class='negrito' for="nomeUsuario">Usuario: </label><span  id="nomeUsuario"></span><br>
        	<form id="">
        		<div class="input-group">
  					<span class="input-group-addon">Senha:</span>
  					<input type="password" class="form-control" placeholder="Nova Senha" id="novaSenha"  aria-describedby="novaSenha">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Confirma Senha:</span>
  					<input type="password" class="form-control" placeholder="Confirma Senha" id="confirmaSenha"  aria-describedby="confirmaSenha">
				</div>
        	</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="SalvarNovaSenha">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal " id="modalNovoUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Novo Usuario</h4>
      </div>
      <div class="modal-body">
        	<form id="FormNovoUsuario">
        		<div class="input-group">
  					<span class="input-group-addon">Nome:</span>
  					<input type="text" class="form-control" placeholder="Nome" name="novo_nome" aria-describedby="novo_nome">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Sobrenome:</span>
  					<input type="text" class="form-control" placeholder="Sobrenome" name="novo_sobrenome" aria-describedby="editar_sobrenome">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">E-Mail:</span>
  					<input type="text" class="form-control" placeholder="E-Mail" name="novo_email" aria-describedby="editar_email">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Senha:</span>
  					<input type="password" class="form-control" placeholder="Senha"  name="novo_senha" aria-describedby="novo_senha">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Telefone:</span>
  					<input type="text" class="form-control" placeholder="Telefone" name="novo_telefone" aria-describedby="novo_telefone">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Logradouro:</span>
  					<input type="text" class="form-control" placeholder="Rua dos Alfeneiros" name="novo_logradouro" aria-describedby="novo_logradouro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Bairro:</span>
  					<input type="text" class="form-control" placeholder="Bairro" name="novo_bairro" aria-describedby="novo_bairro">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Numero:</span>
  					<input type="text" class="form-control" placeholder="Ex.: 4" name="novo_numero" aria-describedby="editar_numero">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">CEP:</span>
  					<input type="text" class="form-control" placeholder="Ex. 08970-000" name="novo_cep" aria-describedby="novo_cep">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Municipio:</span>
  					<input type="text" class="form-control" placeholder="Municipio" name="novo_municipio" aria-describedby="novo_municipio">
				</div>
				<div class="input-group">
  					<span class="input-group-addon">Estado(Exemplo: SP):</span>
  					<input type="text" class="form-control" placeholder="Ex.: SP" name="novo_estado" aria-describedby="novo_estado">
				</div>
			</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="SalvarNovoUsuario">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>