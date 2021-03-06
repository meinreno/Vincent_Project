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
		
		$this->conectarSQL('royal210_vincentProject'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT cnpj FROM projetos WHERE cnpj='".$cnpj_Busca."'"; //query para verificar a existencia de usuario pelo email
		$resultado = $this->con->query($query) or die ($this->con->error); //executando Query

		
		return $resultado->num_rows; //retornando quantos usuarios foram encontrados pelo email
	}

	function cadastrar_novoProjeto(){
		$chave_novoProjeto = Array('nome_projeto', 'razao_social', 'nome_fantasia', 'cnpj', 'ie', 'logradouro', 'bairro', 'numero', 'cep', 'municipio', 'estado', 'telefone', 'email', 'cliente_responsavel', 'tel_responsavel', 'dia_inicio', 'dia_fim', 'dia_cobranca', 'forma_pagamento', 'valor_contrato', 'status');//Armazenar informações em Array para usar como chave na classe MeuSQL
		$dados_novoProjeto = Array($this->nome_projeto, $this->razao_social, $this->nome_fantasia, $this->cnpj, $this->ie, $this->logradouro, $this->bairro, $this->numero, $this->cep, $this->municipio, $this->estado, $this->telefone, $this->email, $this->cliente_responsavel, $this->telefone_responsavel, $this->dia_inicio, $this->dia_fim, $this->dia_cobranca, $this->forma_pagamento, $this->valor_contrato, 1);//Armazenar informações em Array para alimentar BD
	
		$this->conectarSQL('royal210_vincentProject'); //Selecionando Banco de dados e ativar a conexão com o Mysql

		$this->alimentarTabelaID('projetos', $chave_novoProjeto, $dados_novoProjeto); //Alimentando o BD com as informações do novo projeto
		$ultimoId = $this->con->insert_id;
		$this->conectarSQL('royal210_vincentProject'); //conexão com o BD
		$this->con->query("SET NAMES 'utf8'");
		
		$query = "CREATE TABLE projeto_$ultimoId (id SMALLINT AUTO_INCREMENT, titulo text, log text, usuario varchar(100), data DATETIME, PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci"; //CRIAR TABELA PARA ARMAZENAR LOG DE PROJETO

		$resultado = $this->con->query($query) or die ($this->con->error); //executando Query

		return ($ultimoId);
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
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT id, nome_projeto, razao_social, cnpj, cliente_responsavel, tel_responsavel FROM projetos WHERE status=1 ORDER BY razao_social";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query

		return $resultado;
	}

	//Função para apresentar todos os dados do projeto para infoProjeto

	function MostrarInfoProjeto($idProjeto){
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
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
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
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
class LogTools extends MeuSQL
{
	
	function __construct()
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
	}

	function CadastrarLog($id, $titulo, $descricaoLog){
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$date = new DateTime();
		$descricaoLog = nl2br($descricaoLog);
		$dataAtual = $date->format('Y-m-d H:i:s');
		$query = "INSERT INTO projeto_$id (titulo, log, usuario, data) VALUES ('".$titulo."', '".$descricaoLog."', '".$_COOKIE['emailUsuario']."', '".$dataAtual."')";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
		return 0;
	}

	function ExibirLogs($idProjeto){
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "SELECT * FROM projeto_$idProjeto ORDER BY  data DESC";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
		return $resultado;
	}


	function NovaDataHora($velhaDataHora){
		$dataLog = substr($velhaDataHora, 0, 10);
		$horaLog = substr($velhaDataHora, 11, 18);
		$dataLog = explode('-', $dataLog, 3);
		//$horaLog = explode(':', $horaLog, 3);
		$novaDataHora = $dataLog[2]."/".$dataLog[1]."/".$dataLog[0]." ".$horaLog;
		return($novaDataHora);
	}
}

/**
* Classe com ferramentas para Proejtos
*/
class ProjetoTools extends MeuSQL
{
	
	function __construct()
	{
		parent::__construct('localhost', 'root', '1234'); //Função construtor do MeuSQL
	}

	function ExcluirProjeto($idProjeto){
		$this->conectarSQL('royal210_vincentProject'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "UPDATE projetos SET status=0 WHERE id=$idProjeto";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
		echo json_encode("Projeto Excluido com Sucesso, caso tenha apagado por engano, ligue para o Gabriel (11)94712-6466");
	}
	
	function salvarEditarProjeto($getId, $getNome_Projeto, $getRazao_Social, $getNome_Fantasia, $getCnpj, $getIe, $getLogradouro, $getBairro, $getNumero, $getCep, $getMunicipio, $getEstado, $getTelefone, $getEmail, $getCliente_Responsavel, $getTelefone_Responsavel, $getDia_Inicio, $getDia_Fim, $getDia_Cobranca, $getForma_Pagamento, $getValor_Contrato){

		$this->conectarSQL('royal210_vincentProject'); //conexão BD
		$this->con->query("SET NAMES 'utf8'");
		$query = "UPDATE projetos SET nome_projeto = '".$getNome_Projeto."', razao_social = '".$getRazao_Social."', nome_fantasia = '".$getNome_Fantasia."', cnpj = '".$getCnpj."', ie = '".$getIe."', logradouro = '".$getLogradouro."', bairro = '".$getBairro."', numero = '".$getNumero."', cep = '".$getCep."', municipio = '".$getMunicipio."', estado = '".$getEstado."', telefone = '".$getTelefone."', email = '".$getEmail."', cliente_responsavel = '".$getCliente_Responsavel."', tel_responsavel = '".$getTelefone_Responsavel."', dia_inicio = '".$getDia_Inicio."', dia_fim = '".$getDia_Fim."', dia_cobranca = '".$getDia_Cobranca."', forma_pagamento = '".$getForma_Pagamento."', valor_contrato = '".$getValor_Contrato."' WHERE id=$getId";
		$resultado = $this->con->query($query) or die ($this->con->error); //Executando query
		echo json_encode("Projeto Atualizado com sucesso");


	}
}
