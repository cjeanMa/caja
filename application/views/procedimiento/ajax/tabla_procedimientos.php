
				<div class="col-md-12">
					<h4>LISTA DE PROCEDIMIENTOS</h4>	
					<table class="table table-striped" style="width: 100%" id="procedimientos">
						<thead class="thead-dark">
						    <tr class="text-center">
						      <th scope="col">ID</th>
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
			