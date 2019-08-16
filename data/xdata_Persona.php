<?php
class data_Persona{

    private $IdPersona;
    private $varDni;
    private $varNombre;
    private $varApellido;
    private $varCorreo;
    private $intCelular;
    private $varEstado;
    private $varUsuario;
    private $varClave;
    private $varAvatar;
    private $varNavegadorWeb;
    private $varUsuarioCreador;
    private $IdTipoPersona;
    private $varUsuarioModificador;
    private $stimeFechaCreacion;
    private $stimeFechaModificacion;
    private $varDireccionIP;
    private $varDireccionMAC;

    Private $ApePat;                
    Private $ApeMat;                
    Private $Estamento;             
    Private $FechaInicioContrato;   
    Private $FechaFinContrato;      
    Private $Dependencia;           
    Private $UnidadOrganica;        
    private $Cargo;                 
    private $DependenciaCargo;      

    
   



    /**
     * Get the value of ID_PERSONA
     */ 
    public function getIdPersona()
    {
        return $this->IdPersona;
    }

    /**
     * Set the value of ID_PERSONA
     *
     * @return  self
     */ 
    public function setIdPersona($IdPersona)
    {
        $this->IdPersona = $IdPersona;

        return $this;
    }

    /**
     * Get the value of varDni
     */ 
    public function getVarDni()
    {
        return $this->varDni;
    }

    /**
     * Set the value of varDni
     *
     * @return  self
     */ 
    public function setVarDni($varDni)
    {
        $this->varDni = $varDni;

        return $this;
    }

    /**
     * Get the value of varNombre
     */ 
    public function getVarNombre()
    {
        return $this->varNombre;
    }

    /**
     * Set the value of varNombre
     *
     * @return  self
     */ 
    public function setVarNombre($varNombre)
    {
        $this->varNombre = $varNombre;

        return $this;
    }

    /**
     * Get the value of varApellido
     */ 
    public function getVarApellido()
    {
        return $this->varApellido;
    }

    /**
     * Set the value of varApellido
     *
     * @return  self
     */ 
    public function setVarApellido($varApellido)
    {
        $this->varApellido = $varApellido;

        return $this;
    }

    /**
     * Get the value of varCorreo
     */ 
    public function getVarCorreo()
    {
        return $this->varCorreo;
    }

    /**
     * Set the value of varCorreo
     *
     * @return  self
     */ 
    public function setVarCorreo($varCorreo)
    {
        $this->varCorreo = $varCorreo;

        return $this;
    }

    /**
     * Get the value of intCelular
     */ 
    public function getIntCelular()
    {
        return $this->intCelular;
    }

    /**
     * Set the value of intCelular
     *
     * @return  self
     */ 
    public function setIntCelular($intCelular)
    {
        $this->intCelular = $intCelular;

        return $this;
    }

    /**
     * Get the value of varEstado
     */ 
    public function getVarEstado()
    {
        return $this->varEstado;
    }

    /**
     * Set the value of varEstado
     *
     * @return  self
     */ 
    public function setVarEstado($varEstado)
    {
        $this->varEstado = $varEstado;

        return $this;
    }

    /**
     * Get the value of varUsuario
     */ 
    public function getVarUsuario()
    {
        return $this->varUsuario;
    }

    /**
     * Set the value of varUsuario
     *
     * @return  self
     */ 
    public function setVarUsuario($varUsuario)
    {
        $this->varUsuario = $varUsuario;

        return $this;
    }

    /**
     * Get the value of varClave
     */ 
    public function getVarClave()
    {
        return $this->varClave;
    }

    /**
     * Set the value of varClave
     *
     * @return  self
     */ 
    public function setVarClave($varClave)
    {
        $this->varClave = $varClave;

        return $this;
    }

    /**
     * Get the value of varAvatar
     */ 
    public function getVarAvatar()
    {
        return $this->varAvatar;
    }

    /**
     * Set the value of varAvatar
     *
     * @return  self
     */ 
    public function setVarAvatar($varAvatar)
    {
        $this->varAvatar = $varAvatar;

        return $this;
    }

    /**
     * Get the value of varNavegadorWeb
     */ 
    public function getVarNavegadorWeb()
    {
        return $this->varNavegadorWeb;
    }

    /**
     * Set the value of varNavegadorWeb
     *
     * @return  self
     */ 
    public function setVarNavegadorWeb($varNavegadorWeb)
    {
        $this->varNavegadorWeb = $varNavegadorWeb;

        return $this;
    }

    /**
     * Get the value of varUsuarioCreador
     */ 
    public function getVarUsuarioCreador()
    {
        return $this->varUsuarioCreador;
    }

    /**
     * Set the value of varUsuarioCreador
     *
     * @return  self
     */ 
    public function setVarUsuarioCreador($varUsuarioCreador)
    {
        $this->varUsuarioCreador = $varUsuarioCreador;

        return $this;
    }

    /**
     * Get the value of TIPO_USUARIO_ID_TIPO_PERSONA
     */ 
    public function getIdTipoPersona()
    {
        return $this->IdTipoPersona;
    }

    /**
     * Set the value of TIPO_USUARIO_ID_TIPO_PERSONA
     *
     * @return  self
     */ 
    public function setIdTipoPersona($IdTipoPersona)
    {
        $this->IdTipoPersona = $IdTipoPersona;

        return $this;
    }

