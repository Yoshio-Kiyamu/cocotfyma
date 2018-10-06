
<?php require_once('../private/initialize.php'); ?>
<?php

  $nombre = utf8_decode($_GET['nombre']);

  $codigos = sku::col_contains_unique_values('item_nombre',$nombre,'talla');
   ChromePhp::log($codigos);
 ?>

  <!--<label for="droptallaVIENEDEAJAX">Seleccionar talla</label>-->
  <!--<select class="form-control select_talla" id="droptalla">-->
    <option selected> click </option>
    <?php foreach($codigos as $codigo){ ?>
      <?php //ChromePhp::log(utf8_encode($codigo->talla)); ?>
       <option><?php echo utf8_encode($codigo->talla);  ?></option>
    <?php } ?>
  <!--</select>-->
