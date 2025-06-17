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

            <button id="entrada"><a href="javascript:cargarCorreo()">Bandeja de Entrada</a></button>
            <button id="salida"><a href="javascript:cargarSalida()">Bandeja de Salida</a></button>
            <button id="borradores" ><a href="javascript:cargarBorradores()">Bandeja de Borradores</a></button>
            <div class="redactar">
                <button id="redacta"><a href="javascript:mostrarModalRedactar()">Redactar</a></button>
            </div>
        </div>
        <div class="conte">
            <h2>Panel de usuarios</h2>  
            
            <div id="resultado">
            </div>
        </div>
    </div>
    <div id="modalRedactar" class="modal" >
        <div class="modal-content">
            <span class="close" >&times;</span>
            <h2>Redactar Correo</h2>
            <form id="formularioRedactar">
                <div class="form-group">
                    <label for="correo">Destinatario:</label>
                    <input type="email" name="correo" id="correo" required />
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto:</label>
                    <input type="text" name="asunto" id="asunto" required />
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea name="mensaje" id="mensaje" rows="10" required></textarea>
                </div>
                <div class="botones-form">
                    <button type="button" onclick="guardarBorrador()">Guardar</button>
                    <button type="button" onclick="enviarCorreo()">Enviar</button>
                </div>
            </form>
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