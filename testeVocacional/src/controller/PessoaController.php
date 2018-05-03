<?php
require_once 'src/dao/PessoaDao.php';
require_once 'src/model/Pessoa.php';
require_once 'src/utils/Result.php';
use src\dao\PessoaDao;
use src\model\Pessoa;
use src\utils\Result;
class PessoaController {
	public function add() {
		$dao = new PessoaDao();
		$pessoa = new Pessoa ( $_POST ["id"], $_POST ["nome"], $_POST ["sobrenome"], $_POST ["email"], $_POST ["cpf"], $_POST ["sexo"],$_POST ["dataNascimento"] );
		$teste = $dao->incluir($pessoa);
		if($teste){
			try {
				$idPessoa = $dao->getID($pessoa);
				if($idPessoa > 0){
					$_SESSION ["idPessoa"] = $idPessoa;
				}
			} catch (Exception $e) {
				$idPessoa = 0;
			}
		}
		$dao = null;
		$result = new Result( [ ] );
		$result->useSimpleJson ( $teste );
	}
}