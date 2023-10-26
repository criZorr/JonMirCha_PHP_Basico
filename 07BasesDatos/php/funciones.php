<?php
//Función para borrar la imágen repetida
function borrar_imagenes($ruta, $extension)
{
    switch ($extension) {
        case ".jpg":
            if (file_exists($ruta . ".png"))
                unlink($ruta . ".png");
            if (file_exists($ruta . ".gif"))
                unlink($ruta . ".gif");
            break;
        case ".png":
            if (file_exists($ruta . ".jpg"))
                unlink($ruta . ".jpg");
            if (file_exists($ruta . ".gif"))
                unlink($ruta . ".gif");
            break;
        case ".gif":
            if (file_exists($ruta . ".png"))
                unlink($ruta . ".png");
            if (file_exists($ruta . ".jpg"))
                unlink($ruta . ".jpg");
            break;
    }
}

//Función para subir la imagen del perfil del usuario
function subir_imagen($tipo, $imagen, $email)
{
    //strstr($1, $2) evalua si 2 existe en 1
    //Evalua que el archivo es una imagen
    if (strstr($tipo, "image")) {
        if (strstr($tipo, "jpeg"))
            $extension = ".jpg";
        elseif (strstr($tipo, "gif"))
            $extension = ".gif";
        elseif (strstr($tipo, "png"))
            $extension = ".png";

        // Si la imagen es de 500px
        $tam_img = getimagesize($imagen);
        $ancho_img = $tam_img[0];
        $alto_img = $tam_img[1];

        $ancho_img_deseado = 500;

        //si es mayor a 500px reajusto el tamaño
        if ($ancho_img > $ancho_img_deseado) {
            //reajustar
            $nuevo_ancho_img = $ancho_img_deseado;
            $nuevo_alto_img = ($nuevo_ancho_img * $alto_img) / $ancho_img;

            $img_reajustada = imagecreatetruecolor($nuevo_ancho_img, $nuevo_alto_img);
            switch ($extension) {
                case '.jpg':
                    $img_original = imagecreatefromjpeg($imagen);
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //guardar la nueva imagen
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagejpeg($img_reajustada, $nombre_img_ext, 100);
                    borrar_imagenes($nombre_img, ".jpg");
                    break;
                case '.gif':
                    $img_original = imagecreatefromgif($imagen);
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //guardar la nueva imagen
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagegif($img_reajustada, $nombre_img_ext);
                    borrar_imagenes($nombre_img, ".gif");
                    break;
                case '.png':
                    $img_original = imagecreatefrompng($imagen);
                    imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
                    //guardar la nueva imagen
                    $nombre_img_ext = "../img/fotos/" . $email . $extension;
                    $nombre_img = "../img/fotos/" . $email;
                    imagepng($img_reajustada, $nombre_img_ext);
                    borrar_imagenes($nombre_img, ".png");
                    break;
            }
        } else {
            $destino = "../img/fotos/" . $email . $extension;
            move_uploaded_file($imagen, $destino) or die("No se pudo subir la imagen al servidor ❌");

            //borramos imagenes dobles (diferente extensión)
            $nombre_img = "../img/fotos/" . $email;
            borrar_imagenes($nombre_img, $extension);
        }

        //Asigno el nombre de la foto que se guardará en la BD
        $imagen = $email . $extension;
        return $imagen;
    } else {
        return false;
    }

}

?>