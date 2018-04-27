<?php

namespace src\model;

class Pessoa {
	private $id = "";
	private $nome = "";
	private $sobrenome = "";
	private $email = "";
	private $cpf = "";
	private $sexo = "";
	public function __construct($id, $nome, $sobrenome, $email, $cpf, $sexo) {
		$this->id = $id;
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->email = $email;
		$this->cpf = $cpf;
		$this->sexo = $sexo;
	}
	public function getId() {
		return $this->id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getSobrenome() {
		return $this->sobrenome;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function getSexo() {
		return $this->sexo;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setSobrenome($sobrenome) {
		$this->sobrenome = $sobrenome;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __destruct(){
		$this->id = null;
		$this->nome = null;
		$this->sobrenome = null;
		$this->email = null;
		$this->cpf = null;
		$this->sexo = null;
	}
	
}

