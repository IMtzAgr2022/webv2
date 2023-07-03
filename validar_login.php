<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "acceso";

// Crear la conexión
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtenemos los datos ingresados por el usuario
$username = $_GET['username'];
$password = $_GET['password'];

// Escapar los datos para evitar inyección SQL
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM administrador WHERE userLogin = '$username' AND passwdLogin = '$password'";
$result = $conn->query($sql);

// Verificar si se encontró un registro coincidente
if ($result->num_rows == 1) {
    // Los datos son correctos, redirigir al usuario a la página del administrador
    header('Location: pagina_administrador.php');
    exit(); // Importante: Salir del script para evitar que se siga ejecutando
} else {
    // Los datos son incorrectos, puedes mostrar un mensaje de error o redirigir a otra página
    
    header('Location: pagina_login.php?error=Usuario o contraseña incorrectos. Por favor, ingrese nuevamente');
    exit();

}

// Cerrar la conexión a la base de datos
$conn->close();
?>
