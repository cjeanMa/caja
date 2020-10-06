	<div id="precio">
	<label for="valor">Precio Unidad:</label>
	<input type="text" class="form-control" name="valor" placeholder="<?php
	 foreach($datos_procedimiento as $datos){echo $datos->costo;} ?>" readonly>
	</div>