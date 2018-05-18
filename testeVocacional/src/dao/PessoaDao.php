<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/model/Pessoa.php';
require_once 'src/utils/TesteExecute.php';
use \PDO;
use src\database\Banco;
use src\model\Pessoa;
use src\utils\TesteExecute;

class PessoaDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function incluir(Pessoa $pessoa, $aceite) {
		$mensagem = "";
		$nome = $pessoa->getNome ();
		$sobrenome = $pessoa->getSobrenome ();
		$email = $pessoa->getEmail ();
		$cpf = $pessoa->getCpf ();
		$sexo = $pessoa->getSexo ();
		$dataNascimento = $pessoa->getDataNascimento ();
		if ($dataNascimento == "nf") {
			$sql = "INSERT INTO pessoa (nome,sobrenome,email,cpf,sexo,aceite) VALUES (?,?,?,?,?,?);";
		} else {
			$sql = "INSERT INTO pessoa (nome,sobrenome,email,cpf,sexo,aceite,dataNascimento) VALUES (?,?,?,?,?,?,?);";
		}
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $nome, PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $sobrenome, PDO::PARAM_STR );
		$recordSet->bindParam ( 3, $email, PDO::PARAM_STR );
		$recordSet->bindParam ( 4, $cpf, PDO::PARAM_STR );
		$recordSet->bindParam ( 5, $sexo, PDO::PARAM_STR );
		$recordSet->bindParam ( 6, $aceite, PDO::PARAM_STR );
		if ($dataNascimento != "nf") {
			$recordSet->bindParam ( 7, $dataNascimento, PDO::PARAM_STR );
		}
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "cadastro gravado com sucesso!";
		} else {
			$mensagem = "falha ao gravar o cadastro!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function getID(Pessoa $pessoa) {
		$nome = $pessoa->getNome ();
		$sobrenome = $pessoa->getSobrenome ();
		$email = $pessoa->getEmail ();
		$cpf = $pessoa->getCpf ();
		$sexo = $pessoa->getSexo ();
		$dataNascimento = $pessoa->getDataNascimento ();
		$sql = "SELECT idpessoa valor FROM pessoa where nome = ? and sobrenome  = ? and   email = ? and   cpf = ? and   sexo = ? ";
		if ($dataNascimento != "nf") {
			$sql .= "and   dataNascimento = ?  ;";
		} else {
			$sql .= "  ;";
		}
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $nome, PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $sobrenome, PDO::PARAM_STR );
		$recordSet->bindParam ( 3, $email, PDO::PARAM_STR );
		$recordSet->bindParam ( 4, $cpf, PDO::PARAM_STR );
		$recordSet->bindParam ( 5, $sexo, PDO::PARAM_STR );
		if ($dataNascimento != "nf") {
			$recordSet->bindParam ( 6, $dataNascimento, PDO::PARAM_STR );
		}
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraValor ( $dados );
	}
	public function existe(Pessoa $pessoa) {
		$nome = $pessoa->getNome ();
		$sobrenome = $pessoa->getSobrenome ();
		$email = $pessoa->getEmail ();
		$cpf = $pessoa->getCpf ();
		$sexo = $pessoa->getSexo ();
		$dataNascimento = $pessoa->getDataNascimento ();
		$sql = "SELECT count(*) valor FROM pessoa where nome = ? and sobrenome  = ? and   email = ? and   cpf = ? and   sexo = ? ";
		if ($dataNascimento != "nf") {
			$sql .= "and   dataNascimento = ?  ;";
		} else {
			$sql .= "  ;";
		}
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $nome, PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $sobrenome, PDO::PARAM_STR );
		$recordSet->bindParam ( 3, $email, PDO::PARAM_STR );
		$recordSet->bindParam ( 4, $cpf, PDO::PARAM_STR );
		$recordSet->bindParam ( 5, $sexo, PDO::PARAM_STR );
		if ($dataNascimento != "nf") {
			$recordSet->bindParam ( 6, $dataNascimento, PDO::PARAM_STR );
		}
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraValor ( $dados );
	}
	private function geraValor($dados) {
		$valor = "";
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					$valor = $valorLInha ["valor"];
				}
			}
		}
		return $valor;
	}
	public function __destruct() {
		$this->connection = null;
		$this->banco = null;
	}
}