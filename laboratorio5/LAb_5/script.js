var modal = document.getElementById("myModal");
var closeBtn = document.getElementsByClassName("close")[0];
function cargarContenido(abrir) {
  var contenedor;
  contenedor = document.getElementById("resultado");
  fetch(abrir)
    .then((response) => response.text())
    .then((data) => (contenedor.innerHTML = data));
}
function Modal(titulo, contenidoHTML) {
  document.querySelector("#titulo-modal").innerHTML = titulo;
  document.querySelector("#contenido-modal").innerHTML = contenidoHTML;
  modal.style.display = "block";
}
closeBtn.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
function registrarse() {
  var url = `registrar.html`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      Modal("Crear Cuenta", data);
    });
}
function crearRegistro() {
  var datos = new FormData(document.querySelector("#form-crearRegistro"));
  fetch("crearRegistro.php", { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      Modal("Mensaje", data);
    });
}
function autenticar() {
  var datos = new FormData(document.querySelector("#form-login"));
  fetch("autenticar.php", { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      const partes = data.split("|");
      if (partes[0] === "ok") {

        const rol = partes[1];

        setTimeout(() => {
          if (rol == 1) {
            window.location.href = "paginAdmin.php";
          } else {
            window.location.href = "paginausuario.php";
          }
        }, 1000);
      } else {
        Modal("Error", "Usario o contraseña incorrecta.");
      }
    });
}

//-----TODAS LA FUNCIONES DEL ADMIN----------------------------------

//---parte de encabezado cambio dinamico-------
document.querySelectorAll('.boton-menu').forEach(opcion => {
  opcion.addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('tituloDinamico').textContent =
      `Gestión de ${this.getAttribute('data-titulo')}`;
  });
});

//--------------------

function palancaMenu() {
  document.getElementById("menu").classList.toggle("collapsed");
}

function crearUsuario() {
  var url = `forminserUsuario.php`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      Modal("Crear Usuario", data);
    });
}
function usuarioCreado() {
  var datos = new FormData(document.querySelector("#form-crearUsuario"));
  fetch("crearUsuario.php", { method: "POST", body: datos })
    .then(response => response.text())
    .then(data => {
      Modal("Mensaje", data);
      cargarUsuarios();
    });
}

function ediUsuario(id) {
  var url = `formeditarUsuario.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      Modal("Editar", data);
    });
}

function guareditUsuario() {
  var datos = new FormData(document.querySelector("#form-editUsuario"));
  fetch("guareditUsuario.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => {
      Modal("Mensaje", data);
      cargarUsuarios();
    }
    );
}
function eliminarUsuario(id) {
  var url = `eliminarUsuario.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      Modal("Mensaje", data);
      cargarUsuarios();
    });
}

function cerrarSesion() {
  fetch("cerrarSesion.php")
    .then((response) => response.text())
    .then((data) => {
      data = window.location.href = "Login.html";
    });
}


function mostrarHabitaciones() {
  var tipo = document.getElementById('habitacion').value;
  document.getElementById('simples').style.display = 'none';
  document.getElementById('dobles').style.display = 'none';
  document.getElementById('suites').style.display = 'none';
  if (tipo === 'simple') {
    document.getElementById('simples').style.display = 'block';
  } else if (tipo === 'doble') {
    document.getElementById('dobles').style.display = 'block';
  } else if (tipo === 'suite') {
    document.getElementById('suites').style.display = 'block';
  }
}
function cargarTipohabitacion() {
  fetch("tipo_habitacion.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado").innerHTML = data));
}
function insertar() {
  fetch("forminsertar.php")
    .then((response) => response.text())
    .then((data) => {
      Modal("", data);
    });
}
function crear() {
  var datos = new FormData(document.querySelector("#form-crear"));

  fetch("create.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#resultado").innerHTML = data;
      cargarTipohabitacion();
    });
}
function edit(id) {
  fetch(`formeditar.php?id=${id}`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "";
      document.querySelector("#contenido-modal").innerHTML = data;
      document.getElementById("myModal").style.display = "block";
    });
}
function editar() {
  var datos = new FormData(document.querySelector("#form-editar"));

  fetch("edit.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#resultado").innerHTML = data;
      cargarTipohabitacion();
    });
}
function eliminar(id) {
  fetch(`delete.php?id=${id}`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#resultado").innerHTML = data;
      cargarTipohabitacion();
    });
}





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
                        cargarContenido('habitacion.php');

      });
}

