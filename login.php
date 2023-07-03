<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "acceso";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexion:" . mysqli_connect_error());
}
$nombre = $_POST["txtUsuario"];
$pass = $_POST["txtpassword"];
$fechaing = date("y/m/d");
$horaing = time();
$alumno = mysqli_query($conn, "SELECT * FROM usuarios WHERE noCuenta = '$nombre' AND idTarjeta = '$pass'");
$consulta = "INSERT INTO ingresos(noCuenta, idTarjeta, FechaIngreso, HoraIngreso) VALUES ('$nombre','$pass','$fechaing','horaing')";
$resultado = mysqli_query($conn, $consulta);

/* Ahora comprobamos que variable contiene al usuario */
if (mysqli_num_rows($alumno) > 0) {
    /* Si entra en este if significa que el que intenta acceder es un alumno,
    por lo tanto le creamos una sesión */
    session_start();
    $_SESSION['alumno'] = "$nombre";

    // Display success message using JavaScript alert
    echo '<script>alert("Registro exitoso.");</script>';

    // Redirect to the index page
    echo '<script>window.location.href = "index.html";</script>';

    /* terminamos la ejecución ya que si redireccionamos ya no nos interesa
    seguir ejecutando código de este archivo */
    exit();
} else {
    /* Si no el usuario no se encuentra en ninguna de las tres tablas
    imprime el siguiente mensaje */
    //$mensajeaccesoincorrecto = "El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.";
    echo '<script>alert("Datos incorrectos, por favor vuelva a introducirlos.");</script>';

    // Redirect to the index page
    echo '<script>window.location.href = "Login.html";</script>';

    // Display error message using JavaScript alert
    echo '<script>alert("' . $mensajeaccesoincorrecto . '");</script>';
}
?>
