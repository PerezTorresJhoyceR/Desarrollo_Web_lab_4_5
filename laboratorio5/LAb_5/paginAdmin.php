<?php
session_start();
include("conexion.php");
require("verificarsesion.php");
require("verificarnivel.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>





    <div class="contenedor-admin">

        <div class="menu-admin" id="menu">

            <div class="superior-menu">
                <button class="menu-palanca" onclick="palancaMenu()"><span class="icono">☰</span> <span class="texto">Menú</span></button>
                <button onclick="cargarUsuarios()" class="boton-menu" data-titulo="Usuarios">
                    <span class="icono"><img src="images/usuarios.png" alt="salida" width="25px" height="22px"></span>
                    <span class="texto">Usuarios</span>
                </button>

                <button onclick="cargarTipohabitacion()" class="boton-menu" data-titulo="Tipos de habitaciones">
                    <span class="icono"><img src="images/habitaciones.png" alt="salida" width="25px" height="25px"></span>
                    <span class="texto">Tipos de habitaciones</span>
                </button>
                <button onclick="cargarContenido('habitacion.php')" class="boton-menu" data-titulo="Habitaciones">
                    <span class="icono"><img src="images/servicio-de-habitaciones.png" alt="salida" width="25px" height="25px"></span>
                    <span class="texto">Habitaciones</span>
                </button>
                <button onclick="cargarContenido('reserva.php')" class="boton-menu" data-titulo="Reservas">
                <span class="icono"><img src="images/hotel-bell.png" alt="salida" width="25px" height="25px"></span>
                <span class="texto">Reservas</span>
            </button>
            </div>
            <div class="inferior-menu">
                <button onclick="cerrarSesion()" class="boton-menu">
                    <span class="icono"><img src="images/salida.png" alt="salida" width="25px" height="25px"></span>
                    <span class="texto">Cerrar Sesion</span>
                </button>
            </div>
        </div>


        <div class="contenido-admin">
            <div class="cabecera-admin">
                <h1 id="tituloDinamico">Bienvenido Administrador: <?php echo $_SESSION['nombre']; ?></h1>
            </div>
            <div class="cuerpo-admin">
                <div id="resultado">

                </div>
            </div>
            <div id="myModal" class="mi-modal">
                <div class="modal-content-admin">
                    <span class="close">&times;</span>
                    <h2 id="titulo-modal">Título del Modal</h2>
                    <div id="contenido-modal">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>