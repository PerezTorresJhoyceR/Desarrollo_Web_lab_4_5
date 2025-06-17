

//funciones de habitacion

function guardarHabitacion() {
  var form = document.querySelector("#form-habitacion");
  var formData = new FormData(form);
  
  var id = formData.get('id');
  var url = id > 0 ? "editHabitacion.php" : "createHabitacion.php";
  
  fetch(url, {
      method: "POST",
      body: formData
  })
  .then((response) => response.text())
  .then((data) => {
      Modal("Mensaje", data);
      if(id > 0) {
          cargarContenido('habitacion.php');
      } else {
          // Recargar para ver la nueva habitación
          location.reload();
      }
      document.getElementById("myModal").style.display = "none";
  })
  .catch((error) => {
      Modal("Error", "Ocurrió un error al procesar la solicitud");
  });
}

function insertarHabitacion() {
  fetch("formHabitacion.php")
      .then((response) => response.text())
      .then((data) => {
          document.querySelector("#titulo-modal").innerHTML = "Agregar Habitación";
          document.querySelector("#contenido-modal").innerHTML = data;
          document.getElementById("myModal").style.display = "block";
      });
}

function editarHabitacion(id) {
  fetch(`formHabitacion.php?id=${id}`)
      .then((response) => response.text())
      .then((data) => {
          document.querySelector("#titulo-modal").innerHTML = "Editar Habitación";
          document.querySelector("#contenido-modal").innerHTML = data;
          document.getElementById("myModal").style.display = "block";
      });
}

function eliminarHabitacion(id) {
  if(confirm("¿Está seguro de eliminar esta habitación?")) {
      fetch(`deletHabitacion.php?id=${id}`)
          .then((response) => response.text())
          .then((data) => {
              Modal("Mensaje", data);
              cargarContenido('habitacion.php');
          });
  }
}