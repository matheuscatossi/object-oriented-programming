<?php 

	// Matheus Catossi - 11/03/2017

	define("IDADE_MAXIMA", 18);

	require_once("Balada.php");
	require_once("Pessoa.php");

	// Função que verifica se é possível entrar na balada
	function entrarNaBalada($balada, $pessoa, $amizadeComDono) {
		if($balada->getStatusBalada()){
			if($balada->acessoIdade(($pessoa))) {
	 			return true;
	 		} else {
				if($amizadeComDono == true) {
					return true;
				} else {
					return false;
				}
	 		}
	 	} else {
	 		return false;
	 	}
	}	

	// Função para verificar se existe uma amizade na abalada
	function verificarAmizade($pessoa) {
	 	if($pessoa->getAmizade()) {
	 		return $pessoa->getAmizade();
	 	} else {
	 		return false;
	 	}
	}	

	// Função que transforma texto para boolean - necessário por conta do value do radio
	function textToBoolean($value){
		if($value == "true") {
			return true;
		} else {
			return false;
		}
	}

	// Função que monta as mensagens de retorno após o clique no botão
	function mensagem($texto, $class){
		return "<div class='row'>
			<div class='col-xs-12'>
				<div class='alert alert-{$class} text-center'>
					<h3>{$texto}</h3>
				</div>
			</div>
		</div>";
	}
?>
<html>
	<head>
		<title>Baladinha</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="index.js"></script>

		<style>
			.text-center {
				text-align: center;
			}

			.text-right {
				text-align: right;
			}

			.text-left {
				text-align: left;
			}

			.gap-top10 {
				margin-top: 10px;
			}
		</style>
	</head>
	<body>
		<form name="frm_entrar" id="frm_entrar" method="POST">
			<div class="container">
				<div class='row gap-top10'>
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading text-center">
								<h3>Formulário de acesso a balada</h3>
							</div>
							<div class="panel-body">
								<div class='row gap-top10'>
									<div class="col-xs-6 text-right">
										<strong>A balada está funcionando?</strong>
									</div>
									<div class="col-xs-6">
									  <label><input type="radio" name="baladaFuncionando" value="true"  <?php print isset($_REQUEST['baladaFuncionando']) && $_REQUEST['baladaFuncionando'] == "true" ? "checked" : "";?>>  Sim </label>
									  <label><input type="radio" name="baladaFuncionando" value="false" <?php print isset($_REQUEST['baladaFuncionando']) && $_REQUEST['baladaFuncionando'] == "false" ? "checked" : "";?>> Não </label>
									</div>
								</div>
								<div class='row'>
									<div class="col-xs-6 text-right gap-top10">
										<strong>Qual sua idade?</strong>
									</div>
									<div class="col-xs-6">
										<input type="number" name="idade" id="idade" placeholder="Ex.: 18" class="form-control" value="<?php print isset($_REQUEST['idade']) ? $_REQUEST['idade'] : '';?>"/>
									</div>
								</div>
								<div class="row gap-top10">
									<div class="col-xs-6 text-right">
										<strong>Você tem amizade com o dono da balada?</strong>
									</div>
									<div class="col-xs-6">
									  <label><input type="radio" name="amizadeComDono" value="true" <?php print isset($_REQUEST['amizadeComDono']) && $_REQUEST['amizadeComDono'] == "true" ? "checked" : "";?>>  Sim </label>
									  <label><input type="radio" name="amizadeComDono" value="false"<?php print isset($_REQUEST['amizadeComDono']) && $_REQUEST['amizadeComDono'] == "false" ? "checked" : "";?>> Não </label>
									</div>
								</div>
								<div class="row gap-top10">
									<div class="col-xs-6 text-right">
										<strong>Você tem algum amigo na balada? Se sim, qual o sexo dele?</strong>
									</div>
									<div class="col-xs-6">
									  <label><input type="radio" name="sexoAmizadeNaBalada" value="M" <?php print isset($_REQUEST['sexoAmizadeNaBalada']) && $_REQUEST['sexoAmizadeNaBalada'] == "M" ? "checked" : "";?>>  Masculino </label>
									  <label><input type="radio" name="sexoAmizadeNaBalada" value="F" <?php print isset($_REQUEST['sexoAmizadeNaBalada']) && $_REQUEST['sexoAmizadeNaBalada'] == "F" ? "checked" : "";?>> Feminino   </label>
									  <label><input type="radio" name="sexoAmizadeNaBalada" value="N" <?php print isset($_REQUEST['sexoAmizadeNaBalada']) && $_REQUEST['sexoAmizadeNaBalada'] == "N" ? "checked" : "";?>> Não possui </label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4 col-xs-offset-4">
										<input type="button" name="btn_entrar" id="btn_entrar" value="ENTRAR" class="btn btn-primary form-control"/>
									</div>
								</div>
							</div>
						</div>
						<?php 

							// Verificação se os valores foram preenchidos
							if(isset($_REQUEST['idade']) 
								&& isset($_REQUEST['amizadeComDono'] )
								&& isset($_REQUEST['sexoAmizadeNaBalada']) 
								&& isset($_REQUEST['baladaFuncionando'])){
								
								// Transformando text em boolean
								$_REQUEST['baladaFuncionando'] = textToBoolean($_REQUEST['baladaFuncionando']);
								$_REQUEST['amizadeComDono']    = textToBoolean($_REQUEST['amizadeComDono']);

								// Instanciando os objetos necessários para chamar as funções
								$balada = new Balada((boolean) $_REQUEST['baladaFuncionando'], IDADE_MAXIMA);
								$pessoa = new Pessoa((int) $_REQUEST['idade'], $_REQUEST['sexoAmizadeNaBalada']);

								// Primeira mensagem dizendo se é ou não permitido o acesso do usuário a balada
								if(entrarNaBalada($balada, $pessoa, $_REQUEST['amizadeComDono'])){
									print mensagem("Acesso permitido", "success");
								} else {
									print mensagem("Acesso negado", "danger");
								}

								// Segunda mensagem dizendo se o usuário possui ou não amizades na balada e se tiver identificar o sexo
								if($amizade = verificarAmizade($pessoa)){
									if($amizade == "MASCULINO") {
										$mensagem = "Você tem um amigo homem na balada o/";
									} else {
										$mensagem = "Você tem uma amiga mulher na balada o/";
									}
									print mensagem($mensagem, "success");
								} else {
									print mensagem("Você não tem amigos na balada :/", "danger");
								}
							}
						?>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>	





