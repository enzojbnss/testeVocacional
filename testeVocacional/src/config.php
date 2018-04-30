<?php
$autoIntencao = true;
function getConfig($opcao) {
	$config = [ ];
	$config ["autoIntencao"] = true;
	$config ["idResposta"] = 1;
	return $config [$opcao];
}