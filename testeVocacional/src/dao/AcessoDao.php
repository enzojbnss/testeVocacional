<?php
namespace src\dao;

require_once 'src/database/Banco.php';
use \PDO;
use src\database\Banco;

class AcessoDao {
     
	public function __construct() {
		$this->banco = new Banco ();
		$this->connection = $this->banco->conectar ( $this->banco );
	}
	
	public function logar($login,$Senha) {
		$sql = "SELECT  count(distinct login ) valor FROM vwacesso ";
		$sql .= "WHERE login = ? AND senha = ?; ";
		$recordSet = $this->connection->prepare ( $sql );
		$recordSet->bindParam ( 1, $idPergunta, PDO::PARAM_STR );
		$recordSet->bindParam ( 2, $idQuestionario, PDO::PARAM_STR );
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
