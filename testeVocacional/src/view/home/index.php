<style>
#tela {
	position: relative;
	top: 5%;
}

.jumbotron {
	background: #a7c7dc;
	text-align: center;
	font-size: 1em;
	width: 100%;
	height: 600px;
	background-color: #FFFFFF;
	opacity: 0.65;
	margin-top: 35px;
	padding-top: 35px;
}

.jumbotron 	img {
	width: 50%
}

.jumbotron 	img:active {
	position: relative;
	padding: 10px;
}

.jumbotron 	input {
	font-size: 1.5em
}

.pergunta {
	margin-top: 20%;
	font-size: 1.5em;
}

.form-group {
	margin-bottom: 30px
}

.form-horizontal h4 {
	margin-bottom: 30px
}

.col-md-12 button {
	font-size: 16px;
	text-indent: 2px;
}

.imgchkbox {
	position: relative;
	height: 4%
}
</style>
<script type="text/javascript" src="js/service/PessoaService.js"></script>
<script type="text/javascript" src="js/componente/control/CheckBox.js"></script>
<script type="text/javascript" src="js/app/home/index.js"></script>
<div class="container" id="tela">
	<div class="jumbotron" >
		<div class="form-horizontal">
			<h4>
				<label style="font-weight: lighter;">Cadastro de participante</label>
			</h4>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						required="required" size="45" maxlength="70" placeholder="Nome"
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
				<div class="col-md-6">
					<input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="Email"
						style="margin-top: 12px;" data-bind="value: email" />
				</div>
				<div class="col-md-3" style="font-size: 0.8em; margin-top: 12px;">
					Data de nascimeto</div>
				<div class="col-md-3">
					<input title="Data de nascimento" id="txtDataNascimento"
						class="form-control" type="date" data-bind="value: dataNascimento" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<input name="txtCpf" type="text" class="form-control" id="txtCpf"
						size="50" maxlength="60" placeholder="cpf" data-bind="value: cpf" />
				</div>
				<div class="col-md-6">
					<div class="checkbox">
						<label for="optTermo"><input id="optTermo" type="checkbox"
							style="width: 15px; height: 15px; top: 6px;" />Aceito receber
							ofertas de cursos do Senac SP</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<br>Sexo:
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="form-group">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div class="checkbox">
						<img id="optMasculino" alt="" src="img/chkBranco.png"
							style="width: 8%"> <label for="optMasculino">Masculino</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<img id="optFeminino" alt="" src="img/chkBranco.png"
							style="width: 8%"> <label for="optFeminino" style="left: 0px;">Feminino</label>
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