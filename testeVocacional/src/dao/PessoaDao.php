<?php

namespace src\dao;

require_once 'database/Banco.php';
require_once 'model/Pessoa.php';
use \PDO;
use src\database\Banco;
use src\model\Pessoa;

class PessoaDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function incluir(Pessoa $pessoa) {
		$mensagem = "";
		$sql = "INSERT INTO pessoa (nome,sobrenome,email,cpf,sexo) VALUES (?,?,?,?,?);";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $pessoa->getNome (), PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $pessoa->getSobrenome (), PDO::PARAM_STR );
		$recordSet->bindParam ( 3, $pessoa->getEmail (), PDO::PARAM_STR );
		$recordSet->bindParam ( 4, $pessoa->getCpf (), PDO::PARAM_STR );
		$recordSet->bindParam ( 5, $pessoa->getSexo (), PDO::PARAM_STR );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "cadastro gravado com sucesso!";
		} else {
			$mensagem = "falha ao gravar o cadastro!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function getID(Pessoa $pessoa) {
		$sql = "SELECT idpessoa FROM pessoa where nome = ? and sobrenome  = ? and   email = ? and   cpf = ? and   sexo = ? ;";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $pessoa->getNome (), PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $pessoa->getSobrenome (), PDO::PARAM_STR );
		$recordSet->bindParam ( 3, $pessoa->getEmail (), PDO::PARAM_STR );
		$recordSet->bindParam ( 4, $pessoa->getCpf (), PDO::PARAM_STR );
		$recordSet->bindParam ( 5, $pessoa->getSexo (), PDO::PARAM_STR );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraValor ( $dados );
	}
	private function geraValor($dados) {
		$valor = "";
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					$valor = $valorLInha ["idpessoa"];
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