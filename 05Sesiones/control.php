<?php
    if ($_POST["usuario_txt"]=="crizorr" && $_POST["password_txt"]=="kira") {
        //Inicio la sesión
        session_start();
        
        //Declaro variables de sesión
        $_SESSION["autentificado"] = true;
        $_SESSION["usuario"] = $_POST["usuario_txt"];

        header("Location: archivo-protegido.php");
    }else{
        header("Location: index.php?error=si");
    }
?>
