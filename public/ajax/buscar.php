<?php require_once('../../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);
  $talla = utf8_decode($_GET['talla']);
  $color = utf8_decode($_GET['color']);
//ChromePhp::log($talla,$color);

  //pagination variables
  $current_page = $_GET['page'] ?? 1;
  $per_page = 15;
  //num rows based on query and given parameters
  if($talla == 'click' && $color == 'click'){
    $total_count = sku::count_all_con_query('item_nombre',$nombre);
  }elseif($talla != 'click' && $color == 'click'){
    $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'talla',$talla);
  }elseif($talla == 'click' && $color != 'click'){
    $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'estampado_color_uno',$color);
  }elseif($talla != 'click' && $color != 'click'){
    $total_count = sku::count_all_con_query_3para('item_nombre',$nombre,'talla',$talla,'estampado_color_uno',$color);
  }

  $pagination = new Paginationfilt_name($current_page, $per_page, $total_count);
  $num_rows_offset = $pagination->offset();

  //DB pulled data based on query and given parameters
  if($talla == 'click' && $color == 'click'){
    $codigos = sku::find_all_offset_page_like($per_page, $num_rows_offset,'item_nombre',$nombre);
  }elseif($talla != 'click' && $color == 'click'){
    $codigos = sku::find_all_offset_page_like_2para($per_page, $num_rows_offset,'item_nombre',$nombre,'talla',$talla);
  }elseif($talla == 'click' && $color != 'click'){
    $codigos = sku::find_all_offset_page_like_2para($per_page, $num_rows_offset,'item_nombre',$nombre,'estampado_color_uno',$color);
  }elseif($talla != 'click' && $color != 'click'){
    $codigos = sku::find_all_offset_page_like_3para($per_page, $num_rows_offset,'item_nombre',$nombre,'talla',$talla,'estampado_color_uno',$color);
  }
//ChromePhp::log('DB pulled data-> ', $codigos);

?>

<table id="table" class="table table-bordered table-intel">
  <thead>
    <tr>
      <th class="filter">Codigo</th>
      <th class="filter">Nombre</th>
      <th class="filter">Estampado A</th>
      <th class="filter">Estampado B</th>
      <th class="filter">talla</th>
    </tr>
  </thead>
  <tbody>
         <?php
          //pull values from table: productos_terminados
          //$codigos = sku::find_all();
          foreach($codigos as $codigo){
          ?>
               <tr>
                  <td><?php echo utf8_encode($codigo->SKU); ?></td>
                  <td><?php echo utf8_encode($codigo->item_nombre); ?></td>
                  <td><?php echo utf8_encode($codigo->estampado_color_uno); ?></td>
                  <td><?php echo utf8_encode($codigo->estampado_color_dos); ?></td>
                  <td><?php echo utf8_encode($codigo->talla); ?></td>
              </tr>

          <?php } ?>

  </tbody>
</table>
<?php
  $url = url_for('index.php?nombre=' .  utf8_encode($nombre) . '&talla=' . utf8_encode($talla) . '&color=' . utf8_encode($color));
  echo $pagination->page_links($url);
?>
