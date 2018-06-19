<?php
require_once 'src/dao/RespostaDao.php';
require_once 'src/utils/Result.php';
use src\utils\Result;
use src\dao\RespostaDao;
class RespostaController {
	public function add() {
		$idPergunta = $_POST ["idPergunta"];
		$idQuestionario = $_POST ["idQuestionario"];
		$idResposta = $_POST ["idResposta"];
		$dao = new RespostaDao ();
		$existe = $dao->existe ( $idPergunta, $_POST ["idQuestionario"] );
		$teste = "";
		if ($existe > 0) {
			$idRespostaQuestionario = $dao->getIDRespotaQuestionario ( $idPergunta, $idQuestionario );
			$teste = $dao->alterar ( $idQuestionario, $idRespostaQuestionario );
		} else {
			$teste = $dao->incluir ( $_POST ["idQuestionario"], $_POST ["idResposta"] );
		}
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleJson ( $teste );
	}
	public function getID() {
		$dao = new RespostaDAO ();
		$id = $dao->getID ( $_POST ["idPergunta"], $_POST ["idResposta"] );
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleData ( $id );
	}
}