function editarHabitacion(id) {
  fetch(`formHabitacion.php?id=${id}`)
      .then((response) => response.text())
      .then((data) => {
          document.querySelector("#titulo-modal").innerHTML = "Editar Habitación";
          document.querySelector("#contenido-modal").innerHTML = data;
          document.getElementById("myModal").style.display = "block";
                        cargarContenido('habitacion.php');

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
function cargarUsuarios(pagina = 1, buscar = '') {
  fetch(`verUsuario.php?pagina=${pagina}`)
    .then(res => res.json())
    .then(data => {
      const html = renderizarTablaUsuarios(data);
      document.querySelector('#resultado').innerHTML = html;
    })
    .catch(error => console.error('Error al cargar usuarios:', error));
}

function renderizarTablaUsuarios(objeto) {
  const lista = objeto.datos;
  const pagina = objeto.pagina;
  const nropaginas = objeto.nropaginas;

  let html = `<div class="espacio-usuario">
    <div class="contenido-usuario">
        <div class="cabecera-usuario">
            <button class="btn-crear" onclick="crearUsuario()">
                <img src="images/mas2.jpg" alt="mas" width="10px" height="10px"> Crear Usuario
            </button>
        </div>
  
  <table class="table justify-content-center">
    <thead>
      <tr>
        <th width="200px">Nombre</th>
        <th width="100px">Correo</th>
        <th width="40px">Contraseña</th>
        <th width="60px">Rol</th>
        <th width="200px">Operación</th>
      </tr>
    </thead>
    <tbody>`;

  for (let i = 0; i < lista.length; i++) {
    html += `<tr>
      <td>${lista[i].nombre}</td>
      <td>${lista[i].correo}</td>
      <td>${lista[i].password}</td>
      <td>${lista[i].rol}</td>
      <td>
        <button class="btn btn-outline-warning" onclick="ediUsuario('${lista[i].id}')">Editar</button>
        <button class="btn btn-outline-danger" onclick="eliminarUsuario('${lista[i].id}')">Eliminar</button>
      </td>
    </tr>`;
  }

  html += `</tbody></table>`;

  // Navegación
  html += `<ul class="pagination justify-content-center">`;

  if (pagina > 1) {
    html += `
      <li class="page-item"><a class="page-link" href="javascript:cargarUsuarios(1)">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="javascript:cargarUsuarios(${pagina - 1} ">&lsaquo;</a></li>`;
  }

 for (let i = 1; i <= nropaginas; i++) {
  html += `<li class="page-item ${i === pagina ? 'active' : ''}">
    <a class="page-link" href="javascript:cargarUsuarios(${i})">${i}</a>
  </li>`;
}


  if (pagina < nropaginas) {
    html += `
      <li class="page-item"><a class="page-link" href="javascript:cargarUsuarios(${pagina + 1})">&rsaquo;</a></li>
      <li class="page-item"><a class="page-link" href="javascript:cargarUsuarios(${nropaginas})">&raquo;</a></li>`;
  }

  html += `</ul>
  </div>
  </div>`;
 
  return html;
}

function edit_reserva(id) {
  fetch(`formeditarReserva.php?id=${id}`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "";
      document.querySelector("#contenido-modal").innerHTML = data;
      document.getElementById("myModal").style.display = "block";
    });
}
function editar_reserva() {
  var datos = new FormData(document.querySelector("#form-editReserva"));

  fetch("editReserva.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => {document.querySelector("#resultado").innerHTML = data;
  cargarContenido("reserva.php");
    });
}
function eliminar_reserva(id) {
  fetch(`deletereservas.php?id=${id}`)
    .then((response) => response.text())
    .then((data) => {document.querySelector("#resultado").innerHTML = data;
      cargarContenido("reserva.php");
    });
}


//---parte de cliente-----
function mostrarMas(clase, event) {
    document.querySelectorAll("." + clase).forEach(el => el.style.display = "block");
    if (event) {
        event.target.parentElement.style.display = "none";
    }
}

    // Mostrar las habitaciones según el tipo seleccionado
        function mostrarHabitaciones() {
            // Ocultar todos los contenedores primero
            document.getElementById('simples').style.display = 'none';
            document.getElementById('dobles').style.display = 'none';
            document.getElementById('suites').style.display = 'none';
            
            // Mostrar solo el contenedor seleccionado
            const tipo = document.getElementById('habitacion').value;
            if (tipo === 'simple') {
                document.getElementById('simples').style.display = 'grid';
            } else if (tipo === 'doble') {
                document.getElementById('dobles').style.display = 'grid';
            } else if (tipo === 'suite') {
                document.getElementById('suites').style.display = 'grid';
            }
        }
        
        // Seleccionar una habitación específica
        function seleccionarHabitacion(elemento, idHabitacion) {
            // Quitar la selección de todas las habitaciones
            const todasHabitaciones = document.querySelectorAll('.habitacion-btn');
            todasHabitaciones.forEach(hab => {
                hab.classList.remove('selected');
            });
            
            // Seleccionar la habitación clickeada
            elemento.classList.add('selected');
            
            // Actualizar el campo oculto con el ID de la habitación
            document.getElementById('habitacion_id').value = idHabitacion;
        }
        
        // Validar fechas al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const hoy = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_entrada').min = hoy;
            
            // Actualizar fecha mínima de salida cuando cambia la fecha de entrada
            document.getElementById('fecha_entrada').addEventListener('change', function() {
                const fechaEntrada = this.value;
                document.getElementById('fecha_salida').min = fechaEntrada;
            });
        });
