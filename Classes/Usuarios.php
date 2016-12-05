<?php
header("Content-Type: text/html; charset=UTF-8");


include "MeuSQL.php";
include "CriptografiaSenha.php"; //Incluindo classe para criptografia senha;

/**
* Criado por Gabriel Meinberg Renó
* WhatsAPP: +55 11 947126466
* E-Mail: g.meinreno@yahoo.com.br
* Twitter: meinreno
*/

// Classe para cadastrar novo usuario extendendo a Classe MeuSQL('Classes/MeuSQL.php') para alimentar a Tabela 

class novoUsuario extends MeuSQL  
{
	private $nome;
	private $sobrenome;
	private $email;
	private $senha;
	private $telefone;
	private $logradouro;
	private $bairro;
	private $numero;
	private $cep;
	private $municipio;
	private $estado;

	public function __construct($getNome, $getSobrenome, $getEmail, $getSenha, $getTelefone, $getLogradouro, $getBairro, $getNumero, $getCep, $getMunicipio, $getEstado) //função construtora para armazenar informações do novo usuario
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->nome = $getNome;
		$this->sobrenome = $getSobrenome;
		$this->email = $getEmail;
		$this->senha = $getSenha;
		$this->telefone = $getTelefone;
		$this->logradouro = $getLogradouro;
		$this->bairro = $getBairro;
		$this->numero = $getNumero;
		$this->cep = $getCep;
		$this->municipio = $getMunicipio;
		$this->estado = $getEstado;
		
	}

	function verificaExistencia_Usuario($email_Busca){//verificar existencia de usuario pelo email.
		
		$this->conectarSQL('vincent_project'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT email FROM usuarios WHERE email='".$email_Busca."'"; //query para verificar a existencia de usuario pelo email
		$resultado = $this->con->query($query) or die ($this->con->error); //executando Query

		
		return $resultado->num_rows; //retornando quantos usuarios foram encontrados pelo email
	}

	function cadastrar_novoUsuario(){
		
		 if ($this->verificaExistencia_Usuario($this->email) >= 1) { //verificando se o usuario já existe
		 	echo "Usuario já existe no Sistema(Verificado pelo E-Mail)";
		 	exit(); //se usuario já existir no sistema encerra o processo de cadastro de usuario.
		 }

		$CriptografadorSenha = new CriptografiaSenha($this->senha); //Criando objeto para criptografar senha

		$salt = $CriptografadorSenha::geraSaltAleatorio(22); //Gerando o Salto

		
		$SenhaCriptografada = $CriptografadorSenha->gerarHash($salt); //gerando senha com o salt


		$chave_novoUsuario = Array('nome', 'sobrenome', 'email', 'senha', 'salt', 'telefone', 'logradouro', 'bairro', 'numero', 'cep', 'municipio', 'estado'); //Armazenar chaves em array para usar no MeuSQL
		$dados_novoUsuario = Array($this->nome, $this->sobrenome, $this->email, $SenhaCriptografada, $salt, $this->telefone, $this->logradouro, $this->bairro, $this->numero, $this->cep, $this->municipio, $this->estado); //Armazenar informações em Array para alimentar BD

		
		parent::conectarSQL('vincent_project'); //Selecionando Banco de dados e ativar a conexão com o Mysql

		parent::alimentarTabelaID('usuarios', $chave_novoUsuario, $dados_novoUsuario); //Alimentando o BD com as informações do novo usuario.

		return 0;

	}
}

//Classe para realizar o login na pagina

class LoginUsuario extends MeuSQL
{

	private $Email;
	private $Senha;
	
	function __construct($getEmail, $getSenha)
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->Email = $getEmail;
		$this->Senha = $getSenha;
	}

	function login() //função login do usuario
	{
		$this->conectarSQL('vincent_project'); //conectando ao BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT * FROM usuarios WHERE email='".$this->Email."'"; //selecionando todos os campos necesarios para verificar se usuario e senha estão corretos

		$resultado = $this->con->query($query) or die ($this->con->error); //executando a query

		$coluna = $resultado->fetch_array(MYSQLI_ASSOC); //guardando o resultado em um Array e retorna a chave do array em forma de nome (MYSQLI_ASSOC)

		$geradorHash = new CriptografiaSenha($this->Senha); // criando objeto da criptografia de senha

		$hash = $geradorHash->gerarHash($coluna['salt']); //gerando a hash com o salt adquirido do Bd do usuario

		

		if($hash === $coluna['senha']){ //verificando se senha está correta
			setcookie('emailUsuario', $this->Email, time()+3600, '/', $_SERVER['SERVER_NAME']); //Setando Cookie para guardar email do usuario
			header("Location: ../home.php"); //caso a senha estejá correta, o codigo irá direcionar o usuario para a pagina desejada
		}else{
			echo '<div class="col center width-2of4">
                    <div class="cell panel">
                        <div class="header">
                           Aviso
                        </div>
                        <div class="body">
                            <div class="cell">
                                <div class="col">
                                    <div class="cell">
                                        <div class="color-red center" style="width:200px;max-width:100%;">
                                            <div class="col width-fit mobile-width-fit"><span class="icon icon-warning-sign"></span>
                                            </div>
                                            <div class="col width-fill mobile-width-fill">
                                                Senha ou usuario Incorreto!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
		}

		
		



	}


}

/**
* Apresentar informações Usuarios
*/
class ApresentarUsuario extends MeuSQL
{
	
	function __construct()
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL	
	}

	function MostrarTodosUsuarios(){
		$this->conectarSQL('vincent_project'); //conectando ao BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT * FROM usuarios ORDER BY nome"; //selecionando todos os campos necesarios para verificar se usuario e senha estão corretos

		$resultado = $this->con->query($query) or die ($this->con->error); //executando a query
		return $resultado;
	}

	function MostrarInfoUsuario($idUsuario){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT id, nome, sobrenome, email, telefone, logradouro, bairro, numero, cep, municipio, estado FROM usuarios WHERE id='".$idUsuario."'";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query

		return $resultado;
	}

}

/**
* Classe para processos referente aos Usuarios
*/
class ToolsUsuarios extends MeuSQL
{
	
	function __construct()
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL	
	}


	//Excluir Usuario

	function ExcluirUsuario($idUsuario){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->excluirLinha('usuarios', 'id', $idUsuario); //função da Classe MeuSql para excluir linha de tabela
	}

	function Logoff(){ //Logoff de Usuarios
		setcookie('emailUsuario', '', time()-99999999, '/', $_SERVER['SERVER_NAME']);
		

		header("Refresh:0");

	}

	function AlteraSenha($idUsuario, $novaSenha){
		$CriptografadorSenha = new CriptografiaSenha($novaSenha); //Criando objeto para criptografar senha

		$salt = $CriptografadorSenha::geraSaltAleatorio(22); //Gerando o Salto

		
		$SenhaCriptografada = $CriptografadorSenha->gerarHash($salt); //gerando senha com o salt

		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");

		$query = "UPDATE usuarios SET salt = '".$salt."', senha = '".$SenhaCriptografada."' WHERE id=$idUsuario";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
		echo json_encode("Senha Alterada Com Sucesso");
	}
	
}

	

	
