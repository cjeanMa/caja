<table class="table" id="t_boleta">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">N° Boleta</th>
      <th scope="col">INTERESADO</th>
      <th scope="col">FECHA</th>
      <th scope="col">DENOMINACION</th>
      <th scope="col">PRECIO UNI.</th>
      <th scope="col">CANT.</th>
      <th scope="col">SUBTOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $num = 1;
    $costo_total = 0;
    //funcion para conseguir el idboleta, nombre, y fecha, y saber la cantidad de filas
    $num_filas = 0;
    $nombre;
    $idboleta;
    $fecha;
    foreach ($reporte_boleta as $aux) {
      $idboleta = $aux->idboleta;
      $nombre = $aux->apellidoPaterno." ".$aux->apellidoMaterno.", ".$aux->nombres;
      $fecha = $aux->fecha;
      $num_filas++;
    }
    ?>
    <?php if($num_filas<>0){?>
      <tr class="text-center">
      <td rowspan="<?php echo $num_filas; ?>"><?php echo $idboleta; ?></td>
      <td rowspan="<?php echo $num_filas; ?>"><?php echo $nombre; ?></td>
      <td rowspan="<?php echo $num_filas; ?>"><?php echo $fecha; ?></td>
     <?php foreach ($reporte_boleta as $datos) { ?>
    
      <td align="center"><?php echo $datos->denominacion; ?></td>
      <td align="center"><?php echo $datos->costo; ?></td>
      <td align="center"><?php echo $datos->cantidad; ?></td>
      <td align="center"><?php echo $datos->costo_detalle; ?></td>
      <?php  $costo_total += $datos->costo_detalle;?>
    </tr>
    <?php $num++; } ?>
    <tr class="text-center">
      <td colspan="6" bgcolor="gray">TOTAL</td>
      <td bgcolor="gold"><?php echo number_format($costo_total,2,'.',''); ?></td>
    </tr>
    

    <?php 
    }//llave que cierra el if
    else{?>
    <h3 class="alert alert-primary">BOLETA NO EXISTE</h3>
   <?php }  ?>
    
  </tbody>
</table>