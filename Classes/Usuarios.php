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

	public function __construct($getNome, $getSobrenome, $getEmail, $getSenha) //função construtora para armazenar informações do novo usuario
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->nome = $getNome;
		$this->sobrenome = $getSobrenome;
		$this->email = $getEmail;
		$this->senha = $getSenha;
		
	}

	function verificaExistencia_Usuario($email_Busca){//verificar existencia de usuario pelo email.
		
		$this->conectarSQL('teste'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT email FROM teste3 WHERE email='".$email_Busca."'"; //query para verificar a existencia de usuario pelo email
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


		$chave_novoUsuario = Array('nome', 'sobrenome', 'email', 'senha', 'salt'); //Armazenar chaves em array para usar no MeuSQL
		$dados_novoUsuario = Array($this->nome, $this->sobrenome, $this->email, $SenhaCriptografada, $salt); //Armazenar informações em Array para alimentar BD

		
		parent::conectarSQL('teste'); //Selecionando Banco de dados e ativar a conexão com o Mysql

		parent::alimentarTabelaID('teste3', $chave_novoUsuario, $dados_novoUsuario); //Alimentando o BD com as informações do novo usuario.

	}
}


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
		$this->conectarSQL('teste'); //conectando ao BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT * FROM teste3 WHERE email='".$this->Email."'"; //selecionando todos os campos necesarios para verificar se usuario e senha estão corretos

		$resultado = $this->con->query($query) or die ($this->con->error); //executando a query

		$coluna = $resultado->fetch_array(MYSQLI_ASSOC); //guardando o resultado em um Array

		$geradorHash = new CriptografiaSenha($this->Senha); // criando objeto da criptografia de senha

		$hash = $geradorHash->gerarHash($coluna['salt']); //gerando a hash com o salt adquirido do Bd do usuario

		if($hash === $coluna['senha']){ //verificando se senha está correta
			header("Location: http://localhost/cadastrar_novo.php"); //caso a senha estejá correta, o codigo irá direcionar o usuario para a pagina desejada
		}else{
			echo "Senha ou Usuario incorreto";
		}

		
		



	}


}

	

	
