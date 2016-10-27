<?php
	include "Classes/Projetos.php";
	if (isset($_POST['descricaoLog'])) {
		$incluirLog = new CadastrarLog($_POST['idprojeto'], $_POST['descricaoLog'], $_POST['usuarioLog']);
		$incluirLog->CadastrarLog();

	}
	$apresentarProjetos = new ApresentarProjeto();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="Scripts/jquery.js"></script>
	<script type="text/javascript" src="Scripts/Projetos.js"></script>
</head>
<body>
	<h2>Pagina Principal dos Projetos</h2>
<a href="cadastrar_novo.php">Cadastrar Novo Usuario</a><br>
<a href="novo_projeto.php">Cadastrar Novo Projeto</a>

<table border="2">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome Projeto</th>
			<th>Nome Fantasia</th>
		</tr>
	</thead>
	<TBODY>
		<?php $apresentarProjetos->MostrarProjetos(); ?>
	</TBODY>
</table>
<br>
<h3>Inserir um novo Log no Projeto</h3>
<form name="novoLog" method="POST" action="#">
	ID do Projeto <input type="text" name="idprojeto"><br>
	Descrição do Log: <input type="text" name="descricaoLog"><br>
	Usuario: <input type="text" name="usuarioLog"><br>
	<input type="submit" name="Enviar Log">
</form>
<br>
<div id='exibirProjeto'></div>



</body>

<script type="text/javascript">
	
</script>

</html>