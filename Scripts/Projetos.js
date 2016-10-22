$(document).on('click', '.selProjeto', selProjeto);

function selProjeto(){
	var idProjeto = $(this).closest('tr').find('#idProjeto').html();
	$("#exibirProjeto").load("./Exibir/Projetos.php #exibirLog", {'exibirLog': idProjeto} );
}