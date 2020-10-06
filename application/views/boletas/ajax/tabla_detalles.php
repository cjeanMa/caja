<table class="table">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">NUM</th>
      <th scope="col">PROCEDIMIENTO</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">VALOR UNI.</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $num = 1;
    $costo_total = 0;
     foreach ($detalles as $datos) { ?>

    <tr class="text-center">
      <td scope="row"><?php echo $num; ?></td>
      <td><?php echo $datos->denominacion; ?></td>
      <td><?php echo $datos->descripcion; ?></td>
      <td><?php echo $datos->cantidad; ?></td>
      <td><?php echo $datos->costo; ?></td>
      <td><?php echo $datos->costo_detalle ?></td>
      <?php  $costo_total += $datos->costo_detalle;?>
    </tr>
    <?php $num++; } ?>
    <tr class="text-center">
      <td colspan="5" bgcolor="gray">TOTAL</td>
      <td bgcolor="gold"><?php echo $costo_total; ?></td>
    </tr>
  </tbody>
</table>