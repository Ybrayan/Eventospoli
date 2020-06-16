eventListeners();
// lista de proyectos
var listaProyectos = document.querySelector("ul#proyectos");

function eventListeners() {
  // Validacion de campos
  var nombre = document.getElementById("nombre-evento");

  // Validacion de capacidad de campos
  /*nombre.addEventListener("input", function () {
    if (this.value.length > 30) this.value = this.value.slice(0, 30);
  });*/

  if (document.querySelector(".nuevo-evento") !== null) {
    document
      .querySelector(".nuevo-evento")
      .addEventListener("click", agregarEvento);
  }

  if (document.querySelector(".nuevo-invitado") !== null) {
    document
      .querySelector(".nuevo-invitado")
      .addEventListener("click", agregarInvitado);
  }


  // Botones para las acciones de las tareas
  document
    .querySelector(".listado-pendientes")
    .addEventListener("click", accionesTareas);

  document
    .querySelector(".listado-invitados")
    .addEventListener("click", accionesInvitados);
}


// Expresiones Regulares
function solo_texto(inputtxt) {
  var patt = new RegExp(/^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/);
  var res = patt.test(inputtxt);
  if (res) {
    console.log("Cumple Regex");
    return true;
  } else {
    console.log("Fallo Regex");
    alert("message");
    return false;
  }
}

// Agregar invitado
function agregarInvitado(e) {
  e.preventDefault();

  var nombre = document.querySelector(".nombre-invitado").value;
  var apellido = document.querySelector(".apellido-invitado").value;
  var descripcion =
    "Praesent massa ipsum, porta ut aliquam ac, pretium eget felis. Praesent eleifend dolor eget sollicitudin pellentesque. Fusce arcu enim, molestie id accumsan a, fringilla a magna. Nullam consequat congue felis, nec convallis dui congue et. Nulla efficitur bibendum metus a fermentum. Sed id bibendum massa. Quisque purus magna, mattis a hendrerit a, pretium et ex. Mauris quis ex at arcu dictum fringilla at nec purus. Nam non facilisis risus, eu luctus neque. Vivamus id placerat nibh, vitae pellentesque ante. Vestibulum malesuada nisl consequat, gravida nisl ut, iaculis ipsum. Vestibulum suscipit, dui in aliquet tempus, felis risus sagittis ex, vitae porta arcu purus eu neque. Cras posuere augue neque, quis laoreet leo vulputate a. Pellentesque aliquam ex vitae augue laoreet viverra. Nullam volutpat elit non diam gravida vulputate. Mauris ornare feugiat leo eget tristique.";
  var url_imagen = "invitado.jpg";
  

  // Validar que el campo tenga algo escrito

  if (nombre === "" || apellido === "") {
    swal({
      title: "Error",
      text: "Todos los campos son OBLIGATORIOS",
      type: "error",
    });
  } else {
    if (solo_texto(nombre) && solo_texto(apellido)) {
      console.log("paso");

      // crear formdata
      var datos = new FormData();
      datos.append("nombre_invitado", nombre);
      datos.append("apellido_invitado", apellido);
      datos.append("descripcion", descripcion);
      datos.append("url_imagen", url_imagen);
      datos.append("accion", "crear");

      // crear llamado a ajax
      var xhr = new XMLHttpRequest();

      // Abrir la conexion
      xhr.open("POST", "includes/modelos/modelo-invitado.php", true);

      // ejecutarlo y respuesta
      xhr.onload = function () {
        if (this.status === 200) {
          // todo correcto
          var respuesta = JSON.parse(xhr.responseText);
          // asignar valores

          var resultado = respuesta.respuesta,
            tipo = respuesta.tipo;

          if (resultado === "correcto") {
            // se agregó correctamente
            if (tipo === "crear") {
              // lanzar la alerta
              swal({
                type: "success",
                title: "Invitado Agregado",
                text: "El Invitado: " + nombre + " se registro correctamente",
              });
            }
          } else {
            // hubo un error
            swal({
              type: "error",
              title: "Error!",
              text: "Hubo un error",
            });
          }
        }
      };
      // Enviar la consulta
      xhr.send(datos);
    } else {
      swal({
        title: "Error",
        text: "Los Nombres y/o Apellidos estan mal",
        type: "error",
      });
      console.log("no paso");
    }
  }
}

