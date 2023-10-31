<?php
$de = $_POST["de_txt"];
$para = $_POST["para_txt"];
$asunto = $_POST["asunto_txt"];
$mensaje = $_POST["mensaje_txa"];
$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabeceras .= "From: $de \r\n";

$archivo = $_FILES["archivo_fls"]["tmp_name"];
$destino = $_FILES["archivo_fls"]["name"];

if(move_uploaded_file($archivo, $destino)){
    include_once("class.phpmailer.php");
    include_once("class.smtp.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->From = $de;
    $mail->AddAddress($para);
    $mail->Username = "crizorrturk@gmail.com";
    $mail->Password = "KiraElGatoFeliz25!";
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;
    $mail->WordWrap = 50;
    $mail->MsgHTML($mensaje);
    $mail->AddAttachment($destino);

    if ($mail->Send()) {
        $respuesta = "El mensaje ha sido enviado con PHPMailer ✅";
    } else{
        $respuesta = "El mensaje no se ha enviado con PHPMailer ❎";
        $respuesta .= " Error: ".$mail->ErrorInfo;
    }
    
}else{
    $respuesta = "Ocurrio un error al subir el archivo djunto ❎";
}

unlink($destino);

header("Location: formulario-phpmailer.php?respuesta=$respuesta")
?>