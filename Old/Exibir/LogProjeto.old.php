<?php
include_once '../Classes/Projetos.php';	

$idProjeto = $_POST['idProjeto']; //capturando id projeto vindo por select
?>

<div>
	<div id='idProjetoCurrent' style="display:none;"><?php echo $idProjeto; ?></div> <!--Guardando informação de id do projeto para usar no cadastro de novo Log-->
	<div class="cell">
		<div class="template-header">
		<div class="col width-1of11"><div class="button" id="NovoLog">Novo Log</div></div> <!--Botão para cadastro de novo usuario-->
			<center><h1>Logs Projeto</h1></center>
		</div>
		<div class="col">
			<div class="cell panel"> <!--Panel para apresentação de Log, logs serão apresentado dentro de um <details>-->
				<div class="body">
					<?php 
						$LogTools = new LogTools();

						$resultado = $LogTools->ExibirLogs($idProjeto);
						while ($exibirLog = $resultado->fetch_array(MYSQLI_ASSOC)) {
							$novaDataHora = $LogTools->NovaDataHora($exibirLog['data']);
							echo "<div class='cell panel'> 
										<div class='body'>
											<details>
												<summary><negrito id='identificacao'>ID: ".$exibirLog['id']."</negrito> <negrito>Titulo: </negrito>".$exibirLog['titulo']." <negrito>Usuario: </negrito>".$exibirLog['usuario']." <negrito>Hora e Data: </negrito>".$novaDataHora."</summary>
												<p>".$exibirLog['log']."</p>
											</details>
										</div>
									</div>
								";
							
						}
					?>
					
				</div> <!--./body -->
			</div> <!--.cell panel-->
		</div> <!--.col-->

		<!--Modal para novo log -->
		<div class="modal" id="modalNovoLog">
			<div class="modal-content">
				<span class="modalClose" id="modalClose">x</span>
				<div class="cell panel">
					<div class="header">
						<center>Criar Novo Log</center>
					</div>
					<div class="body">
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
								
								
							</div>
							<div class="button" id='salvarLog'>Salvar Log</div>
						</form>


					</div> <!--./Body-->

			</div> <!--./ modal-content-->
		</div> <!--./ div modalNovolog-->
	</div> <!--.cell-->
</div>