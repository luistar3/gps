<?php  

	class data_Empresa
	{

		private $IdEmpresa;
		private $varRuc;
		private $varNombre;
		private $IdSectorOcupacionalDetalle;
		private $VarDireccion;
		private $varTelefono;
		private $bitActivo;
		private $datCreado;
		private $datModificado;

	  public function getIdEmpresa(){
	    return $this->IdEmpresa;
	  }

	  public function setIdEmpresa($IdEmpresa){
	    $this->IdEmpresa = $IdEmpresa;
	  }

	  public function getVarRuc(){
	    return $this->varRuc;
	  }

	  public function setVarRuc($varRuc){
	    $this->varRuc = $varRuc;
	  }

	  public function getVarNombre(){
	    return $this->varNombre;
	  }

	  public function setVarNombre($varNombre){
	    $this->varNombre = $varNombre;
	  }

	  public function getIdSectorOcupacionalDetalle(){
	    return $this->IdSectorOcupacionalDetalle;
	  }

	  public function setIdSectorOcupacionalDetalle($IdSectorOcupacionalDetalle){
	    $this->IdSectorOcupacionalDetalle = $IdSectorOcupacionalDetalle;
	  }

	  public function getVarDireccion(){
	    return $this->VarDireccion;
	  }

	  public function setVarDireccion($VarDireccion){
	    $this->VarDireccion = $VarDireccion;
	  }

	  public function getVarTelefono(){
	    return $this->varTelefono;
	  }

	  public function setVarTelefono($varTelefono){
	    $this->varTelefono = $varTelefono;
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