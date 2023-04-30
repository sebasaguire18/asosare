<?php


//-----------ENVIAR FORMULARIO DE CONTACTO-----------//

if (isset($_POST['btn_contacto'])) {

    $emailContacto = $_POST['emailContacto'];
    $asuntoContacto = "Mensaje enviado de la página web";
    $mensajeContacto = $_POST['mensajeContacto'];
    
    if ($emailContacto == "" || $asuntoContacto == "" || $mensajeContacto == "") {
        header("location:../shared/alerts/errorEmpty.php");
    }else {
        $para      = 'asosare@gmail.com';
        $asunto    = $asuntoContacto;
        $mensaje   = $mensajeContacto;
        $de =   'From: '. $emailContacto . "\r\n" .
                'Reply-To: '. $emailContacto . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        if (mail($para, $asunto, $mensaje, $de)){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}

//-----------FIN ENVIAR FORMULARIO DE CONTACTO-----------//