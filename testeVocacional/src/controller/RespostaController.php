<?php
require_once 'src/dao/RespostaDao.php';
require_once 'src/utils/Result.php';
use src\utils\Result;
use src\dao\RespostaDao;
class RespostaController {
	public function add() {
		$dao = new RespostaDao();
		$teste = $dao->incluir ( $_POST ["idQuestionario"], $_POST ["idResposta"] );
		$dao = null;
		$result = new Result( [] );
		$result->useSimpleJson($teste);
	}
	
	public function getID() {
		$dao = new RespostaDAO();
		$id = $dao->getID ($_POST ["idPergunta"],$_POST ["idResposta"]);
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleData( $id );
	}
	
}