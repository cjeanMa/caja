<!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    	<h3 class="text-center">PROCEDIMIENTOS</h3>
                    </div>
             <div class="container">
			<!--BOTONES DE INICIO DE MODALES-->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_procedimiento">
	  		Agregar Procedimiento
			</button>

			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_cprocedimiento">
			  Agregar Clasificador
			</button>

			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_act_procedimiento">
			  Agregar Clasificador
			</button>
			</div>


            <!-- INICIO MODAL NUEVO PROCEDIMIENTO-->
            <div class="modal fade" id="modal_procedimiento" tabindex="-1" role="dialog" aria-labelledby="modal_procedimiento" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">NUEVO PROCEDIMIENTO</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				      </div>
				      <div class="modal-body">

					<div class="row">
						<div class="col-md-12">
						<label for=""> Denominación:</label>
						<input type="text" class="form-control" id="procedimiento" placeholder="PROCEDIMIENTO" onkeyup="mayus(this)">
						</div>
					</div>

					<div class="row">
					<div class="col-md-6">
							<label for=""> Plazo de Atencion:</label>
						<input type="text" class="form-control" id="plazo" placeholder="Ejm. 1 DIA, 2 DIAS" onkeyup="mayus(this)">	
					</div>
					<div class="col-md-6">
							<label for=""> Costo:</label>
						<input type="number" class="form-control" id="costo" placeholder="Ejm. 10.00">	
					</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<label for="">Clasificador de Procedimiento</label>
							<select name="cprocedimiento" id="cprocedimiento" class="form-control">
								<option value="">--Seleccione--</option>
								<?php foreach ($cprocedimientos as $data_cprocedimientos) {
								?>
									<option value="<?php echo $data_cprocedimientos->idcprocedimientos; ?>"><?php echo $data_cprocedimientos->denominacion; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				        <button class="btn btn-primary btn-block" id="agregar_procedimiento"  data-dismiss="modal"><span class="fa fa-plus"></span>Agregar</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Fin de modal NUEVO PROCEDIMIENTO-->

				<!-- INICIO MODAL ACTUALIZAR PROCEDIMIENTO-->
            <div class="modal fade" id="modal_procedimiento_up" tabindex="-1" role="dialog" aria-labelledby="modal_procedimiento_up" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">MODIFICAR PROCEDIMIENTO</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
				      </div>
				      <div class="modal-body">

					  <div class="row">
						<div class="col-md-12">
						<label for=""> Identificador:</label>
						<input type="text" class="form-control" id="idprocedimiento_up" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						<label for=""> Denominación:</label>
						<input type="text" class="form-control" id="procedimiento_up" placeholder="PROCEDIMIENTO" onkeyup="mayus(this)">
						</div>
					</div>

					<div class="row">
					<div class="col-md-6">
							<label for=""> Plazo de Atencion:</label>
						<input type="text" class="form-control" id="plazo_up" placeholder="Ejm. 1 DIA, 2 DIAS" onkeyup="mayus(this)">	
					</div>
					<div class="col-md-6">
							<label for=""> Costo:</label>
						<input type="number" class="form-control" id="costo_up" placeholder="Ejm. 10.00">	
					</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<label for="">Clasificador de Procedimiento</label>
							<select name="cprocedimiento" id="cprocedimiento_up" class="form-control">
								<option value="">--Seleccione--</option>
								<?php foreach ($cprocedimientos as $data_cprocedimientos) {
								?>
									<option value="<?php echo $data_cprocedimientos->idcprocedimientos; ?>"><?php echo $data_cprocedimientos->denominacion; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				        <button class="btn btn-primary btn-block" id="actualizar_procedimiento" data-dismiss="modal"><span class="fa fa-plus"></span>Modificar</button>
				      </div>
				    </div>
				  </div>
				</div>
				<!--Fin de modal ACTUALIZAR PROCEDIMIENTO-->


				<!--INICIO de modal NUEVO CLASE PROCEDIMIENTO-->
				<div class="modal fade" id="modal_cprocedimiento" tabindex="-1" role="dialog" aria-labelledby="modal_cprocedimiento" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">NUEVA CATEGORIA DE PROCEDIMIENTO</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
								<div class="row">
									<div class="col-md-12">
									<label for="cprocedimiento">Nombre Categoria:</label>
									<input type="text" class="form-control" placeholder="NOMBRE DE CATEGORIA" name="nombre_cprocedimiento" id="nombre_cprocedimiento">
									</div>
								</div>
					      </div>
					      <div class="modal-footer">
					        <button class="btn btn-primary btn-block" id="agregar_cprocedimiento"><span class="fa fa-plus" data-dismiss="modal"></span>Agregar</button>
					      </div>
					    </div>
					  </div>
					</div>
				<!--Fin de modal NUEVO CLASE PROCEDIMIENTO-->				

					
				
		<hr>
		
			<div class="container">
				<div class="row" id="tabla_procedimientos">
					<div class="col-md-12">
						<h4>LISTA DE PROCEDIMIENTOS</h4>	
						<table class="table table-striped" style="width: 90%" id="procedimientos">
							<thead class="thead-dark">
								<tr class="text-center">
								<th>ID</th>
								<th scope="col">DENOMINACION</th>
								<th scope="col">PLAZO DE ATENCION</th>
								<th scope="col">COSTO</th>
								<th scope="col">CLASIFICACION</th>
								<th scope="col">ACCIONES</th>
								</tr>
							</thead>
								<tbody>
										<?php foreach ($procedimientos as $val_procedimiento) {
											
										?>
											<tr class="text-center">
											<?php $data = $val_procedimiento->idprocedimiento."||".$val_procedimiento->denominacion."||".$val_procedimiento->plazo_atencion."||".$val_procedimiento->costo."||".$val_procedimiento->idcprocedimientos; ?>
											<td><?php echo $val_procedimiento->idprocedimiento;?></td>  
											<td align="left"><?php echo $val_procedimiento->denominacion;?></td>
											<td><?php echo $val_procedimiento->plazo_atencion;?></td>
											<td><?php echo $val_procedimiento->costo;?></td>  
												<?php foreach ($cprocedimientos as $cproc){
													if ($cproc->idcprocedimientos == $val_procedimiento->idcprocedimientos) {
														?>
												<td><?php echo $cproc->denominacion;?></td>
												
												<?php
												}}  ?>
											<td>
												<button class="btn" data-toggle="modal" data-target="#modal_procedimiento_up" onclick="procedimientos_datos_up('<?php echo $data;?>')"><span class="fa fa-pen" style="color:green;"></span></button>
												<button class="btn"><span class="fa fa-trash" style="color:red"></span></button>

											</td>
											</tr>
										<?php   } ?>
								</tbody>
						</table>
					</div>
				</div>	
			</div>

		
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </section>
