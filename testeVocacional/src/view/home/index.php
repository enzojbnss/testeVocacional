<style>
#tela {
	font-family: Verdana Regular;
	position: relative;
	top: 5%;
	background: transparent;
	opacity: 0.55:;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border-radius: 7px;
}

.jumbotron {
	background: #a7c7dc;
	text-align: center;
	font-size: 1.7em;
	width: 100%;
	height: 650px;
	margin-left: 0%;
	opacity: 0.55;
}

.jumbotron 	img {
	width: 6%;
}

@media (max-width: 800px) {
	.jumbotron {
	    height: 750px;
	}
	.jumbotron 	img {
		width: 3%;
	}
}

.jumbotron 	img:active {
	position: relative;
	padding: 10px;
}

.jumbotron 	input {
	font-family: Verdana Regular;
}

.pergunta {
	margin-top: 20%;
	font-size: 2em;
}

.form-group {
	margin-bottom: 30px;
	font-family: Verdana Regular;
	font-size: 0.8em
}

.form-horizontal h4 {
	margin-bottom: 30px;
}

.col-md-12 button {
	font-size: 16px;
	text-indent: 2px;
}

.imgchkbox {
	position: relative;
	height: 4%
}

#txtTitulo {
	font-family: Verdana Bold;
	font-weight: lighter;
	font-size: 1.7em;
}

.imgOptBox {
	position: relatiove;
	width: 6%;
}
</style>
<script type="text/javascript" src="js//jquery/jquery.mask.js"></script>
<script type="text/javascript" src="js/service/PessoaService.js"></script>
<script type="text/javascript" src="js/componente/control/CheckBox.js"></script>
<script type="text/javascript" src="js/app/home/index.js"></script>
<div class="container" id="tela">
	<div class="jumbotron"
		style="background-color: #FFFFFF; opacity: 0.8; margin-top: 28px; padding-top: 28px;">
		<div class="form-horizontal">
			<h4>
				<label id="txtTitulo">Cadastro de participante</label>
			</h4>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						required="required" size="45" maxlength="70" placeholder="*Nome"
						data-bind="value: nome" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtSobrenome" type="text" class="form-control"
						id="txtSobrenome" required="required" size="45" maxlength="70"
						placeholder="Sobrenome" data-bind="value: sobrenome" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-md-6">
					<input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="*Email"
						style="margin-top: 12px;" data-bind="value: email" />
				</div>
				<div class="col-sm-4 col-md-3"
					style="font-family: Verdana Regular; font-size: 0.8em; margin-top: 12px; font-weight: normal;">
					Data de nascimento</div>
				<div class="col-sm-4 col-md-3" >
					<input title="Data de nascimento" id="txtDataNascimento"
						class="form-control" type="date" data-bind="value: dataNascimento" min="1918-12-31" max="2004-12-31"   />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12 col-md-6">
					<input name="txtCpf" type="text" class="form-control" id="txtCpf"
						size="50" maxlength="60" placeholder="CPF" data-bind="value: Cpf" />
				</div>
				<div class="col-sm-12 col-md-6" style="opacity: 0;">
					<div class="checkbox">
						<label for="optTermo" style="font-size: 0.8em;"><input
							id="optTermo" type="checkbox"
							style="width: 15px; height: 15px; top: 12px;" />Aceito receber
							ofertas de cursos do Senac - SP</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="font-weight: normal;">
					<br>Sexo:
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="form-group">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div class="checkbox">
						<img class="imgOptBox" id="optMasculino" alt=""
							src="img/chkBranco.png"> <label for="optMasculino">Masculino</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<img class="imgOptBox" id="optFeminino" alt=""
							src="img/chkBranco.png"> <label for="optFeminino"
							style="left: 0px;">Feminino</label>
					</div>
				</div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<button type="button" name="btnSalvar" id="btnSalvar">Salvar</button>
					<button type="reset" name="btnLimpar" id="btnLimpar">Limpar</button>
				</div>
			</div>
		</div>
	</div>
</div>