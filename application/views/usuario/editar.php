<h1 class="text-center">REGISTRO DE USUARIOS</h1>
					<div class="container text-light bg-secondary">
						<div class="col-md-8 col-off-md-2">
							<form method="POST" action="<?php echo base_url('usuario/actualizar') ?>">
								<?php 
									foreach ($datosUsuario as $dusuario) {
									
									 ?>
								<div class="form-group">
									<input type="text" class="form-control" name="idusuario" value="<?php echo $dusuario->idusuario;?>" hidden>
								</div>
								<div class="form-group">
									<label for="">APELLIDO PATERNO:</label>
									<input type="text" class="form-control" name="ap_paterno" value="<?php echo $dusuario->apellidoPaterno;?>">
								</div>
								<div class="form-group">
									<label for="">APELLIDO MATERNO:</label>
									<input type="text" class="form-control" name="ap_materno" value="<?php echo $dusuario->apellidoMaterno;?>">
								</div>
								<div class="form-group">
									<label for="">NOMBRES:</label>
									<input type="text" class="form-control" name="nombres" value="<?php echo $dusuario->nombres; ?>">
								</div>
								<div class="form-group">
									<label for="">NOMBRE DE USUARIO:</label>
									<input type="text"class="form-control" name="nom_usuario" value="<?php echo $dusuario->nomUsuario; ?>">
								</div>
								<div class="form-group">
									<label for="">PASSWORD:</label>
									<input type="password"class="form-control" name="password" value="<?php echo $dusuario->pass; ?>">
								</div>
								<div class="form-group">
									<label for="">TIPO DE USUARIO:</label>
									<?php 
										$lista = array();
										foreach($MostrarTiposUsuario as $registro){
											$lista[$registro->idtipo_usuario] = $registro->nombre;
										}
										echo form_dropdown('tipo_usuario',$lista,$dusuario->idtipo_usuario,'class="form-control"');
									 ?>
								</div>
							<?php } //llave que cierra foreach datosusuario?>
								<button type="submit" class="btn btn-primary"> Registrar</button>
							</form>
						</div>
					</div>