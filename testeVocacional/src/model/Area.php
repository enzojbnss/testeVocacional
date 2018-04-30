<?php

namespace src\model;

class Area {
	private $id;
	private $descricao;
	private $ativo;
	private $cursos;
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
	public function getCursos() {
		return $this->cursos;
	}
	public function getPerguntas() {
		return $this->perguntas;
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
	public function setCursos($cursos) {
		$this->cursos = $cursos;
	}
	public function setPerguntas($perguntas) {
		$this->perguntas = $perguntas;
	}
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
	
	function __destruct() {
		$this->id = null;
		$this->descricao = null;
		$this->ativo = null;
	}
}

