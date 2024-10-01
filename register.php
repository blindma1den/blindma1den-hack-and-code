<?php
require_once 'stripe-php-15.11.0-beta.1/init.php';
$key = getenv('STRIPE_PRUEBA');
\Stripe\Stripe::setApiKey($key);

session_start();

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];
    try {
        $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo $e->getMessage();
    }

    if ($checkout_session->payment_status = 'paid') {
        $formData = $_SESSION['formData'];

        $name = $formData['name'];
        $lastname = $formData['lastname'];
        $username = $formData['username'];
        $email = $formData['email'];
        $hackathonCtf = $formData['hackathonCtf'];
        $teamName = $formData['teamName'];
        $teamMemberNum = $formData['teamMemberNum'];
        $country = $formData['country'];

        $to = 'events@danielamaissi.tech';
        $subject = 'Nuevo Registro en Hackathon/CTF';
        $message = "Nombre: $name\nApellido: $lastname\nUsername: $username\nEmail: $email\nHackathon o CTF: $hackathonCtf\nNombre del equipo: $teamName\nNúmero de integrantes: $teamMemberNum\nPaís de residencia: $country";
        $headers = "From: events@danielamaissi.tech\r\n";
        try {
            if (mail($to, $subject, $message, $headers)) {
                header('Location: success.html');
                echo "Enviado correctamente";
                exit();
            } else {
                echo "No se pudo enviar el formulario :c";
            }
        } catch (Exception $e) {
            echo "Hubo un problema al enviar el formulario.", $e->getMessage();
        }

        session_unset();
        session_destroy();
    } else {
        echo "Hubo un problema al realizar el pago :c";
    }
}

?>
