document.addEventListener("DOMContentLoaded", function(event) {
/*Aqui creo las clases que voy a utilizar en el login para enviar los datos o verificar si el usuario esta creado para poder iniciar sesion*/
  document.getElementById("iniciar").addEventListener('click', iniciar)

  hola();

  document.getElementById("crear").addEventListener('click', crear)

})

function iniciar(){

 document.getElementById('correo-iniciar').value 
 document.getElementById('contraseña-iniciar').value 

  alert("iniciar sesion con el usuario")
}

function crear(){
  var nombre=document.getElementById('nombre-crear').value; 
  var apellido=document.getElementById('apellido-crear').value;
  var correo=document.getElementById('correo-crear').value;
  var contraseña=document.getElementById('contraseña-crear').value;
  var rol=document.getElementById('rolInput').value;
  var datos = {
    'nombre': nombre,
    'apellido': apellido,
    'correo': correo,
    'contraseña': contraseña, 
    'rol': rol,
  };
  alert("hola")
  $.ajax({
    url: './insert.php',
    type: "POST",
    data: { Param: JSON.stringify(datos) },
    dataType: 'json',

    success: function (response) { // response contiene la respuesta del server
      //alert (response.status); 
      alert("datos correctamente introducidos a la base de datos");
    },
    error: function (xhr) {
      alert("ha habido un fallo de comunicacion con la base de datos") + xhr;
    }
  });
}


  

function hola(){
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
  });
}

