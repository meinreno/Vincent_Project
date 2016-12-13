<?php
include_once '../Classes/Projetos.php';	
$idProjeto = $_POST['idProjeto']; //capturando id projeto vindo por select
?>
<div id='idProjetoCurrent' style="display:none;"><?php echo $idProjeto; ?></div> <!--Guardando informação de id do projeto para usar no cadastro de novo Log-->

<button type="button" id="NovoLog" class="btn btn-primary">Novo Log</button><!--Botão para cadastro de novo usuario-->
<div class="panel panel-default">
	<div class="panel-heading">
    	<h3 class="panel-title text-center">Logs Projeto</h3>
  	</div>
  	<div class="panel-body"><!--Panel para apresentação de Log, logs serão apresentado dentro de um <details>-->
  		<?php 
			$LogTools = new LogTools();

			$resultado = $LogTools->ExibirLogs($idProjeto);
			while ($exibirLog = $resultado->fetch_array(MYSQLI_ASSOC)) {
				$novaDataHora = $LogTools->NovaDataHora($exibirLog['data']);
				echo "<div class='cell panel'> 
							<div class='body'>
								<details>
									<summary ><negrito id='identificacao'>ID: ".$exibirLog['id']."</negrito> <negrito>Titulo: </negrito>".$exibirLog['titulo']." <negrito>Usuario: </negrito>".$exibirLog['usuario']." <negrito>Hora e Data: </negrito>".$novaDataHora."</summary>
									<p>".$exibirLog['log']."</p>
								</details>
							</div>
						</div>
					";
				
			}
		?>	
  	</div>
</div>
<div class="modal " id="modalNovoLog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" id="myModalLabel">Criar Novo Log</h4>
      </div>
      <div class="modal-body">
        	<form id="formNovoLog">
							<div class="cell">
								<div class="col width-1of12">Titulo:</div>
								<div class="col width-6of12"><input type="text" name="tituloLog"></div>
							</div>
							<div class="cell">
								<div class="col width-fill">Escreva de forma <negrito>DETALHADA</negrito> os serviços realizados no Projeto:</div>
							</div>
							<div class="cell">
								<textarea style="width:99%"  rows = '6' name='descricaoLog'></textarea>
							</div>
								
								
							
						</form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="salvarLog">Salvar Log</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
