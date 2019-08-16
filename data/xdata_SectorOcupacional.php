<?php  

	class data_SectorOcupacional
	{

		private $IdSectorOcupacional;
		private $varNombre;
		private $varDescripcion;
		private $varTipo;
		private $bitActivo;
		private $datCreado;
		private $datModificado;

		public function getIdSectorOcupacional(){
	    return $this->IdSectorOcupacional;
	  }

	  public function setIdSectorOcupacional($IdSectorOcupacional){
	    $this->IdSectorOcupacional = $IdSectorOcupacional;
	  }

	  public function getVarNombre(){
	    return $this->varNombre;
	  }

	  public function setVarNombre($varNombre){
	    $this->varNombre = $varNombre;
	  }

	  public function getVarDescripcion(){
	    return $this->varDescripcion;
	  }

	  public function setVarDescripcion($varDescripcion){
	    $this->varDescripcion = $varDescripcion;
	  }

	  public function getVarTipo(){
	    return $this->varTipo;
	  }

	  public function setVarTipo($varTipo){
	    $this->varTipo = $varTipo;
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