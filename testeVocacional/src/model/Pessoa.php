<?php

namespace src\model;

class Pessoa {
	private $id = "";
	private $nome = "";
	private $sobrenome = "";
	private $email = "";
	private $cpf = "";
	private $celular = "";
	private $telefone = "";
	private $dataNascimento = "";
	public function __construct($id, $nome, $sobrenome, $email, $cpf, $celular, $telefone, $dataNascimento) {
		$this->id = $id;
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->email = $email;
		$this->cpf = $cpf;
		$this->celular = $celular;
		$this->telefone = $telefone;
		$this->dataNascimento = $dataNascimento;
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
	public function getCelular() {
		return $this->celular;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function getDataNascimento() {
		return $this->dataNascimento;
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
	public function setCelular($celular) {
		return $this->celular = $celular;
	}
	public function setTelefone($telefone) {
		return $this->telefone = $telefone;
	}
	public function setDataNascimento($dataNascimento) {
		$this->dataNascimento = $dataNascimento;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __destruct() {
		$this->id = null;
		$this->nome = null;
		$this->sobrenome = null;
		$this->email = null;
		$this->cpf = null;
		$this->celular = null;
		$this->telefone = null;
		$this->dataNascimento = null;
	}
}

