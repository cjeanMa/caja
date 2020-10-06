
			<div class="form-group col-md-4">
				<label for="nombres">Nombres:</label>
				<input type="text" class="form-control" id="nombres" name="nombres" value="<?php
				if(!$datos_personales){echo "";?>"<?php echo ">";}
				else{
				foreach($datos_personales as $persona){
				echo $persona->nombres; }?>"<?php echo "readonly>";}?>
			</div>
		
			<div class="form-group col-md-4">
				<label for="a_paterno">Apellido Paterno:</label>
				<input type="text" class="form-control" id="a_paterno" name="a_paterno" value="<?php if(!$datos_personales){echo "";?>"<?php echo ">";}
				else{
				foreach($datos_personales as $persona){echo $persona->apellidoPaterno; }?>"<?php echo "readonly>";}?>
			</div>
			<div class="form-group col-md-4">
				<label for="a_materno">Apellido Materno:</label>
				<input type="text" class="form-control" id="a_materno" name="a_materno" value="<?php if(!$datos_personales){echo "";?>"<?php echo ">";}
				else{
				foreach($datos_personales as $persona){echo $persona->apellidoMaterno;}?>"<?php echo "readonly>";}?>
			</div>