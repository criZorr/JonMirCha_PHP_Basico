<?php
function conectarse()
{
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "mis_contactos";

    try {
        $conectar = new mysqli($servidor, $usuario, $password, $bd);
        return $conectar;
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage() . "<br>No se pudo conectar al servidor de BD MySQL";
    }

}

$conexion = conectarse();

?>