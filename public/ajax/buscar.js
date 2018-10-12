document.addEventListener('DOMContentLoaded', function(){


    const addForm = document.forms['addvariables'];
    const addboton = addForm.querySelector('button');

    addboton.addEventListener('click', function(e){
      e.preventDefault();//no hay refresh de pagina
      const addForm = document.forms['addvariables'];
      const addboton = addForm.querySelector('button');
      var $nombre_val = addForm.querySelector('.cl_sku_nombre').value;
      var $talla_val = addForm.querySelector('.dropdowntalla select').value;
      var $color_val = addForm.querySelector('.dropdownColor select').value;

      replaceTable($nombre_val,$talla_val,$color_val);//bota table + pagination

    });

      function replaceTable($nombre_val,$talla_val,$color_val) {
        var target = document.getElementById("index_tabla");
        var url = 'ajax/buscar.php?nombre=' + $nombre_val + '&talla=' + $talla_val + '&color=' + $color_val;

        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {
          //console.log('readyState: ' + xhr.readyState );
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;
          }
        }
        xhr.send();//se llena cuando se usa POST method
      }



});//DOM content load
