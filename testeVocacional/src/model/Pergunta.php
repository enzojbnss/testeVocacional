<?php

namespace src\model;

class Pergunta {
	private $id;
	private $texto;
	private $ativo;
	private $respostas;
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
	public function getRespostas() {
		return $this->respostas;
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
	public function setRespostas($respostas) {
		$this->respostas = $respostas;
	}
	
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	
	public function __destruct() {
		$this->id = null;
		$this->texto = null;
		$this->ativo = null;
	}
	
	function logMe($msg){
		// Abre ou cria o arquivo bloco1.txt
		// "a" representa que o arquivo é aberto para ser escrito
		$fp = fopen("log.txt", "a");
	
		// Escreve a mensagem passada através da variável $msg
		$escreve = fwrite($fp, $msg);
	
		// Fecha o arquivo
		fclose($fp); 
	}
}

