<?php  

	class data_EgresadoAntecedente
	{

		private $IdEgresadoAntecedente;
		private $IdEgresado;
		private $IdEmpresa;
		private $IdTipoContrato;
		private $intTiempoLaboral;
		private $varTipoTiempo;
		private $varPuesto;
		private $bitEliminado;
		private $datCreado;
		private $datModificado;
		private $varDireccionIP;

    public function getIdEgresadoAntecedente(){
	    return $this->IdEgresadoAntecedente;
	  }

	  public function setIdEgresadoAntecedente($IdEgresadoAntecedente){
	    $this->IdEgresadoAntecedente = $IdEgresadoAntecedente;
	  }

	  public function getIdEgresado(){
	    return $this->IdEgresado;
	  }

	  public function setIdEgresado($IdEgresado){
	    $this->IdEgresado = $IdEgresado;
	  }

	  public function getIdEmpresa(){
	    return $this->IdEmpresa;
	  }

	  public function setIdEmpresa($IdEmpresa){
	    $this->IdEmpresa = $IdEmpresa;
	  }

	  public function getIdTipoContrato(){
	    return $this->IdTipoContrato;
	  }

	  public function setIdTipoContrato($IdTipoContrato){
	    $this->IdTipoContrato = $IdTipoContrato;
	  }

	  public function getIntTiempoLaboral(){
	    return $this->intTiempoLaboral;
	  }

	  public function setIntTiempoLaboral($intTiempoLaboral){
	    $this->intTiempoLaboral = $intTiempoLaboral;
	  }

	  public function getVarTipoTiempo(){
	    return $this->varTipoTiempo;
	  }

	  public function setVarTipoTiempo($varTipoTiempo){
	    $this->varTipoTiempo = $varTipoTiempo;
	  }

	  public function getVarPuesto(){
	    return $this->varPuesto;
	  }

	  public function setVarPuesto($varPuesto){
	    $this->varPuesto = $varPuesto;
	  }

    public function getBitEliminado(){
	    return $this->bitEliminado;
	  }

	  public function setBitEliminado($bitEliminado){
	    $this->bitEliminado = $bitEliminado;
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

	  public function getVarDireccionIP(){
	    return $this->varDireccionIP;
	  }

	  public function setVarDireccionIP($varDireccionIP){
	    $this->varDireccionIP = $varDireccionIP;
	  }
  
	}

?>