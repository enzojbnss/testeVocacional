<?php

namespace src\model;

class TipoCurso {
	private $id;
	private $descricao;
	private $ativo;
	public function __construct($dados) {
		$this->id = $dados ["id"];
		$this->descricao = $dados ["descricao"];
		$this->ativo = $dados ["ativo"];
	}
	public function getId() {
		return $this->id;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	function __destruct() {
		$this->id = null;
		$this->descricao = null;
		$this->ativo = null;
	}
}