// Agregar evento

function agregarEvento(e) {
  e.preventDefault();

  var nombre = document.querySelector(".nombre-evento").value;
  var fecha = document.querySelector(".fecha-evento").value;
  var hora = document.querySelector(".hora-evento").value;
  var categoria = document.querySelector(".cat").value;

  // Validar que el campo tenga algo escrito

  if (nombre === "" || fecha === "" || hora === "") {
    swal({
      title: "Error",
      text: "Todos los campos son OBLIGATORIOS",
      type: "error",
    });
  } else {
    if (solo_texto(nombre)) {
      // crear formdata
      var datos = new FormData();
      datos.append("nombre_evento", nombre);
      datos.append("fecha_evento", fecha);
      datos.append("hora_evento", hora);
      datos.append("id_cat_evento", categoria);
      datos.append("id_inv", document.querySelector("#invitado_id").value);
      datos.append("accion", "crear");

      // crear llamado a ajax
      var xhr = new XMLHttpRequest();

      // Abrir la conexion
      xhr.open("POST", "includes/modelos/modelo-tareas.php", true);

      // ejecutarlo y respuesta
      xhr.onload = function () {
        if (this.status === 200) {
          // todo correcto
          var respuesta = JSON.parse(xhr.responseText);
          // asignar valores

          var resultado = respuesta.respuesta,
            tipo = respuesta.tipo;

          if (resultado === "correcto") {
            // se agregó correctamente
            if (tipo === "crear") {
              // lanzar la alerta
              swal({
                type: "success",
                title: "Evento Creado",
                text: "El Evento: " + nombre + " se creó correctamente",
              });
            }
          } else {
            // hubo un error
            swal({
              type: "error",
              title: "Error!",
              text: "Hubo un error",
            });
          }
        }
      };
      // Enviar la consulta
      xhr.send(datos);

    } else {
      swal({
        title: "Error",
        text: "El Nombre del Evento esta raro",
        type: "error",
      });
    }
  }
}

// las elimina

function accionesTareas(e) {
  console.log("elimina");

  e.preventDefault();

  if (e.target.classList.contains("fa-trash")) {
    swal({
      title: "Seguro(a)?",
      text: "Esta acción no se puede deshacer",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, borrar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) {
        var eventoEliminar = e.target.parentElement.parentElement;
        // Borrar de la BD
        eliminarEventoBD(eventoEliminar);

        // Borrar del HTML
        eventoEliminar.remove();

        swal("Eliminado!", "La tarea fue eliminada!.", "success");
      }
    });
  }
}

// Elimina las tareas de la base de datos
function eliminarEventoBD(evento) {
  var idEvento = evento.id.split(":");

  // crear llamado ajax
  var xhr = new XMLHttpRequest();
  console.log(idEvento);

  // informacion
  var datos = new FormData();
  datos.append("id", idEvento[1]);
  datos.append("accion", "eliminar");

  // abrir la conexion
  xhr.open("POST", "includes/modelos/modelo-tareas.php", true);

  // on load
  xhr.onload = function () {
    if (this.status === 200) {
      //console.log(JSON.parse(xhr.responseText));

      // Comprobar que haya Eventos restantes
      var listaEventosRestantes = document.querySelectorAll("li.evento");
      if (listaEventosRestantes.length === 0) {
        document.querySelector(".listado-pendientes ul").innerHTML =
          "<p class='lista-vacia'>No hay Eventos en este proyecto</p>";
      }
    }
  };
  // enviar la petición
  xhr.send(datos);
}
