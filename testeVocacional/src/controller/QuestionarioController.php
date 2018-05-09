<?php
require_once 'src/dao/QuestionarioDao.php';
require_once 'src/utils/Result.php';
require_once 'src/dao/IntencaoDao.php';
require_once 'src/config.php';
use src\dao\IntencaoDao;
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
	
	public function encerraQuestionario() {
		$teste = getConfig ( "autoIntencao" );
		$idResposta = getConfig("idResposta"); 
		if($teste){
			$dao = new IntencaoDao();
			$teste = $dao->incluirAutomaticamente($_POST["idQuestionario"], $idResposta);
			$result = new Result ( [] );
			$result->useSimpleJson($teste);
		}
	}
}