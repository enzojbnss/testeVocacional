<?php

require_once 'src/view/Page.php';
require_once 'src/dao/AcessoDao.php';
use src\dao\AcessoDao;
use src\utils\Result;
class LoginController {
	private $page;
	public function __construct($page) {
		$this->page = $page;
	}
	public function index() {
		$this->page->setRaiz("LayoutLogin.php");
		include $this->page->getRaiz ();
	}
	
	public function logar(){
		$dao = new AcessoDao();
		$qtd = $dao->logar($_POST["login"], $_POST["senha"]);
		if($qtd > 0){
			$_SESSION["logado"] = true;
		}else{
			$_SESSION["logado"] = false;
		}
		$result = new Result( [] );
		$result->useSimpleData($_SESSION["logado"]);
	}
}