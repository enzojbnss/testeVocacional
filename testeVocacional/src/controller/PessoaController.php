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
		$pessoa = new Pessoa ( $_POST ["id"], $_POST ["nome"], $_POST ["sobrenome"], $_POST ["email"], $_POST ["cpf"], $_POST ["sexo"], $_POST ["dataNascimento"] );
		if ($dao->existe ( $pessoa ) == false) {
			$teste = $dao->incluir ( $pessoa );
		}else{
			$teste = new TesteExecute( true, "cadastro gravado com sucesso!" );
		}
		if ($teste) {
			try {
				$idPessoa = $dao->getID ( $pessoa );
				if ($idPessoa > 0) {
					$_SESSION ["idPessoa"] = $idPessoa;
				}else {
					$_SESSION ["idPessoa"] = 0;
				}
			} catch ( Exception $e ) {
				$idPessoa = 0;
			}
		}
		$dao = null;
		$result = new Result ( [ ] );
		$result->useSimpleJson ( $teste );
	}
}