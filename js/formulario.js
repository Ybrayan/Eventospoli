
// Validacion de campos
(function () {
  "use strict";
  document.addEventListener("DOMContentLoaded", function () {
    var usuario = document.getElementById("usuario");
    var password = document.getElementById("password");

    // Validacion de capacidad de campos
    usuario.addEventListener("input", function () {
      if (this.value.length > 20) this.value = this.value.slice(0, 15);
    });
    password.addEventListener("input", function () {
      if (this.value.length > 20) this.value = this.value.slice(0, 15);
    });
  }); //DOMContentLoaded
})();









eventListeners();

function eventListeners() {
  document
    .querySelector("#formulario")
    .addEventListener("submit", validarRegistro);
}

function validarRegistro(e) {
  e.preventDefault();

  var usuario = document.querySelector("#usuario").value,
    password = document.querySelector("#password").value,
    tipo = document.querySelector("#tipo").value;

  if (usuario === "" || password === "") {
    // la validación falló
    swal({
      type: "error",
      title: "Error!",
      text: "Ambos campos son obligatorios!",
    });
  } else {
    // Ambos campos son correctos, mandar ejecutar Ajax

    // datos que se envian al servidor
    var datos = new FormData();
    datos.append("usuario", usuario);
    datos.append("password", password);
    datos.append("accion", tipo);

    // crear el llamado a ajax
    var xhr = new XMLHttpRequest();

    // abrir la conexión.
    xhr.open("POST", "includes/modelos/modelo-admin.php", true);

    // retorno de datos
    xhr.onload = function () {
      if (this.status === 200) {
        var respuesta = JSON.parse(xhr.responseText);

        console.log(respuesta);
        // Si la respuesta es correcta
        if (respuesta.respuesta === "correcto") {
          // si es un nuevo usuario
          if (respuesta.tipo === "crear") {
            swal({
              title: "Usuario Creado",
              text: "El usuario se creó correctamente",
              type: "success",
            });
          } else if (respuesta.tipo === "login") {
            console.log("SSS");

            swal({
              title: "Login Correcto",
              text: "Presiona OK para abrir el dashboard",
              type: "success",
            }).then((resultado) => {
              if (resultado.value) {
                window.location.href = "Admin.php";
              }
            });
          }
        } else {
          // Hubo un error
          swal({
            title: "Error",
            text: "Hubo un error",
            type: "error",
          });
        }
      }
    };

    // Enviar la petición
    xhr.send(datos);
  }
}
