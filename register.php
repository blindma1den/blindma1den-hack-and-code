<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $hackathonCtf = $_POST['hackathonCtf'];
    $teamName = $_POST['teamName'];
    $teamMemberNum = $_POST['teamMemberNum'];
    $country = $_POST['country'];

    
    $to = 'events@danielamaissi.tech'; 
    $subject = 'Nuevo Registro en Hackathon/CTF';
    $message = "Nombre: $name\nApellido: $lastname\nUsername: $username\nEmail: $email\nHackathon o CTF: $hackathonCtf\nNombre del equipo: $teamName\nNúmero de integrantes: $teamMemberNum\nPaís de residencia: $country";
    $headers = "From: events@danielamaissi.tech\r\n"; 
    if (mail($to, $subject, $message, $headers)) {
        echo "El formulario se ha enviado correctamente.";
    } else {
        echo "Hubo un problema al enviar el formulario.";
    }
}
?>
