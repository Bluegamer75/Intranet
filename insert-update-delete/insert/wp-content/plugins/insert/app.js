document.addEventListener("DOMContentLoaded", function (event) {
  
  document.getElementById('boton2').addEventListener('click', insert);
  
})


function insert() {
  var id = document.getElementById('id').value;
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var company = document.getElementById('company').value;
  var datos = {
    'id': id,
    'username': username,
    'password': password,
    'company': company
  };
 alert ("patata");

 jQuery.ajax({
    url: '../../personal-php/ddbb-insert.php',
    type: "POST",
    data: { Param: JSON.stringify(datos) },
    dataType: 'json',

    success: function (response) { // response contiene la respuesta del server
      //alert (response.status); 
      alert("actualizacion correcta");
    },
    error: function (xhr) {
      alert("el dato ya existe");
    }
  });
}