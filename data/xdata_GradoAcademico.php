<?php 

	class data_GradoAcademico
	{

		private $IdGradoAcademico;
		private $varNombre;
		private $bitActivo;
		private $datCreado;

	  public function getIdGradoAcademico(){
	    return $this->IdGradoAcademico;
	  }

	  public function setIdGradoAcademico($IdGradoAcademico){
	    $this->IdGradoAcademico = $IdGradoAcademico;
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