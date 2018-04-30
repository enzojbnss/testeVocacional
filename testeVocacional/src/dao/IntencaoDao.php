<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/model/Resposta.php';
require_once 'src/utils/TesteExecute.php';
use \PDO;
use src\database\Banco;
use src\utils\TesteExecute;
use src\model\Intencao;

class IntencaoDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function getListaDiponiveisRelevantes($idQuestionario, $idResposta) {
		$sql = "SELECT distinct idIntencao, texto, ativo,count(idIntencao) peso FROM intencao ";
		$sql .= "inner join vwquetionariointencao using(idIntencao) ";
		$sql .= "where idresposta = ? and idQuestionario = ? ";
		$sql .= "group by idIntencao having peso = ";
		$sql .= "(SELECT max(peso) from ";
		$sql .= "  (SELECT distinct count(idIntencao) peso FROM intencao ";
		$sql .= "		inner join vwquetionariointencao using(idIntencao) ";
		$sql .= "		where idresposta = ? and idQuestionario = ? ";
		$sql .= "	    group by idIntencao) pesos); ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idQuestionario, PDO::PARAM_INT );
		$recordSet->bindParam ( 3, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 4, $idQuestionario, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	public function getListaDiponiveis($idQuestionario, $idResposta) {
		$sql = "SELECT distinct idIntencao, texto, ativo,count(idIntencao) peso FROM intencao ";
		$sql .= "inner join vwquetionariointencao using(idIntencao) ";
		$sql .= "where idresposta = ? and idQuestionario = ? ";
		$sql .= "group by idIntencao having peso = ";
		$sql .= "(SELECT max(peso) from ";
		$sql .= "  (SELECT distinct count(idIntencao) peso FROM intencao ";
		$sql .= "		inner join vwquetionariointencao using(idIntencao) ";
		$sql .= "		where idresposta = ? and idQuestionario = ? ";
		$sql .= "	    group by idIntencao) pesos); ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idQuestionario, PDO::PARAM_INT );
		$recordSet->bindParam ( 3, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 4, $idQuestionario, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	public function getPeso($idQuestionario, $idResposta) {
		$sql = " SELECT max(peso) from ";
		$sql .= "  (SELECT distinct count(idIntencao) peso FROM intencao ";
		$sql .= "		inner join vwquetionariointencao using(idIntencao) ";
		$sql .= "		where idresposta = ? and idQuestionario = ? ";
		$sql .= "	    group by idIntencao) pesos; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idQuestionario, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	public function incluir($idQuestionario, $idIntencao, $peso) {
		$mensagem = "";
		$sql = "INSERT INTO `questionariointencao` (`idQuestionario`,`idIntencao`) VALUES (?,?,?);";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idQuestionario, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idResposta, PDO::PARAM_INT );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "Intenção regitada com sucesso!";
		} else {
			$mensagem = "falha ao registrar intenção!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	public function incluirAutomaticamente($idQuestionario, $idResposta) {
		$mensagem = "";
		$teste = false;
		$sql = "INSERT INTO `questionariointencao` (`idQuestionario`,`idIntencao`,`peso`) ";
		$sql .= "SELECT DISTINCT idQuestionario,idIntencao,count(idIntencao) peso FROM intencao ";
		$sql .= "INNER JOIN vwquetionariointencao using(idIntencao) ";
		$sql .= "WHERE idresposta = ? AND idQuestionario = ? GROUP BY idIntencao; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idResposta, PDO::PARAM_INT );
		$recordSet->bindParam ( 2, $idQuestionario, PDO::PARAM_INT );
		$teste = $recordSet->execute ();
		if ($teste) {
			$mensagem = "Intenção regitada com sucesso!";
		} else {
			$mensagem = "falha ao registrar intenção!";
		}
		return new TesteExecute ( $teste, $mensagem );
	}
	private function geraLista($dados) {
		$lista = [ ];
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $lista, new Intencao ( $dados ) );
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

