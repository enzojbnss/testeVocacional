<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/utils/TesteExecute.php';
use \PDO;
use src\database\Banco;
use src\utils\TesteExecute;

class QuestionarioDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function incluir($idPessoa) {
		$mensagem = "";
		$sql = "INSERT INTO questionario (`idPessoa`) VALUES (?);";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idPessoa, PDO::PARAM_INT );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "cadastro gravado com sucesso!";
		} else {
			$mensagem = "falha ao gravar o cadastro!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function inativaAnteriores($idPessoa) {
		$mensagem = "";
		$sql = "UPDATE questionario  SET `ativo` = 'n' WHERE `idPessoa` = ? ;";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idPessoa, PDO::PARAM_INT );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "cadastro gravado com sucesso!";
		} else {
			$mensagem = "falha ao gravar o cadastro!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function getID() {
		$sql = "SELECT idQuestionario valor FROM questionario where ativo = 's';";
		$recordSet = $this->connection->prepare ( $sql );
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