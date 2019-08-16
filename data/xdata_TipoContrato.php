<?php  

	class data_TipoContrato
	{
		private $IdTipoContrato;
		private $varNombre;
		private $bitActivo;
		private $datCreado;
		private $datModificado;

	  public function getIdTipoContrato(){
	    return $this->IdTipoContrato;
	  }

	  public function setIdTipoContrato($IdTipoContrato){
	    $this->IdTipoContrato = $IdTipoContrato;
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

	  public function getDatModificado(){
	    return $this->datModificado;
	  }

	  public function setDatModificado($datModificado){
	    $this->datModificado = $datModificado;
	  }

	}

?>