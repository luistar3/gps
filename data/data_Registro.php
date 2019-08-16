<?php 


class Registro{

    private $IdRegistro;
    private $stimeFecha;
    private $varEstado;
    private $IdPersona;
    private $IdEvento;
    private $varNavegadorWeb;
    private $varUsuarioCreador;
    private $varUsuarioModificador;
    private $stimeFechaCreacion;
    private $stimeFechaModificacion;
    private $varDireccionIP;
    private $varDireccionMAC;
    private $varDependencia;
 



    /**
     * Get the value of ID_RESGISTRO
     */ 
    public function getIdRegistro()
    {
        return $this->IdRegistro;
    }

    /**
     * Set the value of ID_RESGISTRO
     *
     * @return  self
     */ 
    public function setIdRegistro($IdRegistro)
    {
        $this->$IdRegistro = $IdRegistro;

        return $this;
    }

    /**
     * Get the value of dateFecha
     */ 
    public function getDateFecha()
    {
        return $this->dateFecha;
    }

    /**
     * Set the value of dateFecha
     *
     * @return  self
     */ 
    public function setDateFecha($dateFecha)
    {
        $this->dateFecha = $dateFecha;

        return $this;
    }

    /**
     * Get the value of varHora
     */ 
    public function getVarHora()
    {
        return $this->varHora;
    }

    /**
     * Set the value of varHora
     *
     * @return  self
     */ 
    public function setVarHora($varHora)
    {
        $this->varHora = $varHora;

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
     * Get the value of IdEvento
     */ 
    public function getIdEvento()
    {
        return $this->IdEvento;
    }

    /**
     * Set the value of IdEvento
     *
     * @return  self
     */ 
    public function setIdEvento($IdEvento)
    {
        $this->IdEvento = $IdEvento;

        return $this;
    }

    /**
     * Get the value of IdPersona
     */ 
    public function getIdPersona()
    {
        return $this->IdPersona;
    }

    /**
     * Set the value of IdPersona
     *
     * @return  self
     */ 
    public function setIdPersona($IdPersona)
    {
        $this->IdPersona = $IdPersona;

        return $this;
    }

    /**
     * Get the value of varDependencia
     */ 
    public function getVarDependencia()
    {
        return $this->varDependencia;
    }

    /**
     * Set the value of varDependencia
     *
     * @return  self
     */ 
    public function setVarDependencia($varDependencia)
    {
        $this->varDependencia = $varDependencia;

        return $this;
    }

    /**
     * Get the value of stimeFecha
     */ 
    public function getStimeFecha()
    {
        return $this->stimeFecha;
    }

    /**
     * Set the value of stimeFecha
     *
     * @return  self
     */ 
    public function setStimeFecha($stimeFecha)
    {
        $this->stimeFecha = $stimeFecha;

        return $this;
    }

   
}
?>
