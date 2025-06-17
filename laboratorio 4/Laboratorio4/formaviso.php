<?php
session_start();
include "conexion.php";
?>
<form id="form-aviso" method="post">
    <label for="asunto">Asunto</label>
    <input type="asunto" name="asunto" id="asunto"><br>
    <label for="mensaje">Mensaje</label>
    <input type="mensaje" name="mensaje" id="mensaje"><br>
    <input type="submit" value="Ingresar" class="boton" onclick="enviar()">
</form>