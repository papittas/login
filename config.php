<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "Aqui tu ID DE CLIENTE"
$google_client->setClientId('778785655151-ih0nfr5nrjlp7r5ueeapl4h81t4c40lr.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key Aqui tu CLAVE
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/accesocorrecto.html');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>
