<?php

/**
* Criado por Gabriel Meinberg Renó
* WhatsAPP: +55 11 947126466
* E-Mail: g.meinreno@yahoo.com.br
* Twitter: meinreno
*/


header("Content-Type: text/html; charset=UTF-8");
//mysql_query("SET NAMES 'utf8'");


class CriptografiaSenha
{
	private $senha;

	public function __construct($senha) //Metodo construtor para receber senha
	{
		$this->senha = $senha;
	}

	function geraSaltAleatorio($tamanho) { //Função para gerar Salto
    	return substr(sha1(mt_rand()), 0, $tamanho);  
	}

	function gerarHash($salt) //função para gerar 
	{
		
 
		// Cria um hash
		$hash = md5($this->senha . $salt); //Criando Hash, Senha + Salto, e depois criptografando senha 
		return $hash; //Retornando Hash
	}

}