//---parte de cliente-----
function mostrarMas(clase, event) {
    document.querySelectorAll("." + clase).forEach(el => el.style.display = "block");
    if (event) {
        event.target.parentElement.style.display = "none";
    }
}

    // Mostrar las habitaciones según el tipo seleccionado
        function mostrarHabitaciones() {
            // Ocultar todos los contenedores primero
            document.getElementById('simples').style.display = 'none';
            document.getElementById('dobles').style.display = 'none';
            document.getElementById('suites').style.display = 'none';
            
            // Mostrar solo el contenedor seleccionado
            const tipo = document.getElementById('habitacion').value;
            if (tipo === 'simple') {
                document.getElementById('simples').style.display = 'grid';
            } else if (tipo === 'doble') {
                document.getElementById('dobles').style.display = 'grid';
            } else if (tipo === 'suite') {
                document.getElementById('suites').style.display = 'grid';
            }
        }
        
        // Seleccionar una habitación específica
        function seleccionarHabitacion(elemento, idHabitacion) {
            // Quitar la selección de todas las habitaciones
            const todasHabitaciones = document.querySelectorAll('.habitacion-btn');
            todasHabitaciones.forEach(hab => {
                hab.classList.remove('selected');
            });
            
            // Seleccionar la habitación clickeada
            elemento.classList.add('selected');
            
            // Actualizar el campo oculto con el ID de la habitación
            document.getElementById('habitacion_id').value = idHabitacion;
        }
        
        // Validar fechas al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const hoy = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_entrada').min = hoy;
            
            // Actualizar fecha mínima de salida cuando cambia la fecha de entrada
            document.getElementById('fecha_entrada').addEventListener('change', function() {
                const fechaEntrada = this.value;
                document.getElementById('fecha_salida').min = fechaEntrada;
            });
        });