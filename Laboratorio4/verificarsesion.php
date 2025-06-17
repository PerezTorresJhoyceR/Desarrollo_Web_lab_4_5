<?php
if (!isset($_SESSION["correo"]))
{
    header("Location: formlogin.html");
    die();
}
?>