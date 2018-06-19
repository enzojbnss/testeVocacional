<?php

namespace src\view;

class Page {
	private $raiz;
	private $corpo;
	private $controller;
	private $action;
	private $request;
	public function __construct($request, $base = "Layout.php") {
		$logado = false;
		$url = explode ( "/", $request ["url"] );
		if ($url [0]== "login" ) {
			if (isset ( $_SESSION ["login"] )) {
				if ($_SESSION ["login"] == true) {
					$logado = true;
				} else {
					$logado = false;
				}
			}
		}
		if ($logado == false) {
			$request ["url"] = "login/index";
		}
		if (sizeof ( $request ) == 0) {
			$request ["url"] = "home/index";
		}
		$url = explode ( "/", $request ["url"] );
		$folder = $url [0];
		if ($url [0] == null)
			$folder = "home";
		$className = strtoupper ( substr ( $folder, 0, 1 ) ) . substr ( $folder, 1 );
		if (count ( $url ) > 1) {
			$actionName = $url [1];
		} else {
			$actionName = "index";
		}
		$this->corpo = "src/view/" . $folder . "/" . $actionName . ".php";
		if ($base == null)
			$this->raiz = $this->corpo;
		else
			$this->raiz = "src/view/" . $base;
		$this->controller = $className;
		$this->action = $actionName;
	}
	public function getRaiz() {
		return $this->raiz;
	}
	public function getCorpo() {
		return $this->corpo;
	}
	public function getController() {
		return $this->controller;
	}
	public function getAction() {
		return $this->action;
	}
	public function getRequest() {
		return $this->request;
	}
	public function getParam($paramName) {
		return $this->request [$paramName];
	}
	public function getParamJSon($paramName) {
		$param = $this->request [$paramName];
		return json_decode ( $param );
	}
	public function setRaiz($raiz) {
		$this->raiz = "src/view/" . $raiz;
	}
}