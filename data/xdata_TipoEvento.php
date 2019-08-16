<?php 

class TipoEvento{

    private $IdTipoEvento;
    private $varNombre;
    private $varDescripcion;
    private $varEstado;
    private $varUsuariocreador;
    private $varUsuarioModificador;



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
     * Get the value of varUsuariocreador
     */ 
    public function getVarUsuariocreador()
    {
        return $this->varUsuariocreador;
    }

    /**
     * Set the value of varUsuariocreador
     *
     * @return  self
     */ 
    public function setVarUsuariocreador($varUsuariocreador)
    {
        $this->varUsuariocreador = $varUsuariocreador;

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
     * Get the value of IdTipoEvento
     */ 
    public function getIdTipoEvento()
    {
        return $this->IdTipoEvento;
    }

    /**
     * Set the value of IdTipoEvento
     *
     * @return  self
     */ 
    public function setIdTipoEvento($IdTipoEvento)
    {
        $this->IdTipoEvento = $IdTipoEvento;

        return $this;
    }
}


?>