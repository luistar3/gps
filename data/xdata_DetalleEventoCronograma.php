<?php

class data_DetalleEventoCronograma{




    private $IdDetalleEventoCronograma;
    private $IdDetalleEvento;
    private $timeHoraInicio;
    private $timeHoraFin;




    /**
     * Get the value of IdDetalleEventoCronograma
     */ 
    public function getIdDetalleEventoCronograma()
    {
        return $this->IdDetalleEventoCronograma;
    }

    /**
     * Set the value of IdDetalleEventoCronograma
     *
     * @return  self
     */ 
    public function setIdDetalleEventoCronograma($IdDetalleEventoCronograma)
    {
        $this->IdDetalleEventoCronograma = $IdDetalleEventoCronograma;

        return $this;
    }

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
     * Get the value of timeHoraInicio
     */ 
    public function getTimeHoraInicio()
    {
        return $this->timeHoraInicio;
    }

    /**
     * Set the value of timeHoraInicio
     *
     * @return  self
     */ 
    public function setTimeHoraInicio($timeHoraInicio)
    {
        $this->timeHoraInicio = $timeHoraInicio;

        return $this;
    }

    /**
     * Get the value of timeHoraFin
     */ 
    public function getTimeHoraFin()
    {
        return $this->timeHoraFin;
    }

    /**
     * Set the value of timeHoraFin
     *
     * @return  self
     */ 
    public function setTimeHoraFin($timeHoraFin)
    {
        $this->timeHoraFin = $timeHoraFin;

        return $this;
    }
}

?>