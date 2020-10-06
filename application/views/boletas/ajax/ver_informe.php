<hr>
<table class="table table-striped"">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">N°</th>
      <th scope="col">TIPO DE PROCEDIMIENTO</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $num = 1;
      $aux_sub_total = 0;
      $aux_total = 0;
      
      foreach ($cprocedimientos as $aux_cprocedimientos) { 

          foreach ($boletas as $aux_boletas) {
            if ($aux_boletas->idcprocedimientos == $aux_cprocedimientos->idcprocedimientos) {
              $aux_sub_total += $aux_boletas->costo_detalle;
              $aux_total += $aux_boletas->costo_detalle; 
            }
          }
      ?>
            <tr class="text-center">
            <td><?php echo $num++; ?></td>  
            <td align="left"><?php echo $aux_cprocedimientos->denominacion; ?></td>
            <td><?php echo number_format($aux_sub_total,2,'.',''); ?></td>
            </tr>

    
    <?php
      $aux_sub_total = 0;
     } ?>
    <tr class="text-center">
      <td colspan="2" bgcolor="gray">TOTAL</td>
      <td bgcolor="gold"><?php echo number_format($aux_total,2,'.',''); ?></td>
    </tr>
  </tbody>
</table>