<?php
	
		// Matheus Catossi - 11/03/2017
	// Objeto criado para centralizar todas as funções de validações do Objeto Pessoa

	define("MASCULINO", "MASCULINO");
	define("FEMININO", "FEMININO");
	
	class PessoaValidacao {
		

		private $sexo;

		function __construct($sexo){
			$this->sexo = $sexo;
		}

		public function verificarSexo(){
			if($this->sexo == "M") {
				return MASCULINO;
			} else if($this->sexo == "F"){
				return FEMININO;
			} else {
				return false;
			}
		}
	}