            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
					<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lista</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Registrar</a>
		    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Registros</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		  		<table class="table">
  					<thead class="thead-dark text-center">
		  				<th>ID</th>
		  				<th>A. PATERNO</th>
		  				<th>A. MATERNO</th>
		  				<th>NOMBRES</th>
		  				<th>USUARIO</th>
		  				<th>PASS</th>
		  				<th>TIPO USUARIO</th>
		  				<th>ACCIONES</th>
		  			</thead>
		  			<tbody class="text-center">
		  				<?php 
		  				foreach ($ListaUsuarios as $dusuarios) {
		  				 ?>
		  				<tr>
		  					<td><?php echo $dusuarios->idusuario; ?></td>
		  					<td><?php echo $dusuarios->apellidoPaterno; ?></td>
		  					<td><?php echo $dusuarios->apellidoMaterno; ?></td>
		  					<td><?php echo $dusuarios->nombres; ?></td>
		  					<td><?php echo $dusuarios->usuario; ?></td>
		  					<td><?php echo $dusuarios->contraseña; ?></td>
		  					<td><?php echo $dusuarios->nombre; ?></td>
		  					<td><a href="<?php echo base_url('usuario/editar/').$dusuarios->idusuario;?>" id="editar_usuario" class="btn btn-warning" title="editar"><span class="fas fa-edit"></span></a>
		  						<a href="<?php echo base_url('usuario/eliminar/').$dusuarios->idusuario; ?>" id="eliminar_usuario" class="btn btn-danger" title="eliminar"><span class="fas fa-trash-alt"></span></a></td>
		  				</tr>
		  			<?php } ?>
		  			</tbody>
		  		</table>
		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							  		<!--Aqui entra el crud del usuario-->
					<h1 class="text-center">REGISTRO DE USUARIOS</h1>
					<div class="container text-light bg-dark">
						<div class="col-md-8 col-off-md-2">
							<form method="POST" action="<?php echo base_url('usuario/insert') ?>">
								<div class="form-group">
									<label for="">APELLIDO PATERNO:</label>
									<input type="text"class="form-control" name="ap_paterno" placeholder="APELLIDO PATERNO">
								</div>
								<div class="form-group">
									<label for="">APELLIDO MATERNO:</label>
									<input type="text"class="form-control" name="ap_materno" placeholder = "APELLIDO MATERNO">
								</div>
								<div class="form-group">
									<label for="">NOMBRES:</label>
									<input type="text"class="form-control" name="nombres" placeholder="NOMBRES">
								</div>
								<div class="form-group">
									<label for="">NOMBRE DE USUARIO:</label>
									<input type="text"class="form-control" name="nom_usuario" placeholder="NOMBRE DE USUARIO">
								</div>
								<div class="form-group">
									<label for="">PASSWORD:</label>
									<input type="password"class="form-control" name="password" placeholder="PASSWORD">
								</div>
								<div class="form-group">
									<label for="">TIPO DE USUARIO:</label>
									<select name="tipo_usuario" class="form-control">
										<?php foreach ($MostrarTiposUsuario as $value) { ?>
											<option value="<?php echo $value->idpermiso; ?>"><?php echo $value->nombre; ?></option>
										<?php  }?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary"> Registrar</button>
							</form>
						</div>
					</div>
		  </div>
		  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><?php echo $this->session->userdata('usuario');?></div>
		</div>

                    </div>
                    

 
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
