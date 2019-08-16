<?php   

class data_Evento{


    private $IdEvento;
    private $varNombre;
    private $varDescripcion;
    private $stimeFecha;
    private $varLugar;
    private $varEstado;
    private $intAforo;
    private $varUbicacionLongitud;
    private $varUbicacionLatitud;
    private $IdTipoEvento;
    private $varNavegadorWeb;
    private $varUsuarioCreador;
    private $varUsuarioModificador;
    private $stimeFechaCreacion;
    private $stimeFechaModificacion;
    private $varDireccionIP;
    private $varDireccionMAC;
    private $dateInicioFecha;
    private $dateFinFecha;
    private $stimeInicioHora;
    private $stimeFinHora;
    private $varTipo;
    private $varBanner;
    private $dependencia;
    private $IdPtaDependenciaFijo;
    private $IdDepe;



   

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
     * Get the value of varDescripcion
     */ 
    public function getVarDescripcion()
    {
        return $this->varDescripcion;
    }

    /**
     * Set the value of varDescripcion
     *
     * @return  self
     */ 
    public function setVarDescripcion($varDescripcion)
    {
        $this->varDescripcion = $varDescripcion;

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

    /**
     * Get the value of varLugar
     */ 
    public function getVarLugar()
    {
        return $this->varLugar;
    }

    /**
     * Set the value of varLugar
     *
     * @return  self
     */ 
    public function setVarLugar($varLugar)
    {
        $this->varLugar = $varLugar;

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
     * Get the value of intAforo
     */ 
    public function getIntAforo()
    {
        return $this->intAforo;
    }

    /**
     * Set the value of intAforo
     *
     * @return  self
     */ 
    public function setIntAforo($intAforo)
    {
        $this->intAforo = $intAforo;

        return $this;
    }

    /**
     * Get the value of varUbicacionLongitud
     */ 
    public function getVarUbicacionLongitud()
    {
        return $this->varUbicacionLongitud;
    }

    /**
     * Set the value of varUbicacionLongitud
     *
     * @return  self
     */ 
    public function setVarUbicacionLongitud($varUbicacionLongitud)
    {
        $this->varUbicacionLongitud = $varUbicacionLongitud;

        return $this;
    }

    /**
     * Get the value of varUbicacionLatitud
     */ 
    public function getVarUbicacionLatitud()
    {
        return $this->varUbicacionLatitud;
    }

    /**
     * Set the value of varUbicacionLatitud
     *
     * @return  self
     */ 
    public function setVarUbicacionLatitud($varUbicacionLatitud)
    {
        $this->varUbicacionLatitud = $varUbicacionLatitud;

        return $this;
    }

    /**
     * Get the value of TIPO_EVENTO_ID_TIPO_EVENTO
     */ 
    public function getIdTipoEvento()
    {
        return $this->IdTipoEvento;
    }

    /**
     * Set the value of TIPO_EVENTO_ID_TIPO_EVENTO
     *
     * @return  self
     */ 
    public function setIdTipoEvento($IdTipoEvento)
    {
        $this->IdTipoEvento = $IdTipoEvento;

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
     * Get the value of dateFinFecha
     */ 
    public function getDateFinFecha()
    {
        return $this->dateFinFecha;
    }

    /**
     * Set the value of dateFinFecha
     *
     * @return  self
     */ 
    public function setDateFinFecha($dateFinFecha)
    {
        $this->dateFinFecha = $dateFinFecha;

        return $this;
    }

    /**
     * Get the value of stimeInicioHora
     */ 
    public function getStimeInicioHora()
    {
        return $this->stimeInicioHora;
    }

    /**
     * Set the value of stimeInicioHora
     *
     * @return  self
     */ 
    public function setStimeInicioHora($stimeInicioHora)
    {
        $this->stimeInicioHora = $stimeInicioHora;

        return $this;
    }

    /**
     * Get the value of stimeFinHora
     */ 
    public function getStimeFinHora()
    {
        return $this->stimeFinHora;
    }

    /**
     * Set the value of stimeFinHora
     *
     * @return  self
     */ 
    public function setStimeFinHora($stimeFinHora)
    {
        $this->stimeFinHora = $stimeFinHora;

        return $this;
    }

    /**
     * Get the value of varTipo
     */ 
    public function getVarTipo()
    {
        return $this->varTipo;
    }

    /**
     * Set the value of varTipo
     *
     * @return  self
     */ 
    public function setVarTipo($varTipo)
    {
        $this->varTipo = $varTipo;

        return $this;
    }

    /**
     * Get the value of varBanner
     */ 
    public function getVarBanner()
    {
        return $this->varBanner;
    }

    /**
     * Set the value of varBanner
     *
     * @return  self
     */ 
    public function setVarBanner($varBanner)
    {
        $this->varBanner = $varBanner;

        return $this;
    }

    /**
     * Get the value of dateInicioFecha
     */ 
    public function getDateInicioFecha()
    {
        return $this->dateInicioFecha;
    }

    /**
     * Set the value of dateInicioFecha
     *
     * @return  self
     */ 
    public function setDateInicioFecha($dateInicioFecha)
    {
        $this->dateInicioFecha = $dateInicioFecha;

        return $this;
    }

    /**
     * Get the value of dependencia
     */ 
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * Set the value of dependencia
     *
     * @return  self
     */ 
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;

        return $this;
    }

    /**
     * Get the value of IdPtaDependenciaFijo
     */ 
    public function getIdPtaDependenciaFijo()
    {
        return $this->IdPtaDependenciaFijo;
    }

    /**
     * Set the value of IdPtaDependenciaFijo
     *
     * @return  self
     */ 
    public function setIdPtaDependenciaFijo($IdPtaDependenciaFijo)
    {
        $this->IdPtaDependenciaFijo = $IdPtaDependenciaFijo;

        return $this;
    }

    /**
     * Get the value of IdDepe
     */ 
    public function getIdDepe()
    {
        return $this->IdDepe;
    }

    /**
     * Set the value of IdDepe
     *
     * @return  self
     */ 
    public function setIdDepe($IdDepe)
    {
        $this->IdDepe = $IdDepe;

        return $this;
    }
}

?>