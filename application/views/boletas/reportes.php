  <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    	<h3 class="text-center"><u>REPORTES</u></h3>
                    </div>
                    <div class="container">
                    	<div class="row">
                    		<div class="col-md-3">
                    			<label for="idboleta">NUMERO DE BOLETA:</label>
                    		</div>
                    		<div class="col-md-3">
                    			<input type="number" id="idboleta" name="idboleta" class="form-control" max="100000000" placeholder="Ingrese el numero de Boleta">
                    		</div>
                    		<div class="col-md-6">
                    			<button class="btn btn-primary form-control" id="buscar_boleta"><span class="fa fa-search"></span> Buscar</button>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-6">
                    			<label for="f_inicio">Fecha Inicio:</label>
                    			<input type="date" id="f_inicio" name="f_inicio" class="form-control">
                    		</div>
                    		<div class="col-md-6">
                    			<label for="f_fin">Fecha Final:</label>
                    			<input type="date" id="f_fin" name="f_fin" class="form-control">
                    		</div>
                    	</div>
                    	<br>
                    	<div class="row">
                    		<div class="col-md-12">
                    			<button class="btn btn-success form-control" id="ver_boletas"><i class="fa fa-eye"></i>Visualizar Boletas</button>
                    		      <hr>
                                <button class="btn btn-primary form-control" id="ver_informe"><i class="fa fa-eye"></i>Visualizar por Detalles</button>
                            </div>
                    	</div>
                    	<hr>

                    	<div id="tabla_reporte">
                    	</div>
                        <br>
                    </div>
                 </div>
            </section>