<?php require_once('../private/initialize.php'); ?>
<?php //require_login(); ?>  <!--si no esta logeado redirect a login.php-->
<?php $page_title = 'ProductosTerminados'; ?>
<?php include('front_end/headeri.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('stylesheets/style_sku.css'); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />

<?php
   //include 'ChromePhp.php';
   ChromePhp::log('Hello console!');

   //pagination variables
   $current_page = $_GET['page'] ?? 1;
   $nombre = $_GET['nombre'] ?? '';
   $talla = $_GET['talla'] ?? '';

   if($nombre == ''){ //cuando el usuario no pone filtros de busqueda
       $per_page = 100;
       $total_count = sku::count_all();
       $pagination = new Pagination($current_page, $per_page, $total_count);
       $num_rows_offset = $pagination->offset();
       $codigos = sku::find_all_offset_page($per_page,$num_rows_offset);

   }elseif($nombre != '' && $talla == 'click' || $nombre != '' && $talla == ''){//cuando hay filtro por nombre de producto y no por talla
     $nombre = utf8_decode($_GET['nombre']);
     $current_page = $_GET['page'] ?? 1;
     $per_page = 15;
     $total_count = sku::count_all_con_query('item_nombre',$nombre);
     $pagination = new Paginationfilt_name($current_page, $per_page, $total_count);
     $num_rows_offset = $pagination->offset();
     $codigos = sku::find_all_offset_page_like($per_page, $num_rows_offset,'item_nombre',$nombre);

   }elseif($nombre != '' && $talla != 'click' && $talla != ''){//cuando hay filtro por nombre y talla
     $nombre = utf8_decode($_GET['nombre']);
     $talla = utf8_decode($_GET['talla']);
     $current_page = $_GET['page'] ?? 1;
     $per_page = 15;
     $total_count = sku::count_all_con_query_2para('item_nombre',$nombre,'talla',$talla);
     $pagination = new Paginationfilt_name($current_page, $per_page, $total_count);
     $num_rows_offset = $pagination->offset();
     $codigos = sku::find_all_offset_page_like_2para($per_page, $num_rows_offset,'item_nombre',$nombre,'talla',$talla);
    }

 ?>




 <section class="alternate page-heading">
   <div class="container">
     <header>
       <h7>nota(*): No es necesario escribir el nombre completo del producto</h7>
     </header>

  <form id="addvariables">
     <div class="form-row d-flex">
         <div class="col">
           <label for="nom_input">Nombre producto</label>
           <input id="nom_input" class="form-control cl_sku_nombre searchParameter" type="text" placeholder="nombre producto" />
         </div><!-- primera col-->

         <div class="col">
           <div class="form-group dropdowntalla">
             <label for="droptalla">Seleccionar talla</label>
             <select class="form-control searchParameter" id="droptalla">
               <option> </option>
               <option> </option>
               <option> </option>
             </select>
           </div>
         </div><!-- segunda col-->

         <div class="col">
           <div class="form-group dropdownColor">
             <label for="dropColor">Seleccionar Color</label>
             <select class="form-control searchParameter" id="dropColor">
               <option> </option>
               <option> </option>
               <option> </option>
             </select>
           </div>
         </div><!-- tercera col-->

         <div class="col">
           <button class="btn btn-primary btn-md mt-4">buscar</button>
         </div><!-- cuarta col-->

     </div><!-- class="form-row d-flex" -->
  </form>

  <div class="col">
    <p id="resultado_busqueda" class="resultado_busqueda">Resultado de busqueda: _ filas</p>
  </div>

     <p class="lead"></p>
 </section>
 <hr>
 <div class="container">
 <div class="row">
   <div id="index_tabla" class="col-md-12">

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

     //links para pagination
     $nombre = $_GET['nombre'] ?? '';
     $talla = $_GET['talla'] ?? '';

     if($nombre == ''){
       $url = url_for('index.php');
       echo $pagination->page_links($url);

     }elseif($nombre != '' && $talla == 'click'){
       $url = url_for('index.php?nombre=' .  utf8_encode($nombre));
       echo $pagination->page_links($url);

     }elseif($nombre != '' && $talla != 'click'){
       $url = url_for('index.php?nombre=' .  utf8_encode($nombre) . '&talla=' . utf8_encode($talla));
       echo $pagination->page_links($url);
     }

?>
</div><!-- index_tabla-->


 </div>

 </div>

   <!-- includes de librerias -->
   <section id="loco">
     <script src="excel-bootstrap-table-filter-bundle.js"></script>
     <link rel="stylesheet" href="excel-bootstrap-table-filter-style.css" />
     <script>
       // Use the plugin once the DOM has been loaded.
       // Apply the plugin
       $(function () {
         $('#table').excelTableFilter();
       });
     </script>
   </section>
  <!-- Ajax pages for dynamic search options -->
  <script src="ajax/buscar.js"></script>
  <script src="ajax/rows_query_sku.js"></script>
  <script src="ajax/dropdown_talla.js"></script>
  <script src="ajax/dropdown_color.js"></script>
&nbsp;
&nbsp;
<?php include('front_end/footer.php'); ?>
&nbsp;
