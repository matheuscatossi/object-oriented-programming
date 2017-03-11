<?php 
	
	// Matheus Catossi - 11/03/2017
	// Objeto criado para centralizar todas as funções de Balada

	class Balada {

		private $status;
		private $idadeMaxima;
		public function __construct($status, $idadeMaxima){
			$this->status      = $status;
			$this->idadeMaxima = $idadeMaxima; 
		}

		public function getStatusBalada() {
			return $this->status;
		}

		public function verificarAmizadeBalada($pessoa){
			return $pessoa->amizade;
		}

		public function acessoAmizade($pessoa) {

		}

		public function acessoIdade($pessoa){
			require_once("/Validacoes/BaladaValidacao.php");

			$baladaValidacao = new BaladaValidacao($pessoa->getIdade());
			return $baladaValidacao->validarIdade($this->idadeMaxima); 
		}
	}

