<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $country = htmlspecialchars(trim($_POST['country']));

    
    $errors = [];
    if (empty($name)) {
        $errors[] = "El nombre es obligatorio.";
    }
    if (empty($lastname)) {
        $errors[] = "El apellido es obligatorio.";
    }
    if (empty($username)) {
        $errors[] = "El username de X es obligatorio.";
    }
    if (empty($email)) {
        $errors[] = "El email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no es válido.";
    }
    if (empty($country)) {
        $errors[] = "El país de residencia es obligatorio.";
    }

    
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        exit;
    }

    
    $to = 'events@danielamaissi.tech';
    $subject = 'Registro de Evento';
    $message = "Nombre: $name\n";
    $message .= "Apellido: $lastname\n";
    $message .= "Username de X: $username\n";
    $message .= "Email: $email\n";
    $message .= "País de residencia: $country\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    
    if (mail($to, $subject, $message, $headers)) {
        echo "<p style='color: green;'>Registro enviado con éxito.</p>";
    } else {
        echo "<p style='color: red;'>Error al enviar el registro. Inténtalo de nuevo más tarde.</p>";
    }
}
?>

