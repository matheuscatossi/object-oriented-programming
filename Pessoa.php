<?php 

	// Matheus Catossi - 11/03/2017

	class Pessoa {

		private $idade;
		private $amizade;

		function __construct($idade, $amizade){
			$this->idade   = $idade;
			$this->amizade = $amizade;
		}

		function verificarAmizade() {
			if($this->amizade == true) {
				return true;
			} else {
				return false;
			}
		}

		function verificarIdade(){
			if($this->idade >= 18) {
				return true;
			} else {
				return false;
			}
		}
	}