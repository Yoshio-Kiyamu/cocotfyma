<!-- used only to populate dropdown options | COLOR 1-->
<?php require_once('../../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);

  $codigos = sku::col_contains_unique_values('item_nombre',$nombre,'estampado_color_uno');
   //ChromePhp::log($codigos);
 ?>


    <option selected> click </option>
    <?php foreach($codigos as $codigo){ ?>
      <?php //ChromePhp::log(utf8_encode($codigo->estampado_color_uno)); ?>
       <option><?php echo utf8_encode($codigo->estampado_color_uno);  ?></option>
    <?php } ?>
