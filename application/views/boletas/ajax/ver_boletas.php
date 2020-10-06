<div>
  <a href="<?php echo base_url('Boleta/rep_pdf_boletas'); ?>"><button class="btn btn-warning form-control" id="imprimir_reporte"><i class="fa fa-print"></i>Imprimir Reporte</button></a>
</div>
<hr>
<table class="table table-striped"  id="datatables_boletas>
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">N°</th>
      <th scope="col">BOLETA</th>
      <th scope="col">FECHA</th>
      <th scope="col">INTERESADO</th>
      <th scope="col">PAGO</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $num = 1;
      $aux_id = 0;
      $aux_sub_total = 0;
      $aux_total = 0;
      $aux_fecha = '';
      $aux_nombres = '';
      
      foreach ($idboletas as $aux_idboletas) { 

          foreach ($boletas as $aux_boletas) {
            if ($aux_boletas->idboleta == $aux_idboletas->idboleta) {
              $aux_nombres = $aux_boletas->apellidoPaterno.' '.$aux_boletas->apellidoMaterno.' '.$aux_boletas->nombres;
              $aux_sub_total += $aux_boletas->costo_detalle;
              $aux_total += $aux_boletas->costo_detalle; 
            }
          }
            $aux_id = $aux_idboletas->idboleta;
            $aux_fecha = $aux_idboletas->fecha;
      ?>
            <tr class="text-center">
            <td><?php echo $num++; ?></td>  
            <td><?php echo $aux_id; ?></td>
            <td><?php echo $aux_fecha; ?></td>
            <td align="left"><?php echo $aux_nombres; ?></td>
            <td><?php echo number_format($aux_sub_total,2,'.',''); ?></td>
            </tr>

    
    <?php
      $aux_sub_total = 0;
     } ?>
    <tr class="text-center">
      <td colspan="4" bgcolor="gray">TOTAL</td>
      <td bgcolor="gold"><?php echo number_format($aux_total,2,'.',''); ?></td>
    </tr>
  </tbody>
</table>