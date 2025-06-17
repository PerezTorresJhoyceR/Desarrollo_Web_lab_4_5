<?php
session_start();
require("verificarsesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
    <div class="contenedor">
        <div class="bandejas">
            <button id="insertar"><a href="javascript:insertar()">Agregar</a></button>
        <button id="verf"><a href="javascript:ver()">ver</a></button>
        <button id="revisar" onclick="cargarRevisarCuentas()">Revisar Cuentas</button>
        <button id="enviar" onclick="enviarAviso()">Enviar Avisos</button>
        </div>
    <div class="conte2">
        <h2>Panel de Administrador</h2>
        <div id="resultado2"></div>
    </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="titulo-modal">Título del Modal</h2>
            <div id="contenido-modal">
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>