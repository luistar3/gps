<?php


class data_ControlAsistencia{


private $IdControlAsistecia;
private $stimeFechaAsiStencia;
private $IdPersona;
private $IdEvento;
private $IdDetalleEvento;




/**
 * Get the value of IdControlAsistecia
 */ 
public function getIdControlAsistecia()
{
return $this->IdControlAsistecia;
}

/**
 * Set the value of IdControlAsistecia
 *
 * @return  self
 */ 
public function setIdControlAsistecia($IdControlAsistecia)
{
$this->IdControlAsistecia = $IdControlAsistecia;

return $this;
}

/**
 * Get the value of stimeFechaAsiStencia
 */ 
public function getStimeFechaAsiStencia()
{
return $this->stimeFechaAsiStencia;
}

/**
 * Set the value of stimeFechaAsiStencia
 *
 * @return  self
 */ 
public function setStimeFechaAsiStencia($stimeFechaAsiStencia)
{
$this->stimeFechaAsiStencia = $stimeFechaAsiStencia;

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
}


?>