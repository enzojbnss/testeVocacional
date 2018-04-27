<?php

namespace src\model;

class Resposta {
	private $id;
	private $texto;
	private $ativo;
	public function __construct($dados) {
		$this->id = $dados ["id"];
		$this->texto = $dados ["texto"];
		$this->ativo = $dados ["ativo"];
	}
	public function getId() {
		return $this->id;
	}
	public function getTexto() {
		return $this->texto;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setTexto($texto) {
		$this->texto = $texto;
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	function __destruct() {
		$this->id = null;
		$this->texto = null;
		$this->ativo = null;
	}
}

