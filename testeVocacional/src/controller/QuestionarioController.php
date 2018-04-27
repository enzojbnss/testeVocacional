<?php
require_once 'src/dao/QuestionarioDao.php';
require_once 'src/utils/Result.php';
use src\dao\QuestionarioDao;
use src\utils\Result;
class QuestionarioController {
	public function add() {
		$idPessoa = $_POST ["idPessoa"];
		$dao = new QuestionarioDao ();
		$teste = $dao->inativaAnteriores ( $idPessoa );
		$teste = $dao->incluir ( $idPessoa );
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleJson ( $teste );
	}
	
	public function getID() {
		$dao = new QuestionarioDao ();
		$id = $dao->getID ();
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleData( $id );
	}
}