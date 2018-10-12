document.addEventListener('DOMContentLoaded', function(){

  const addForm = document.forms['addvariables'];
  const elementsArray = document.querySelectorAll('.searchParameter');

  elementsArray.forEach(function(elem) {
    elem.addEventListener("input", function(e) {
      e.preventDefault();//no hay refresh de pagina

      const addForm = document.forms['addvariables'];
      const addboton = addForm.querySelector('button');
      var $nombre_val = addForm.querySelector('.cl_sku_nombre').value;
      var $talla_val = addForm.querySelector('.dropdowntalla select').value;
      var $color_val = addForm.querySelector('.dropdownColor select').value;

      replaceSearchRow($nombre_val,$talla_val,$color_val);
    });
});



  //esto le muestra al usuario la cantidad de rows de acuerdo a los parametros de busqueda dados
  function replaceSearchRow($nombre_val,$talla_val,$color_val) {
    var target2 = document.querySelector('.resultado_busqueda').parentNode;
    var url = 'ajax/rows_query_sku.php?nombre=' + $nombre_val + '&talla=' + $talla_val  + '&color=' + $color_val;
//console.log('mi url: ' + $color_val + ' ' + $nombre_val + ' ' + $talla_val);
    //crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    //open request
    xhr.onreadystatechange = function () {
      //console.log('readyState: ' + xhr.readyState + ' ' + $nombre_val + ' ' + $talla_val);
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
