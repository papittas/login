<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php'; // Asegúrate que esto esté bien

$client = new Google_Client();
$client->setClientId('975567081498-voblkm52uont1r9meijv4v65j32hdgsn.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/config.php');
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    echo "Código recibido: " . htmlspecialchars($_GET['code']) . "<br>";

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        echo "Error al obtener token: " . $token['error_description'];
        exit;
    }

    $client->setAccessToken($token['access_token']);

    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Debug de datos
    echo "<pre>";
    print_r($userInfo);
    echo "</pre>";

    // Redirigir a accesocorrecto.php
    if (isset($token)) {
    $_SESSION['access_token'] = $token;
    header('Location: accesocorrecto.html'); // redirige a la página deseada
    exit();
}

} else {
    echo "No se recibió el parámetro 'code'";
}




