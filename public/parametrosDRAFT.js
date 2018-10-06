
document.addEventListener('DOMContentLoaded', function(){


    const addForm = document.forms['addvariables'];
    const addboton = addForm.querySelector('button');

    addboton.addEventListener('click', function(e){
      e.preventDefault();//no hay refresh de pagina
      const addForm = document.forms['addvariables'];
      const addboton = addForm.querySelector('button');
      var $nombre_val = document.querySelector('.cl_sku_nombre').value;
      replaceText($nombre_val);

    });

      function replaceText($nombre_val) {
        var target = document.getElementById("index_tabla");
        var url = 'query_sku.php?nombre=' + $nombre_val;

        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {
          //console.log('readyState: ' + xhr.readyState);
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            target.innerHTML = xhr.responseText;
            window.location.replace("index_dos.php?nombre=" +  $nombre_val);
          }
        }
        xhr.send();
      }



});//DOM content load
