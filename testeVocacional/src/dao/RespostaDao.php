<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/model/Resposta.php';
require_once 'src/utils/TesteExecute.php';
use \PDO;
use src\database\Banco;
use src\model\Resposta;
use src\utils\TesteExecute;

class RespostaDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function getListaPerguntas($idPergunta) {
		$sql = "SELECT id, texto, ativo  FROM vwrespostapergunta where idPergunta = ?; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idPergunta, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	public function getListaQuestionario($idQuestionario) {
		$sql = "SELECT id, texto, ativo  FROM vwrespostaquestionario where idQuestionario = ?; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idQuestionario, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	public function incluir($idQuestionario, $idResposta) {
		$mensagem = "";
		$sql = "INSERT INTO `respotaquestionario` (`idQuestionario`,`idPerguntaRespota`) VALUES (?,?)";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idQuestionario, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idResposta, PDO::PARAM_INT );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "respota gravada com sucesso!";
		} else {
			$mensagem = "falha ao gravar a resposta!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function getID($idPergunta,$idResposta) {
		$sql = "SELECT idPerguntaRespota valor FROM testevocacional.perguntarespota where idPergunta = ? and idResposta = ? ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idPergunta, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idResposta, PDO::PARAM_INT );
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
	private function geraLista($dados) {
		$lista = [ ];
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $lista, new Resposta ( $valorLInha ) );
				}
			}
		}
		return $lista;
	}
	public function __destruct() {
		$this->connection = null;
		$this->banco = null;
	}
}

