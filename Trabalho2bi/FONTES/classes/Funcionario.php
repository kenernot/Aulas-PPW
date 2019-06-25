<?php
	class Funcionario {
		private $matricula = null;
		private $nome = null;
		private $rg = null;
		private $departamento = null;
		
		public function __construct($nome,$rg,$matricula,$departamento) {
			$this->nome = $nome;
			$this->rg = $rg;
			$this->matricula = $matricula;
			$this->departamento = $departamento;
		}
		
		public function setNome($nome) {
			$this->nome = $nome;
		}
		
		public function getNome() {
			return $this->nome;
		}
		
		public function setMatricula($matricula) {
			$this->matricula = $matricula;
		}
		
		public function getmatricula() {
			return $this->matricula;
		}
		
		public function setRg($rg) {
			$this->rg = $rg;
		}
		
		public function getRg() {
			return $this->rg;
		}
		
		public function setDepartamento($departamento) {
			$this->departamento = $departamento;
		}
		
		public function getDepartamento() {
			return $this->departamento;
		}
	}
?>