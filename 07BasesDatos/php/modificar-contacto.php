<?php
$email = $_POST["email_hdn"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

include("conexion.php");

$consulta = "SELECT * FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if ($num_regs == 1) {
    if (empty($_FILES["foto_fls"]["tmp_name"])) {
        $imagen = $_POST["foto_hdn"];
    } else {
        include("funciones.php");
        $tipo = $_FILES["foto_fls"]["type"];
        $archivo = $_FILES["foto_fls"]["tmp_name"];
        $imagen = subir_imagen($tipo, $archivo, $email);
    }

    $consulta = "UPDATE contactos SET nombre='$nombre', sexo='$sexo', nacimiento='$nacimiento', telefono='$telefono', pais='$pais', imagen='$imagen' WHERE email='$email'";
    $ejecutar_consulta = $conexion->query($consulta);

    if ($ejecutar_consulta) {
        $mensaje = "Se realizaron los cambios en el contacto con email <b>$email</b> 👍";
    } else {
        $mensaje = "No se realizaron los cambios en el contacto con email <b>$email</b> 👎";
    }
} else {
    $mensaje = "No se realizaron los cambios en el contacto con email <b>$email</b> porque no existe o está duplicado 🤨";
}

$conexion->close();
header("Location: ../index.php?op=cambios&mensaje=$mensaje");
?>