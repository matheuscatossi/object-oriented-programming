<?php 

	// Matheus Catossi - 11/03/2017
	// Objeto criado para centralizar todas as funções de Pessoa

	class Pessoa {

		private $idade;
		private $amizade;

		function __construct($idade, $amizade){
			$this->idade   = $idade;
			$this->amizade = $amizade;
		}


		public function getIdade() {
			return $this->idade;
		}

		public function getAmizade(){
			require_once("/Validacoes/PessoaValidacao.php");
			$pessoaValidacao = new PessoaValidacao($this->amizade);

			return $pessoaValidacao->verificarSexo(); 
		}
	}