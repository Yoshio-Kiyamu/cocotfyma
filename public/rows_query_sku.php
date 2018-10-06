<?php require_once('../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);
  $talla = utf8_decode($_GET['talla']);

  //num rows based on query and given parameters
  if($talla == 'click'){
    $total_count = sku::count_all_con_query('item_nombre',$nombre);
  }elseif($talla != 'click'){
    $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'talla',$talla);
  }
ChromePhp::log('rows_quey_sku ', $total_count);

?>


<p id="resultado_busqueda" class="resultado_busqueda">Resultado de busqueda: <?php  echo $total_count; ?> filas</p>
