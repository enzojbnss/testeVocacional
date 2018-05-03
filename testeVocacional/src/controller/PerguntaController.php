<?php
require_once 'src/dao/PerguntaDao.php';
require_once 'src/utils/Result.php';
require_once 'src/utils/ViewData.php';

use src\dao\PerguntaDao;
use src\utils\Result;
use src\utils\ViewData;

class PerguntaController {
	private $page;
	public function __construct($page) {
		$this->page = $page;
	}
	public function index() {
		$viewData = new ViewData ();
		$idPessoa = isset ( $_SESSION ["idPessoa"] ) ? $_SESSION ["idPessoa"] : 0;
		if ($idPessoa != 0) {
			$viewData->add ( "idPessoa ", $idPessoa );
			$viewData->incorpora ();
			include $this->page->getRaiz ();
		} else {
			echo "<script>window.location= 'home';</script>";
		}
	}
	public function lista() {
		$dao = new PerguntaDao ();
		$lista = $dao->getLista ();
		$dao = null;
		$result = new Result ( $lista );
		$result->useJson ();
	}
	
}