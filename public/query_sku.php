<?php require_once('../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);
  //pagination variables
  $current_page = $_GET['page'] ?? 1;
  $per_page = 15;
  $total_count = sku::count_all_con_query('item_nombre',$nombre);

  $pagination = new Paginationfilt_name($current_page, $per_page, $total_count);
  $num_rows_offset = $pagination->offset();

  //$codigos = sku::find_all_offset_page($per_page,$num_rows_offset);
  $codigos = sku::find_all_offset_page_like($per_page, $num_rows_offset,'item_nombre',$nombre);
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
  $url = url_for('index_dos.php?nombre=' .  utf8_encode($nombre));
  echo $pagination->page_links($url);
?>
