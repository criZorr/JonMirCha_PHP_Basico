<?php
//Asignación de valores del formulario a variables php
$email = $_POST["email_txt"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

$imagen_generica = ($sexo == "M") ? "amigo.png" : "amiga.png";

//Verificamos que no exista el email en la BD

include("conexion.php");
$consulta = "SELECT * FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if ($num_regs == 0) {
    //Se ejecuta la función para subir la imagen
    include("funciones.php");
    $tipo = $_FILES["foto_fls"]["type"];
    $archivo = $_FILES["foto_fls"]["tmp_name"];
    $se_subio_imagen = subir_imagen($tipo, $archivo, $email);

    //Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica
    $imagen = empty($archivo) ? $imagen_generica : $se_subio_imagen;

    //Subir datos
    $consulta = "INSERT INTO contactos(email, nombre, sexo, nacimiento, telefono, pais, imagen) VALUES ('$email', '$nombre', '$sexo', '$nacimiento', '$telefono', '$pais', '$imagen')";
    $ejecutar_consulta = $conexion->query($consulta);

    if ($ejecutar_consulta)
        $mensaje = "Se ha dado de alta al contacto con el email: <b>$email</b> ✅";
    else
        $mensaje = "No se pudo dar de alta al contacto con el email: <b>$email</b> ❎";
} else {
    $mensaje = "No se pudo dar de alta al contacto con el email: <b>$email</b>, ya existe 😒";
}
$conexion->close();
header("Location: ../index.php?op=alta&mensaje=$mensaje");

?>