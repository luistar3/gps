<?php  

	class data_Chip
	
	{
		private $idchip;
		private $operador;
		private $tipo_contrato;
		private $numero;
		private $estado;
		private $fecha;
		private $fechacontrato;
		private $eliminado;
		private $tarifa;


		/**
		 * Get the value of idchip
		 */ 
		public function getIdchip()
		{
				return $this->idchip;
		}

		/**
		 * Set the value of idchip
		 *
		 * @return  self
		 */ 
		public function setIdchip($idchip)
		{
				$this->idchip = $idchip;

				return $this;
		}

		/**
		 * Get the value of operador
		 */ 
		public function getOperador()
		{
				return $this->operador;
		}

		/**
		 * Set the value of operador
		 *
		 * @return  self
		 */ 
		public function setOperador($operador)
		{
				$this->operador = $operador;

				return $this;
		}

		/**
		 * Get the value of tipo_contrato
		 */ 
		public function getTipo_contrato()
		{
				return $this->tipo_contrato;
		}

		/**
		 * Set the value of tipo_contrato
		 *
		 * @return  self
		 */ 
		public function setTipo_contrato($tipo_contrato)
		{
				$this->tipo_contrato = $tipo_contrato;

				return $this;
		}

		/**
		 * Get the value of numero
		 */ 
		public function getNumero()
		{
				return $this->numero;
		}

		/**
		 * Set the value of numero
		 *
		 * @return  self
		 */ 
		public function setNumero($numero)
		{
				$this->numero = $numero;

				return $this;
		}

		/**
		 * Get the value of estado
		 */ 
		public function getEstado()
		{
				return $this->estado;
		}

		/**
		 * Set the value of estado
		 *
		 * @return  self
		 */ 
		public function setEstado($estado)
		{
				$this->estado = $estado;

				return $this;
		}

		/**
		 * Get the value of fecha
		 */ 
		public function getFecha()
		{
				return $this->fecha;
		}

		/**
		 * Set the value of fecha
		 *
		 * @return  self
		 */ 
		public function setFecha($fecha)
		{
				$this->fecha = $fecha;

				return $this;
		}

		/**
		 * Get the value of fechacontrato
		 */ 
		public function getFechacontrato()
		{
				return $this->fechacontrato;
		}

		/**
		 * Set the value of fechacontrato
		 *
		 * @return  self
		 */ 
		public function setFechacontrato($fechacontrato)
		{
				$this->fechacontrato = $fechacontrato;

				return $this;
		}

		/**
		 * Get the value of eliminado
		 */ 
		public function getEliminado()
		{
				return $this->eliminado;
		}

		/**
		 * Set the value of eliminado
		 *
		 * @return  self
		 */ 
		public function setEliminado($eliminado)
		{
				$this->eliminado = $eliminado;

				return $this;
		}

		/**
		 * Get the value of tarifa
		 */ 
		public function getTarifa()
		{
				return $this->tarifa;
		}

		/**
		 * Set the value of tarifa
		 *
		 * @return  self
		 */ 
		public function setTarifa($tarifa)
		{
				$this->tarifa = $tarifa;

				return $this;
		}
	}

?>