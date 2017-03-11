<?php 

	// Matheus Catossi - 11/03/2017

	function entrarNaBalada($idade, $amizadeComDono, $sexoAmizadeNaBalada, $baladaFuncionando) {

		if($baladaFuncionando == "true") {
			$baladaFuncionando = true;
		} else {
			$baladaFuncionando = false;
		}

		if($amizadeComDono == "true") {
			$amizadeComDono = true;
		} else {
			$amizadeComDono = false;
		}

		$balada = new Balada((boolean) $baladaFuncionando);
		$amigo  = new Amigo($sexoAmizadeNaBalada);
		return $balada->verificarAcesso((new Pessoa((int) $idade, (boolean) $amizadeComDono)));
		
		// print '<br>';
		// print $balada->verificarAmizadeBalada($amigo);
		// print '<br>';
		// print $amigo->verificarSexoTexto();
	}		

?>

<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
		<script>
			$(function(){
				$("#btn_entrar").click(function(){
					if(verificarRadio("input[name='baladaFuncionando']") && verificarRadio("input[name='amizadeComDono']") && verificarRadio("input[name='sexoAmizadeNaBalada']") && verificarInput("#idade")) {
						window.frm_entrar.submit();
					} else {
						alert("Você não preencheu todos os campos, por favor verifique a inserção");
					}
				});

				function verificarRadio(element) {
					var status = false;
					$(element).each(function(){
						if(this.checked) {
							status =  true;
						}
					});

					return status;
				}

				function verificarInput(element) {
					var value = $(element).val();
					if(value.length > 0) {
						return true;
					} else {
						return false;
					}
				}
			});
		</script>

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
									  <label><input type="radio" name="sexoAmizadeNaBalada" value="F" <?php print isset($_REQUEST['sexoAmizadeNaBalada']) && $_REQUEST['sexoAmizadeNaBalada'] == "F" ? "checked" : "";?>> Feminino </label>
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
							if(isset($_REQUEST['idade']) 
								&& isset($_REQUEST['amizadeComDono'] )
								&& isset($_REQUEST['sexoAmizadeNaBalada']) 
								&& isset($_REQUEST['baladaFuncionando'])){
								
								require_once("Balada.php");
								require_once("Pessoa.php");
								require_once("Amigo.php");

								if(entrarNaBalada($_REQUEST['idade'], $_REQUEST['amizadeComDono'], $_REQUEST['sexoAmizadeNaBalada'], $_REQUEST['baladaFuncionando'])){
									?>
										<div class="row">
											<div class="col-xs-12">
												<div class="alert alert-success text-center">
													<h3>Acesso Permitido</h3>
												</div>
											</div>
										</div>
									<?php
								} else {
									?>
										<div class="row">
											<div class="col-xs-12">
												<div class="alert alert-danger text-center">
													<h3>Acesso negado</h3>
												</div>
											</div>
										</div>
									<?php
								};
							}
						?>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>	





