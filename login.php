<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
</head>
<body>
    <?php
    //Conexion con la base
    include_once("dbconn.php")
    ?>
 

    






<?php



if(isset($_POST['Enviar'])) {
// Obtener las credenciales del formulario
$usuario = trim($_POST['User']);
$password = $_POST['password'];

// Verificar si el usuario existe en la base de datos
$sql = "SELECT * FROM registronuevo WHERE user = '$usuario'";
$result = mysqli_query($conex, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['pass'];

    if (password_verify($password, $hashedPassword)) {
        // Contraseña correcta, iniciar sesión
    
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: accesocorrecto.html");
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // Usuario inexistente
    echo "Usuario inexistente.";
}

mysqli_close($conex);
}
?>


</body>
</html>
