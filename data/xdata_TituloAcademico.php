<?php 

	class data_TituloAcademico
	{

		private $IdTituloAcademico;
		private $varNombre;
		private $bitActivo;
		private $datCreado;

	  public function getIdTituloAcademico(){
	    return $this->IdTituloAcademico;
	  }

	  public function setIdTituloAcademico($IdTituloAcademico){
	    $this->IdTituloAcademico = $IdTituloAcademico;
	  }

	  public function getVarNombre(){
	    return $this->varNombre;
	  }

	  public function setVarNombre($varNombre){
	    $this->varNombre = $varNombre;
	  }

	  public function getBitActivo(){
	    return $this->bitActivo;
	  }

	  public function setBitActivo($bitActivo){
	    $this->bitActivo = $bitActivo;
	  }

	  public function getDatCreado(){
	    return $this->datCreado;
	  }

	  public function setDatCreado($datCreado){
	    $this->datCreado = $datCreado;
	  }
			
	}

?>