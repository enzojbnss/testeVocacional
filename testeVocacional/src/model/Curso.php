<?php

namespace src\model;

class Curso {
	private $id;
	private $nome;
	private $tipoCurso;
	public function __construct($id, $nome, $tipoCurso) {
		$this->id = $id;
		$this->nome = $nome;
		$this->tipoCurso = $tipoCurso;
	}
	public function getId() {
		return $this->id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getTipoCurso() {
		return $this->tipoCurso;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setTipoCurso($tipoCurso) {
		$this->tipoCurso = $tipoCurso;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	function __destruct() {
		$this->id = null;
		$this->nome = null;
		$this->tipoCurso = null;
	}
}

