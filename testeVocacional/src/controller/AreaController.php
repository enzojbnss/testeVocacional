<?php
require_once 'src/dao/AreaDao.php';
require_once 'src/utils/Result.php';
use src\dao\AreaDao;
use src\utils\Result;

class AreaController{
	
	public function lista() {
		$dao = new AreaDao();
		$lista = $dao->getListaDiponiveis($_POST["idQuestionario"]);
		$dao = null;
		$result = new Result( $lista );
		$_SESSION ["idPessoa"] = 0;
		$result->useJson ();
	}
}