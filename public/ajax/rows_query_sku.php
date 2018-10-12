<!-- Populate found x number of rows based on search parameters in a dynamic way-->
<?php require_once('../../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);
  $talla = utf8_decode($_GET['talla']);
  $color = utf8_decode($_GET['color']);

  //num rows based on query and given parameters
  if($talla == 'click' && $color == 'click'){
    $total_count = sku::count_all_con_query('item_nombre',$nombre);

  }elseif($talla != 'click' && $color == 'click' ){
    $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'talla',$talla);

  }elseif($talla == 'click' && $color != 'click' ){
    $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'estampado_color_uno',$color);

  }elseif($talla != 'click' && $color != 'click'){
    $total_count = sku::count_all_con_query_3para('item_nombre',$nombre,'talla',$talla,'estampado_color_uno',$color);

  }
//ChromePhp::log('rows_quey_sku ', $total_count);

?>


<p id="resultado_busqueda" class="resultado_busqueda">Resultado de busqueda: <?php  echo $total_count; ?> filas</p>
