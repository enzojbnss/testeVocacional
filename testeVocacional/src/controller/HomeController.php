<?php
require_once 'src/view/Page.php';
class HomeController {
	private $page;
	public function __construct($page) {
		$this->page = $page;
	}
	public function index() {
		// $this->page->setRaiz("LayoutAdm.php");
		$_SESSION ["idPessoa"] = 0;
		include $this->page->getRaiz ();
	}
}
