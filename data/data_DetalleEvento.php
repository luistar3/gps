<?php 

class data_DetalleEvento
{
    private $IdDetalleEvento;
    private $IdEvento;
    private $dateFecha;
    private $varEstado;
    private $varComentario;
    private $timeInicioHora;
    private $timeFinHora;


    

    /**
     * Get the value of IdDetalleEvento
     */ 
    public function getIdDetalleEvento()
    {
        return $this->IdDetalleEvento;
    }

    /**
     * Set the value of IdDetalleEvento
     *
     * @return  self
     */ 
    public function setIdDetalleEvento($IdDetalleEvento)
    {
        $this->IdDetalleEvento = $IdDetalleEvento;

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
     * Get the value of varComentario
     */ 
    public function getVarComentario()
    {
        return $this->varComentario;
    }

    /**
     * Set the value of varComentario
     *
     * @return  self
     */ 
    public function setVarComentario($varComentario)
    {
        $this->varComentario = $varComentario;

        return $this;
    }

    /**
     * Get the value of timeInicioHora
     */ 
    public function getTimeInicioHora()
    {
        return $this->timeInicioHora;
    }

    /**
     * Set the value of timeInicioHora
     *
     * @return  self
     */ 
    public function setTimeInicioHora($timeInicioHora)
    {
        $this->timeInicioHora = $timeInicioHora;

        return $this;
    }

    /**
     * Get the value of timeFinHora
     */ 
    public function getTimeFinHora()
    {
        return $this->timeFinHora;
    }

    /**
     * Set the value of timeFinHora
     *
     * @return  self
     */ 
    public function setTimeFinHora($timeFinHora)
    {
        $this->timeFinHora = $timeFinHora;

        return $this;
    }
}


?>