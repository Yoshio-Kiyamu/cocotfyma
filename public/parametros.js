document.addEventListener('DOMContentLoaded', function(){


    const addForm = document.forms['addvariables'];
    const addboton = addForm.querySelector('button');

    addboton.addEventListener('click', function(e){
      e.preventDefault();//no hay refresh de pagina
      const addForm = document.forms['addvariables'];
      const addboton = addForm.querySelector('button');
      var $nombre_val = addForm.querySelector('.cl_sku_nombre').value;
      var $talla_val = addForm.querySelector('.dropdowntalla select').value;

      replaceTable($nombre_val,$talla_val);//bota table + pagination
      replaceSearchRow($nombre_val,$talla_val);
    });

      function replaceTable($nombre_val,$talla_val) {
        var target = document.getElementById("index_tabla");
        var url = 'query_sku.php?nombre=' + $nombre_val + '&talla=' + $talla_val;

        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {
          console.log('readyState: ' + xhr.readyState + ' ' + $nombre_val + ' ' + $talla_val);
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;
            //window.location.replace("index_dos.php?nombre=" +  $nombre_val + "&talla=" + $talla_val);//refresh page
          }
        }
        xhr.send();
      }

      function replaceSearchRow($nombre_val,$talla_val) {
        var target2 = document.querySelector('.resultado_busqueda').parentNode;
        var url = 'rows_query_sku.php?nombre=' + $nombre_val + '&talla=' + $talla_val;

        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {
          console.log('readyState: ' + xhr.readyState + ' ' + $nombre_val + ' ' + $talla_val);
          if(xhr.readyState == 2) {
            target2.innerHTML = '<p id="resultado_busqueda" class="resultado_busqueda">' + '';
            'Resultado de busqueda: Loading... filas</p>';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target2.innerHTML = xhr.responseText;
          }
        }
        xhr.send();
      }


});//DOM content load
