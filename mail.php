<?php
$destinatario = 'ignaciosoraka@gmail.com';

// Capturamos los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = $_POST['telefono'];
$marca = $_POST['marca'];
$mensaje = $_POST['mensaje'];

// Construimos el mensaje del correo
$mensajeCorreo = "Mensaje de contacto:\n\n";
$mensajeCorreo .= "Nombre: " . $nombre . "\n";
$mensajeCorreo .= "Correo Electrónico: " . $email . "\n";
$mensajeCorreo .= "Teléfono: " . $telefono . "\n";
$mensajeCorreo .= "Marca: " . $marca . "\n";
$mensajeCorreo .= "Mensaje: " . $mensaje . "\n";

// Asunto del correo
$asuntoCorreo = "Consulta de " . $nombre;

// Cabeceras del correo
$header = "From: TusAbogadosYAFamilia <" . $email . ">\r\n";
$header .= "Reply-To: " . $email . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviamos el correo y manejamos la respuesta
if(mail($destinatario, $asuntoCorreo, $mensajeCorreo, $header)){
    ?>
    <h3 class="success">Tu registro se ha completado</h3>
    <script>
        setTimeout(function(){
            window.location.href = 'pagina_de_inicio.php'; // Redirecciona después de 3 segundos
        }, 3000);
    </script>
    <?php
} else {
    ?>
    <h3 class="error">Ocurrió un error, vuelve a intentarlo</h3>
    <?php
}
?>
