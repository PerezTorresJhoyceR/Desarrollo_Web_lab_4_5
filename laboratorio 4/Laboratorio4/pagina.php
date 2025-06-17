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
            <br><br>
            <button id="salida"><a href="javascript:cargarSalida()">Bandeja de Salida</a></button>        </div>
        <div class="conte">
            <div class="redactar">
                <button id="redacta" onclick="mostrarModalRedactar()">Redactar</button>
            </div>
            <div id="resultado">
            </div>
        </div>
    </div>
    <div id="modalRedactar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
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
<script src="script.js"></script>
</body>

</html>