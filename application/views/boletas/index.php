            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    	<h3 class="text-center"><u>NUEVA BOLETA</u></h3>
                    </div>
                    
			<div class="container">
				<div class="row">
					<div class="col-md-6 row">
						<div class="col-md-5"><h4>Boleta Numero:</h4></div>
						<div class="col-md-7"><input type="text" class="form-control" id="boleta" name="boleta" value="<?php echo $ultima_boleta->idboleta + 1;?>" readonly></div>
						
					</div>
					<div class="col-md-6">
						<h3>Fecha: <?php echo date("d-m-Y"); ?></h3>
					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-4 ">
						<label for="dni">DNI:</label>
						<input type="text" class="form-control" maxlength="8" id="dni" name="dni">
						
					</div>
					<div id="datos_personales" class="col-md-8 row">
							<div class="form-group col-md-4">
								<label for="nombres">Nombres:</label>
								<input type="text" class="form-control" id="nombres" name="nombres">
							</div>
						
							<div class="form-group col-md-4">
								<label for="a_paterno">Apellido Paterno:</label>
								<input type="text" class="form-control" id="a_paterno" name="a_paterno">
							</div>
							<div class="form-group col-md-4">
								<label for="a_materno">Apellido Materno:</label>
								<input type="text" class="form-control" id="a_materno" name="a_materno">
							</div>
					</div>
				</div>
					
				<hr>
				<div class="row">
					<div class="col-md-10">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<label for="cprocedimiento">Clasificador:</label>
									<select name="cprocedimiento" id="cprocedimiento" class="form-control">
									<option value="">--Seleccione--</option>
									<?php foreach ($cprocedimientos as $cpro) {
									?>
									<option value="<?php echo $cpro->idcprocedimientos; ?>"><?php echo $cpro->denominacion; ?></option>
									<?php  }?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="procedimiento">Procedimiento:</label>
									<select name="procedimiento" id="procedimiento" class="form-control">
									<option value="">--Seleccione--</option>

									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="row">
											<div id="precio" class="col-md-6">
											<label for="valor">Precio Unidad:</label>
											<input type="text" class="form-control" name="valor" placeholder="0.00" readonly>
											</div>
											<div class="col-md-6">
											<label for="cantidad">Cantidad:</label>
											<input type="number" class="form-control" name="cantidad" id="cantidad" value="1" min="1">
											</div>
									</div>
									
								</div>
								<div class="col-md-6">
									<label for="descripcion:">Descripcion:</label>
									<input type="text" class="form-control" name="descripcion" id="descripcion" value="Ninguna">
								</div>
							</div>
						</div>	
					</div>
					
					<div class="col-md-2">
						<button class="btn btn-success" id="agregar_procedimiento"><i class="far fa-plus-square"></i> Agregar</button>
						<hr>
						<a href="<?php echo base_url('boleta/boleta_pdf/').($ultima_boleta->idboleta+1); ?>" target="__blank">
							<button class="btn btn-warning" id="boleta_pdf">
							<i class="far fa-file"></i> Boleta
							</button>
						</a>
					</div>
				</div>


			</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="tabla_detalles">
					<h3>Detalles de Boleta</h3>	
				</div>
			</div>
		</div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </section>
