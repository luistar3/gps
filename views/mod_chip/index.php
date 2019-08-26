<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

					

				<div class="page-header">
					
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				

				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<!-- Large modal -->
					<div class="col-md-2 col-sm-12">
								<!-- 						
							<a href="#" id="boton" >
							boton
							</a> -->
							<a href="#" id="chipBotonNuevo" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" type="button" style="color: rgb(255, 255, 255);background-color: rgb(19, 56, 74);" >
							AGREGAR NUEVO
							</a>
							<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
																						
										<form role="form" id="" class="toggleDisabled" onsubmit="return false;">
												<input id="chipId" value="0" type="hidden"/>
																					
												<div class="form-group row">
													
													<label class="col-sm-12 col-md-2 col-form-label">Numero de la linea</label>
													
													<div class="col-sm-12 col-md-10">
														<input class="form-control" id="chipNumero" value="" type="number" placeholder="920388043" 
														data-validation="number" data-validation-allowing="float,negative" data-validation-error-msg="Escriba un Numero Válido"/>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Tarifa de la linea</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" value="" id="chipTarifa" type="text" placeholder="S./"
														data-validation="number" data-validation-allowing="float" 
		 												data-validation-decimal-separator="."data-validation-error-msg="Escriba un Tarifa Válido"/>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Fecha del Contrato</label>
													<div class="col-sm-12 col-md-10">
														<input class="form-control" id="chipFechaContrato" placeholder="Select Date" type="date"
														data-validation="date"data-validation-error-msg="Escriba una Fecha"/>
													</div>
												</div>
												
												<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Operador</label>
												<div class="col-sm-12 col-md-10">
													<select class="custom-select col-12" data-validation="required" id="chipOperador" data-validation-error-msg="Selecione un Operador">
														<option value="">Selecciona...</option>
														<option value="bitel">Bitel</option>
														<option value="claro">Claro</option>
														<option value="movistar">Movistar</option>
														<option value="entel">Entel</option>
													</select>
												</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-12 col-md-2 col-form-label">Tipo de Contrato</label>
													<div class="col-sm-12 col-md-10">
														<select class="custom-select col-12" id="chipTipo" data-validation="required">
															<option value="">Selecciona...</option>
															<option value="prepago">Pre-Pago</option>
															<option value="postpago">Post-Pago</option>
														
														</select>
													</div>
												</div>
											<div class="modal-footer">
												<button type="button"  id="chipCancelar" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" id="chipGuardar"class="btn btn-primary">Save changes</button>
											</div>
										</form>
																		
										</div>
										
									</div>
								</div>
							</div>
						
					</div>
					</div>
					<div class="row">
						<table id="tablaListarChip"class="stripe data-table-export nowrap compact table-striped" style="min-height:120px;" >
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Numero Chip</th>
									<th>Tipo Contrato</th>
									<th>Operador</th>									
									<th>Fecha Contrato</th>
									<th>Meses de Servicio</th>
									<th>Tarifa</th>
									<th>Traza</th>
                                    <th></th>
                                    
									
								</tr>
							</thead>
							
                    </div>
                    
                    
				</div>
                <!-- Export Datatable End -->


			</div>
		
		</div>
	</div>