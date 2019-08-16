<?php  
	
	class data_Usuario
	{
		private $IdUsuario;
		private $Usuario;
		private $clave ;
		private	$IdRol;
		private $varNombres;
		private $varApellidos;
		Private $Estado;
		private $Dependencia;
		private $CambioContrasena;
		private $UsuarioCreador;
		private $DireccionMac;
		private $DireccionIp;


		/**
		 * Get the value of IdUsuario
		 */ 
		public function getIdUsuario()
		{
				return $this->IdUsuario;
		}

		/**
		 * Set the value of IdUsuario
		 *
		 * @return  self
		 */ 
		public function setIdUsuario($IdUsuario)
		{
				$this->IdUsuario = $IdUsuario;

				return $this;
		}

		/**
		 * Get the value of Usuario
		 */ 
		public function getUsuario()
		{
				return $this->Usuario;
		}

		/**
		 * Set the value of Usuario
		 *
		 * @return  self
		 */ 
		public function setUsuario($Usuario)
		{
				$this->Usuario = $Usuario;

				return $this;
		}

		/**
		 * Get the value of clave
		 */ 
		public function getClave()
		{
				return $this->clave;
		}

		/**
		 * Set the value of clave
		 *
		 * @return  self
		 */ 
		public function setClave($clave)
		{
				$this->clave = $clave;

				return $this;
		}

		/**
		 * Get the value of IdRol
		 */ 
		public function getIdRol()
		{
				return $this->IdRol;
		}

		/**
		 * Set the value of IdRol
		 *
		 * @return  self
		 */ 
		public function setIdRol($IdRol)
		{
				$this->IdRol = $IdRol;

				return $this;
		}

		/**
		 * Get the value of Estado
		 */ 
		public function getEstado()
		{
				return $this->Estado;
		}

		/**
		 * Set the value of Estado
		 *
		 * @return  self
		 */ 
		public function setEstado($Estado)
		{
				$this->Estado = $Estado;

				return $this;
		}

		/**
		 * Get the value of varNombres
		 */ 
		public function getVarNombres()
		{
				return $this->varNombres;
		}

		/**
		 * Set the value of varNombres
		 *
		 * @return  self
		 */ 
		public function setVarNombres($varNombres)
		{
				$this->varNombres = $varNombres;

				return $this;
		}

		/**
		 * Get the value of varApellidos
		 */ 
		public function getVarApellidos()
		{
				return $this->varApellidos;
		}

		/**
		 * Set the value of varApellidos
		 *
		 * @return  self
		 */ 
		public function setVarApellidos($varApellidos)
		{
				$this->varApellidos = $varApellidos;

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
		 * Get the value of CambioContrasena
		 */ 
		public function getCambioContrasena()
		{
				return $this->CambioContrasena;
		}

		/**
		 * Set the value of CambioContrasena
		 *
		 * @return  self
		 */ 
		public function setCambioContrasena($CambioContrasena)
		{
				$this->CambioContrasena = $CambioContrasena;

				return $this;
		}

		/**
		 * Get the value of UsuarioCreador
		 */ 
		public function getUsuarioCreador()
		{
				return $this->UsuarioCreador;
		}

		/**
		 * Set the value of UsuarioCreador
		 *
		 * @return  self
		 */ 
		public function setUsuarioCreador($UsuarioCreador)
		{
				$this->UsuarioCreador = $UsuarioCreador;

				return $this;
		}

		/**
		 * Get the value of DireccionMac
		 */ 
		public function getDireccionMac()
		{
				return $this->DireccionMac;
		}

		/**
		 * Set the value of DireccionMac
		 *
		 * @return  self
		 */ 
		public function setDireccionMac($DireccionMac)
		{
				$this->DireccionMac = $DireccionMac;

				return $this;
		}

		/**
		 * Get the value of DireccionIp
		 */ 
		public function getDireccionIp()
		{
				return $this->DireccionIp;
		}

		/**
		 * Set the value of DireccionIp
		 *
		 * @return  self
		 */ 
		public function setDireccionIp($DireccionIp)
		{
				$this->DireccionIp = $DireccionIp;

				return $this;
		}
	}

?>