<?php 

	// Matheus Catossi - 11/03/2017

	//verificarSexoTexto()
	define("MASCULINO", "Seu amigo é um homem");
	define("FEMININO", "Sua amiga é uma mulher");

	class Amigo{

		private $sexo;

		public function __construct($sexo) {
			$this->sexo = $sexo;
		}

		public function verificarSexoTexto(){
			if($this->sexo == "M") {
				return MASCULINO;
			} else {
				return FEMININO;
			}
		}

		public function verificarSexo(){
			if($this->sexo == true) {
				return "M";
			} else {
				return "F";
			}
		}

	}