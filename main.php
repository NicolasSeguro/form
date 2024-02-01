<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpieza y validación de los datos del formulario
    $nombre = limpiarDato($_POST['nombre']);
    $email = limpiarDato($_POST['email']);
    $mensaje = limpiarDato($_POST['mensaje']);

    // Validar que el email es válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de correo electrónico inválido";
        exit;
    }

    // Configurar el destinatario y el asunto del email
    $destinatario = "tuemail@ejemplo.com"; // Reemplazar con tu email
    $asunto = "Nuevo mensaje de contacto";

    // Crear el cuerpo del mensaje
    $contenido = "Nombre: " . $nombre . "\n";
    $contenido .= "Email: " . $email . "\n";
    $contenido .= "Mensaje: " . $mensaje;

    // Configurar los encabezados del email
    $encabezados = "From: " . $email;

    // Enviar el email
    if (mail($destinatario, $asunto, $contenido, $encabezados)) {
        echo "Mensaje enviado. Gracias por contactarnos, " . $nombre . ".";
    } else {
        echo "El mensaje no pudo ser enviado.";
    }
} else {
    // No es un POST, redirigir al formulario
    header('Location: formulario.html');
}

// Función para limpiar los datos del formulario
function limpiarDato($dato) {
    $dato = trim($dato); // Eliminar espacios en blanco al principio y al final
    $dato = stripslashes($dato); // Eliminar las barras invertidas
    $dato = htmlspecialchars($dato); // Convertir caracteres especiales en entidades HTML
    return $dato;
}
?>


<!-- Una vez que hayas subido estos archivos (formulario.html, estilo.css, procesar.php) a tu hosting, el proceso funciona de la siguiente manera:

Usuario visita la página: El usuario accede a formulario.html a través de su navegador.
Rellenar y enviar el formulario: El usuario llena el formulario y lo envía.
Procesamiento en el servidor: El servidor web recibe los datos y ejecuta procesar.php. Este script procesa los datos (puede incluir enviar un correo electrónico).
Respuesta al usuario: procesar.php puede generar una respuesta, como un mensaje de confirmación, que se muestra al usuario. -->


<!-- si tu viejo es zapatero, sarpale la lata 

if (tuViejo === zapatero ) {
    return sarpale la lata
} else {
    return ranchamo en la esquina
}

si no supiste amar, ahora te puedas marchar

if ( !== amar) {
    return te puedas marchar
} else {
    return veni, pasa tranqui
} -->