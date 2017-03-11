<?php 
	class Balada {

		private $status;
		private $amizadeBalada;

		function __construct($status, $amizadeBalada){
			$this->status = $status;
			$this->status = $amizadeBalada;
		}

		function verificarFesta(){
			if($this->status == true) {
				return true;
			} else {
				return false;
			}
		}

		function verificarAmizadeBalada(){
			if($this->amizadeBalada) {
				return true;
			} else {
				return false;
			}
		}

	}

