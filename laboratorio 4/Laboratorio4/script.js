var modal = document.getElementById("myModal");
var openModalBtn = document.getElementById("openModalBtn");
var closeBtn = document.getElementsByClassName("close")[0];

function cargarContenido(abrir) {
  var contenedor;
  contenedor = document.getElementById("contenido");
  fetch(abrir)
    .then((response) => response.text())
    .then((data) => { console.log(data); });
}
function autenticar() {
  var datos = new FormData(document.querySelector("#form"));
  fetch("autenticar.php", { method: "POST", body: datos })
    .then((response) => response.json())
    .then((data) => {
      if (data.length === 0) {
        document.querySelector("#titulo-modal").innerHTML = "Error";
        document.querySelector("#contenido-modal").innerHTML = "Usuario o contraseña incorrectos";
        document.getElementById("myModal").style.display = "block";
        document.querySelector("#form").reset();
      }
      else {
        let rol = data[0].rol;
        if (rol == 1) {
          window.location.href = "administrador.php";
        }
        else {
          window.location.href = "usuario.php";
        }
      }
    });
}
mostrar = function () {
  modal.style.display = "block";
};

closeBtn.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
function cargarCorreo() {
  fetch("correos.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado").innerHTML = data));

}
function verCorr(id) {
  fetch(`verCorreo.php?id=${id}`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Ver Correo";
      document.querySelector("#contenido-modal").innerHTML = data;
      document.getElementById("myModal").style.display = "block";
    });
}
function eliminar(id) {
  var url = `eliminarcorreo.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Mensaje"
      document.querySelector("#contenido-modal").innerHTML = data
      document.getElementById("myModal").style.display = "block";
      cargarCorreo();
    });
}
function eliminarUsuario(id) {
  var url = `deleteUsuario.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Mensaje"
      document.querySelector("#contenido-modal").innerHTML = data
      document.getElementById("myModal").style.display = "block";
      ver();
    });
}


function insertar() {
  fetch("forminsertar.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado2").innerHTML = data));
}
function crear() {
  var datos = new FormData(document.querySelector("#form-crear"));

  fetch("create.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado2").innerHTML = data));
}
function ver() {
  fetch("verusuarios.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado2").innerHTML = data));
}
//vanessa
function cargarSalida() {
  fetch("salida.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado").innerHTML = data));
}
function ediUsuario(id) {
  var url = `formeditar.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Editar"
      document.querySelector("#contenido-modal").innerHTML = data
      document.getElementById("myModal").style.display = "block";
    });
}

function crearUsuario() {
  var datos = new FormData(document.querySelector("#form-edit"));
  fetch("editarUsuario.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Mensaje"
      document.querySelector("#contenido-modal").innerHTML = data
      ver();
    }
    );
}
function cargarRevisarCuentas() {
  fetch('revisarcuenta.php')
    .then(response => response.text())
    .then(data => {
      document.getElementById('resultado2').innerHTML = data;
    });
}
function suspenderCuenta(id) {
  if (confirm('¿Estás seguro de suspender esta cuenta?')) {
    fetch(`suspendercuenta.php?id=${id}`)
      .then(response => response.text())
      .then(data => {
        alert(data);
        cargarRevisarCuentas();
      });
  }
}

function habilitarCuenta(id) {
  if (confirm('¿Estás seguro de habilitar esta cuenta?')) {
    fetch(`habilitarcuenta.php?id=${id}`)
      .then(response => response.text())
      .then(data => {
        alert(data);
        cargarRevisarCuentas();
      });
  }
}


function enviarAviso() {
  fetch("formaviso.php")
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado2").innerHTML = data));
}
function enviar() {
  var datos = new FormData(document.querySelector("#form-aviso"));

  fetch("enviaraviso.php", { method: "POST", body: datos })
    .then((response) => response.text())
    .then((data) => (document.querySelector("#resultado2").innerHTML = data));
}

function mostrarModalRedactar() {
  const modal = document.getElementById("modalRedactar");
  modal.style.display = "flex";
  modal.classList.add("show");
}

function cerrarModalRedactar() {
  const modal = document.getElementById("modalRedactar");
  modal.style.display = "none";
  modal.classList.remove("show");
}

function guardarBorrador() {
    const correo = document.getElementById("correo").value;
    const asunto = document.getElementById("asunto").value;
    const mensaje = document.getElementById("mensaje").value;

    alert("Borrador guardado");
    cerrarModalRedactar();
}
