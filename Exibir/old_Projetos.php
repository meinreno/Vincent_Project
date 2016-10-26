<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="exibirLog">
		<table border="2">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descrição</th>
					<th>Usuario</th>
					<th>Data</th>
				</tr>
			</thead>
			<TBODY>
				<?php 
					if(isset($_POST['exibirLog'])){
						include "../Classes/Projetos.php";
						$apresentarLogs = new MostrarLog($_POST['exibirLog']);
						$apresentarLogs->ApresentarLog();
					}
				?>
			</TBODY>
		</table>
	</div>

</body>
</html>

