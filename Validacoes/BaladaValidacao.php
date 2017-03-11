<?php 

	// Matheus Catossi - 11/03/2017
	// Objeto criado para centralizar todas as funções de Balada


	class BaladaValidacao {

		private $idade;

		public function __construct($idade){
			$this->idade = $idade;
		}

		public function validarIdade($idadeMinima){
			if($this->idade >= $idadeMinima) {
				return true;
			} else {
				return false;
			}
		}

	}