<?php

//header("Content-Type: text/html; charset=UTF-8");
//mysql_query("SET NAMES 'utf8'");

/**
* Criado por Gabriel Meinberg Renó
* WhatsAPP: +55 11 947126466
* E-Mail: g.meinreno@yahoo.com.br
* Twitter: meinreno
*/
class MeuSQL
{
	private $endereco; //Endereço do BD
	private $usuario; //Usuario que irá se conectar
	private $senha; //Senha do usuario que irá se conectar
	public $con; //variavel que armazena a conexão de dados
	

	
	public function __construct($getEndereco, $getUsuario, $getSenha)
	{
		$this->endereco = $getEndereco;
		$this->usuario = $getUsuario;
		$this->senha = $getSenha;

		
	}

	public function conectarSQL($banco) //Função para conectar ao Mysql e o BD
	{
		$this->con = new mysqli($this->endereco, $this->usuario, $this->senha, $banco);
		if ($this->con->connect_error) {
    		die('Connect Error (' . $this->con->connect_error . ') ' . $this->con->connect_error);
		}

	}

	public function alimentarTabelaID($nomeTabela, $chaves, $informacoes){ //Função para adicionar informações a tabela com ID automatico

		
			
		$chaves = implode(', ', $chaves); //Transformando o Array contendo as chaves que devão ser alimentadas
		$informacoes = join("', '", $informacoes); //Informações que alimentarão o BD.
		

		$query = "INSERT INTO $nomeTabela ($chaves)VALUES('$informacoes')"; //Query para alimentar o BD

		
		$this->con->query("SET NAMES 'utf8'");
		$this->con->query($query) or die ($this->con->error)  ; //executando a Query par cadastrar produtos na tabela
	}

	public function excluirLinha($nomeTabela, $chave, $identificacao){
		$query = "DELETE FROM $nomeTabela WHERE $chave = '".$identificacao."'";

		$this->con->query("SET NAMES 'utf8'");
		$this->con->query($query) or die ($this->con->error)  ; //executando a Query par cadastrar produtos na tabela
	}


}