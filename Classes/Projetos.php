<?php

header("Content-Type: text/html; charset=UTF-8");

include "MeuSQL.php";

/**
* Criado por Gabriel Meinberg Renó
* WhatsAPP: +55 11 947126466
* E-Mail: g.meinreno@yahoo.com.br
* Twitter: meinreno
*/

//Classe para Cadastrar novo Projeto


class NovoProjeto extends MeuSQL
{
	private $nome_projeto;
	private $razao_social;
	private $nome_fantasia;
	private $cnpj;
	private $ie;
	private $logradouro;
	private $bairro;
	private $numero;
	private $cep;
	private $municipio;
	private $estado;
	private $telefone;
	private $email;
	private $cliente_responsavel;
	private $telefone_responsavel;
	private $dia_inicio;
	private $dia_fim;
	private $dia_cobranca;
	private $forma_pagamento;
	private $valor_contrato;
	
	function __construct($getNome_Projeto, $getRazao_Social, $getNome_Fantasia, $getCnpj, $getIe, $getLogradouro, $getBairro, $getNumero, $getCep, $getMunicipio, $getEstado, $getTelefone, $getEmail, $getCliente_Responsavel, $getTelefone_Responsavel, $getDia_Inicio, $getDia_Fim, $getDia_Cobranca, $getForma_Pagamento, $getValor_Contrato)
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->nome_projeto = $getNome_Projeto;
		$this->razao_social = $getRazao_Social;
		$this->nome_fantasia = $getNome_Fantasia;
		$this->cnpj = $getCnpj;
		$this->ie = $getIe;
		$this->logradouro = $getLogradouro;
		$this->bairro = $getBairro;
		$this->numero = $getNumero;
		$this->cep = $getCep;
		$this->municipio = $getMunicipio;
		$this->estado = $getEstado;
		$this->telefone = $getTelefone;
		$this->email = $getEmail;
		$this->cliente_responsavel = $getCliente_Responsavel;
		$this->telefone_responsavel = $getTelefone_Responsavel;
		$this->dia_inicio = $getDia_Inicio;
		$this->dia_fim = $getDia_Fim;
		$this->dia_cobranca = $getDia_Cobranca;
		$this->forma_pagamento = $getForma_Pagamento;
		$this->valor_contrato = $getValor_Contrato;
		
	}

	function verificaExistencia_CNPJ($cnpj_Busca){//verificar existencia de Projeto pelo Cnpj.
		
		$this->conectarSQL('vincent_project'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT cnpj FROM projetos WHERE cnpj='".$cnpj_Busca."'"; //query para verificar a existencia de usuario pelo email
		$resultado = $this->con->query($query) or die ($this->con->error); //executando Query

		
		return $resultado->num_rows; //retornando quantos usuarios foram encontrados pelo email
	}

	function cadastrar_novoProjeto(){
		$chave_novoProjeto = Array('nome_projeto', 'razao_social', 'nome_fantasia', 'cnpj', 'ie', 'logradouro', 'bairro', 'numero', 'cep', 'municipio', 'estado', 'telefone', 'email', 'cliente_responsavel', 'tel_responsavel', 'dia_inicio', 'dia_fim', 'dia_cobranca', 'forma_pagamento', 'valor_contrato');//Armazenar informações em Array para usar como chave na classe MeuSQL
		$dados_novoProjeto = Array($this->nome_projeto, $this->razao_social, $this->nome_fantasia, $this->cnpj, $this->ie, $this->logradouro, $this->bairro, $this->numero, $this->cep, $this->municipio, $this->estado, $this->telefone, $this->email, $this->cliente_responsavel, $this->telefone_responsavel, $this->dia_inicio, $this->dia_fim, $this->dia_cobranca, $this->forma_pagamento, $this->valor_contrato);//Armazenar informações em Array para alimentar BD
	
		$this->conectarSQL('vincent_project'); //Selecionando Banco de dados e ativar a conexão com o Mysql

		$this->alimentarTabelaID('projetos', $chave_novoProjeto, $dados_novoProjeto); //Alimentando o BD com as informações do novo projeto
		$ultimoId = $this->con->insert_id;
		$this->conectarSQL('vincent_project'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		
		$query = "CREATE TABLE projeto_$ultimoId (id SMALLINT AUTO_INCREMENT, descricao text, usuario varchar(100), data DATETIME, PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci"; //CRIAR TABELA PARA ARMAZENAR LOG DE PROJETO

		$resultado = $this->con->query($query) or die ($this->con->error); //executando Query

		printf ("Projeto Cadastrado com Sucesso de ID %s", $ultimoId);
	}
}

/**
* Classe para apresentar os projetos
*/
class ApresentarProjeto extends MeuSQL
{

	
	function __construct()
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL

	}
	//Função para apresenar projetos na tela inicial
	function MostrarProjetos(){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT id, nome_projeto, razao_social, cnpj, cliente_responsavel, tel_responsavel FROM projetos ORDER BY razao_social";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query

		return $resultado;
	}

	//Função para apresentar todos os dados do projeto para infoProjeto

	function MostrarInfoProjeto($idProjeto){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT * FROM projetos WHERE id='".$idProjeto."'";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query

		return $resultado;
	} 

}

/**
* Classe para mostrar Log de Projeto
*/
class MostrarLog extends MeuSQL
{
	private $id;	
	function __construct($getId)
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->id = $getId;
	}

	function ApresentarLog(){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT id, descricao, usuario, data FROM projeto_".$this->id;
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query

		while ($resultadoArray = $resultado->fetch_array(MYSQLI_ASSOC)) { //retornado dentro da tabelas os nomes dos projetos
			printf ("<tr><td id=''>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $resultadoArray['id'], $resultadoArray['descricao'], $resultadoArray['usuario'], $resultadoArray['data']);
		}
	}
}

/**
* Cadastrar Novo Log do projeto
*/
class CadastrarLog extends MeuSQL
{
	private $id;
	private $descricao;
	private $usuario;
	function __construct($getID, $getDescricaoLog, $getUsuario)
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
		$this->id = $getID;
		$this->descricao = $getDescricaoLog;
		$this->usuario = $getUsuario;
	}

	function CadastrarLog(){
		$this->conectarSQL('vincent_project'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$date = new DateTime();
		$dataAtual = $date->format('Y-m-d H:i:s');
		$query = "INSERT INTO projeto_$this->id (descricao, usuario, data) VALUES ('".$this->descricao."', '".$this->usuario."', '".$dataAtual."')";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
	}
}