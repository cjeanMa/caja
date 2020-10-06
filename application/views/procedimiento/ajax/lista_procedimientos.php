<select name="procedimiento" id="procedimiento" class="form-control">
<option value="">--Seleccione--</option>
<?php foreach ($procedimientos as $datos){ ?>
	<option value="<?php echo $datos->idprocedimiento; ?>"> <?php echo $datos->denominacion; ?></option>
<?php  } ?>
</select>

