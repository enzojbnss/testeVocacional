<?php

namespace src\utils;

class ViewData {
	private $itens = [ ];
	private $valores = [ ];
	public function add($item, $valor) {
		array_push ( $this->itens, $item );
		array_push ( $this->valores, $valor );
	}
	public function incorpora() {
		echo '<script type="text/javascript">';
		$index = count ( $this->itens );
		for($i = 0; $i < $index; $i ++) {
			echo " var " . $this->itens [$i] . " = " . $this->valores [$i] . ";";
		}
		echo '</script >';
	}
}