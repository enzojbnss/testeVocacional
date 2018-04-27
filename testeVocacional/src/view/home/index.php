<style>
@font-face {
	font-family: chinese-rocks;
	src: url('/font/chinese-rocks/chinese-rocks-rg.ttf');
}

#tela {
	position: absolute;
	top: 10%;
	font-family: chinese-rocks;
}

.jumbotron {
	background: #ffffff;
	text-align: center;
	font-family: chinese-rocks;
	font-size: 1.7em;
	width: 100%;
	height: 600px;
	margin-left: 32%;
	opacity: 0.55;
}

.jumbotron 	img {
	width: 50%
}

.jumbotron 	img:active {
	position: relative;
	padding: 10px;
}

.pergunta {
	margin-top: 20%;
	font-family: chinese-rocks;
	font-size: 2em;
}

.form-group {
	margin-bottom: 30px
}

.form-horizontal h4 {
	margin-bottom: 30px
}

.col-md-12 button{
    font-size: 16px;
    text-indent: 2px;
}


</style>


<div class="container" id="tela">
	<div class="jumbotron"
		style="background-color: #FFFFFF; opacity: 0.65; margin-top: 10px; padding-top: 10px;">
		<div class="form-horizontal">
			<h4>
				<label style="font-weight: lighter;">Cadastro de participante</label>
			</h4>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtNome" type="text" class="form-control" id="txtNome"
						required="required" size="45" maxlength="70" placeholder="Nome" />
					<input name="txtID" type="hidden" id="txtID" size="45" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input name="txtSobrenome" type="text" class="form-control"
						id="txtSobrenome" required="required" size="45" maxlength="70"
						placeholder="Sobrenome" /> <input name="txtID" type="hidden"
						id="txtID" size="45" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="Email"
						style="margin-top: 20px;" />
				</div>
				<div class="col-md-3">
					<input title="Data de nascimento" id="txtDataNascimento"
						class="form-control" type="date" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<br> <input name="txtEmail" type="email" class="form-control"
						id="txtEmail" size="50" maxlength="60" placeholder="cpf" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<br>Sexo:
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="form-group" >
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-3" >
					<div class="checkbox">
						<label for="optMasculino"><input id="optMasculino"
							type="checkbox" style="width: 15px; height: 15px; top: 12px;" />Masculino</label>
					</div>
				</div>
				<div class="col-md-3" >
					<div class="checkbox">
						<label for="optFeminino" style="left: 0px;"><input
							id="optFeminino" type="checkbox"
							style="width: 15px; height: 15px; top: 12px;" />Feminino</label>
					</div>
				</div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<button type="button" name="cmdSalvar" id="cmdSalvarPessoa">Salvar
					</button>
					<button type="reset" name="cmdLimpar" id="cmdLimparPessoa">Limpar</button>
				</div>
			</div>
		</div>
	</div>
</div>