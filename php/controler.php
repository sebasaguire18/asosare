<!doctype html>
<html lang="es">
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>

<body>
<?php

//-----------ENVIAR FORMULARIO DE CONTACTO-----------//

if (isset($_POST['btn_contacto'])) {

    $emailContacto = $_POST['emailContacto'];
    $asuntoContacto = "Mensaje enviado de la página web";
    $mensajeContacto = $_POST['mensajeContacto'];
    
    if ($emailContacto == "" || $asuntoContacto == "" || $mensajeContacto == "") {
        $alerta = ' <div class="alert alert-danger mt-3" role="alert">
                            Error... Faltan campos por llenar.
                        </div>';
        header("Location: ../index.html", true, 303);
    }else {
        $para      = 'asosare@gmail.com';
        $asunto    = $asuntoContacto;
        $mensaje   = $mensajeContacto;
        $de =   'From: '. $emailContacto . "\r\n" .
                'Reply-To: '. $emailContacto . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        if (mail($para, $asunto, $mensaje, $de)){
            
            $alerta = ' <div class="alert alert-success mt-3" role="alert">
                            Mensaje Enviado.
                        </div>';
        }else{
            
            $alerta = ' <div class="alert alert-danger mt-3" role="alert">
                            Error... Mensaje No Enviado.
                        </div>';
        }
    }

    ?>
        <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Alerta</h1>
                    </div>
                    <div class="modal-body py-5 my-5" >
                        <?php echo $alerta; ?>
                    </div>                   
                    <div class="modal-footer">
                        <a href="../index.html" class="btn btn-primary">Volver al Inicio</a>
                    </div> 
                </div>
            </div>
        </div>

    <?php
}else {
    header("location:javascript:history.go(-1)");
}

//-----------FIN ENVIAR FORMULARIO DE CONTACTO-----------//
?>
</body>
</html>