<?php
$email = $_POST["email_slc"];
include("conexion.php");
$consulta = "DELETE FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query($consulta);

if ($ejecutar_consulta)
    $mensaje = "El contacto con el email <b>$email</b> ha sido eliminado ⭕";
else
    $mensaje = "El contacto con el email <b>$email</b> no ha sido eliminado ❌";

$conexion->close();
header("Location: ../index.php?op=baja&mensaje=$mensaje");
?>