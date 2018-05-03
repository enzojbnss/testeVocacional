<?php

namespace src\dao;

require_once 'src/database/Banco.php';
require_once 'src/model/Pergunta.php';
use src\database\Banco;
use src\model\Pergunta;

class PerguntaDao {
	private $banco, $connection;
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	public function getLista() {
		$sql = "SELECT idPergunta id, texto, ativo FROM pergunta";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->execute ();
		$dados = $recordSet->fetchAll ();
		return $this->geraLista ( $dados );
	}
	
	private function geraLista($dados) {
		$lista = [ ];
		if (is_array ( $dados )) {
			foreach ( $dados as $indexLinha => $valorLInha ) {
				if (is_array ( $valorLInha )) {
					array_push ( $lista, new Pergunta ( $valorLInha ) );
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

