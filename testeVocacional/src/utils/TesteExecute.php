<?php
namespace src\utils;

class TesteExecute {
	private $status;
	private $mensagem;
	public function __construct($status, $menssagem) {
		$this->status = $status;
		$this->mensagem = $menssagem;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getMensagem(){
	    return $this->mensagem;
	}
	
	public function jsonSerialize() {
		return get_object_vars($this);
	}
}