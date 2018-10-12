document.addEventListener('DOMContentLoaded', function(){

  const addForm = document.forms['addvariables'];
  const inputnombre = addForm.querySelector('.cl_sku_nombre');

  inputnombre.addEventListener('input', function(e){ //trigger cuando el usuario teclee en el inputbox del nombreSKU
    e.preventDefault();//no hay refresh de pagina
    const addForm = document.forms['addvariables'];
    const inputnombre = addForm.querySelector('.cl_sku_nombre');
    var $nombre_val = inputnombre.value;
    replaceOptions($nombre_val);
  });

  function replaceOptions($nombre_val) {
    var target = document.querySelector('.dropdownColor select');
  //console.log('DOM target!! ', target);

    //borrar los tags de option '<option></option>'
    while (target.firstChild) {
        target.removeChild(target.firstChild);
    }

    var url = 'ajax/dropdown_color.php?nombre=' + $nombre_val;

    //crear objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    //xhr.open('GET', url+"?"+parametros, true);
    xhr.onreadystatechange = function () {
      //console.log('readyState: ' + xhr.readyState);
      if(xhr.readyState == 2) {
        target.innerHTML = '<option>Un momento...</option>';
      }
      if(xhr.readyState == 4 && xhr.status == 200) {
        //console.log(xhr.responseText);
        target.innerHTML = xhr.responseText;
      }
    }
    xhr.send();
  }




});//DOM content load
