<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/model/Area.php';
use \PDO;
use src\database\Banco;
use src\model\Area;

class AreaDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function getListaDiponiveis($idQuestionario) {
		$sql = "SELECT idArea id, descricao, ativo  FROM vwareasdisponiveis where idQuestionario = ? and peso > 0; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idQuestionario, PDO::PARAM_INT );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	private function geraLista($dados) {
		$lista = [ ];
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $lista, new Area ( $dados ) );
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