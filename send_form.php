<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $to = "events@danielamaissi.tech"; 
        $subject = "Nuevo mensaje de contacto";
        
        
        $body = "Nombre: $name\nApellido: $lastname\nEmail: $email\n\nMensaje:\n$message";
        
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado. Gracias por contactarnos.";
        } else {
            echo "Hubo un error al enviar el mensaje. Por favor, intenta de nuevo.";
        }
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
