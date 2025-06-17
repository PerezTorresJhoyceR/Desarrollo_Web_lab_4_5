<?php
if ($_SESSION["rol"]==2)
{
    echo "usted no esta autorizado a realizar esta operación";

    die();
}
?>