    /**
     * Get the value of varUsuarioModificador
     */ 
    public function getVarUsuarioModificador()
    {
        return $this->varUsuarioModificador;
    }

    /**
     * Set the value of varUsuarioModificador
     *
     * @return  self
     */ 
    public function setVarUsuarioModificador($varUsuarioModificador)
    {
        $this->varUsuarioModificador = $varUsuarioModificador;

        return $this;
    }

    /**
     * Get the value of stimeFechaCreacion
     */ 
    public function getStimeFechaCreacion()
    {
        return $this->stimeFechaCreacion;
    }

    /**
     * Set the value of stimeFechaCreacion
     *
     * @return  self
     */ 
    public function setStimeFechaCreacion($stimeFechaCreacion)
    {
        $this->stimeFechaCreacion = $stimeFechaCreacion;

        return $this;
    }

    /**
     * Get the value of stimeFechaModificacion
     */ 
    public function getStimeFechaModificacion()
    {
        return $this->stimeFechaModificacion;
    }

    /**
     * Set the value of stimeFechaModificacion
     *
     * @return  self
     */ 
    public function setStimeFechaModificacion($stimeFechaModificacion)
    {
        $this->stimeFechaModificacion = $stimeFechaModificacion;

        return $this;
    }

    /**
     * Get the value of varDireccionIP
     */ 
    public function getVarDireccionIP()
    {
        return $this->varDireccionIP;
    }

    /**
     * Set the value of varDireccionIP
     *
     * @return  self
     */ 
    public function setVarDireccionIP($varDireccionIP)
    {
        $this->varDireccionIP = $varDireccionIP;

        return $this;
    }

    /**
     * Get the value of varDireccionMAC
     */ 
    public function getVarDireccionMAC()
    {
        return $this->varDireccionMAC;
    }

    /**
     * Set the value of varDireccionMAC
     *
     * @return  self
     */ 
    public function setVarDireccionMAC($varDireccionMAC)
    {
        $this->varDireccionMAC = $varDireccionMAC;

        return $this;
    }

    /**
     * Get the value of ApePat
     */ 
    public function getApePat()
    {
        return $this->ApePat;
    }

    /**
     * Set the value of ApePat
     *
     * @return  self
     */ 
    public function setApePat($ApePat)
    {
        $this->ApePat = $ApePat;

        return $this;
    }

    /**
     * Get the value of ApeMat
     */ 
    public function getApeMat()
    {
        return $this->ApeMat;
    }

    /**
     * Set the value of ApeMat
     *
     * @return  self
     */ 
    public function setApeMat($ApeMat)
    {
        $this->ApeMat = $ApeMat;

        return $this;
    }

    /**
     * Get the value of Estamento
     */ 
    public function getEstamento()
    {
        return $this->Estamento;
    }

    /**
     * Set the value of Estamento
     *
     * @return  self
     */ 
    public function setEstamento($Estamento)
    {
        $this->Estamento = $Estamento;

        return $this;
    }

    /**
     * Get the value of FechaInicioContrato
     */ 
    public function getFechaInicioContrato()
    {
        return $this->FechaInicioContrato;
    }

    /**
     * Set the value of FechaInicioContrato
     *
     * @return  self
     */ 
    public function setFechaInicioContrato($FechaInicioContrato)
    {
        $this->FechaInicioContrato = $FechaInicioContrato;

        return $this;
    }

    /**
     * Get the value of FechaFinContrato
     */ 
    public function getFechaFinContrato()
    {
        return $this->FechaFinContrato;
    }

    /**
     * Set the value of FechaFinContrato
     *
     * @return  self
     */ 
    public function setFechaFinContrato($FechaFinContrato)
    {
        $this->FechaFinContrato = $FechaFinContrato;

        return $this;
    }

    /**
     * Get the value of Dependencia
     */ 
    public function getDependencia()
    {
        return $this->Dependencia;
    }

    /**
     * Set the value of Dependencia
     *
     * @return  self
     */ 
    public function setDependencia($Dependencia)
    {
        $this->Dependencia = $Dependencia;

        return $this;
    }

    /**
     * Get the value of UnidadOrganica
     */ 
    public function getUnidadOrganica()
    {
        return $this->UnidadOrganica;
    }

    /**
     * Set the value of UnidadOrganica
     *
     * @return  self
     */ 
    public function setUnidadOrganica($UnidadOrganica)
    {
        $this->UnidadOrganica = $UnidadOrganica;

        return $this;
    }

    /**
     * Get the value of Cargo
     */ 
    public function getCargo()
    {
        return $this->Cargo;
    }

    /**
     * Set the value of Cargo
     *
     * @return  self
     */ 
    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;

        return $this;
    }



    /**
     * Get the value of DependenciaCargo
     */ 
    public function getDependenciaCargo()
    {
        return $this->DependenciaCargo;
    }

    /**
     * Set the value of DependenciaCargo
     *
     * @return  self
     */ 
    public function setDependenciaCargo($DependenciaCargo)
    {
        $this->DependenciaCargo = $DependenciaCargo;

        return $this;
    }
}
?>