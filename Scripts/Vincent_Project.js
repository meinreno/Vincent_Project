$(document).on('click', '#Projetos', Projetos);
$(document).on('click', '#Usuario', Usuario);
$(document).on('click', '#NovoUsuario', NovoUsuario);


function Projetos(){
	$("#CorpoHome").load("./Exibir/Projetos.php")
};

function Usuario(){
	$("#CorpoHome").load("./Exibir/Usuarios.php")
	$("#projeto_btn1").html('<a id="NovoUsuario">Novo Usuario</a>'); //botão no header
    $("#projeto_btn2").html(''); //botão no header
};

function NovoUsuario(){
	$("#CorpoHome").load("./Exibir/NovoUsuario.php")
};