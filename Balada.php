<?php 
	
	// Matheus Catossi - 11/03/2017

	//verificarAmizadeBalada()
	define("FESTA_COM_AMIZADE", "Você tem amigo na festa");
	define("FESTA_SEM_AMIZADE", "Você não tem amigo na festa");
	
	//verificarAcesso()
	define("ACESSO_PERMITIDO", "Pode entrar na festa");
	define("ACESSO_PERMITIDO_POR_AMIZADE", "Menor de idade mas é amigo(a) do dono");
	define("ACESSO_NEGADO", "Não pode entrar na festa");
	define("FESTA_NAO_ACONTECENDO", "Festa não está acontecendo");

	class Balada {

		private $status;

		public function __construct($status){
			$this->status = $status;
		}

		public function verificarAmizadeBalada($amizadeBalada){
			if($amizadeBalada) {
				return FESTA_COM_AMIZADE;
			} else {
				return FESTA_SEM_AMIZADE;
			}
		}

		// public function verificarAcesso($pessoa){
		// 	if($this->verificarFesta()) {
		// 		if($pessoa->verificarIdade()) {
		// 			return ACESSO_PERMITIDO;
		// 		} else {
		// 			if($pessoa->verificarAmizade()) {
		// 				return ACESSO_PERMITIDO_POR_AMIZADE;
		// 			} else {
		// 				return ACESSO_NEGADO;
		// 			}
		// 		}
		// 	} else {
		// 		return FESTA_NAO_ACONTECENDO;
		// 	}
		// }

		public function verificarAcesso($pessoa){
			if($this->status) {
				if($pessoa->verificarIdade()) {
					return true;
				} else {
					if($pessoa->verificarAmizade()) {
						return true;
					} else {
						return false;
					}
				}
			} else {
				return false;
			}
		}
	}

