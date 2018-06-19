<?php
require_once 'src/dao/PessoaDao.php';
require_once 'src/model/Pessoa.php';
require_once 'src/utils/Result.php';
require_once 'src/utils/TesteExecute.php';
use src\dao\PessoaDao;
use src\model\Pessoa;
use src\utils\Result;
use src\utils\TesteExecute;
class PessoaController {
	public function add() {
		$dao = new PessoaDao ();
		$pessoa = new Pessoa ( $_POST ["id"], $_POST ["nome"], $_POST ["sobrenome"], $_POST ["email"], $_POST ["cpf"], $_POST ["celular"], $_POST ["telefone"], $_POST ["dataNascimento"] );
		$qtd = $dao->existe ( $pessoa );
		if ($qtd > 0) {
			$teste = new TesteExecute ( true, $qtd );
		} else {
			$teste = $dao->incluir ( $pessoa, $_POST ["aceite"] );
		}
		if ($teste->getStatus()) {
			try {
				$idPessoa = $dao->getID ( $pessoa );
				if ($idPessoa > 0) {
					$_SESSION ["idPessoa"] = $idPessoa;
				} else {
					$_SESSION ["idPessoa"] = 0;
				}
			} catch ( Exception $e ) {
				$idPessoa = 0;
			}
		}
		$teste = new TesteExecute ( true, $qtd );
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleJson ( $teste );
	}
}