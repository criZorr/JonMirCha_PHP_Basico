<?php
session_start();
//Evaluo que la sesión continue verificando una variable creada en control.php
if (!$_SESSION["autentificado"]) {
    header("Location: salir.php");
}
?>