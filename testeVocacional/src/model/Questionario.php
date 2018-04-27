<?php

namespace src\model;

class Questionario {
	private $id;
	private $perguntas;
	private $data;
	private $ativo;
	public function __construct($id, $data, $ativo, $perguntas) {
		$this->id = $id;
		$this->data = $data;
		$this->ativo = $ativo;
		$this->perguntas = $perguntas;
	}
	public function getId() {
		return $this->id;
	}
	public function getData() {
		return $this->data;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function getPerguntas() {
		return $this->perguntas;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setData($data) {
		return $this->data = $data;
	}
	public function setAtivo($ativo) {
		return $this->ativo = $ativo;
	}
	public function setPerguntas($perguntas) {
		$this->perguntas = $perguntas;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	function __destruct() {
		$this->id = null;
		$this->data = null;
		$this->ativo = null;
		$this->perguntas = null;
	}
}

