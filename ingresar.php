<?php 

	$conexion=mysqli_connect('localhost','root','','acceso');

if (isset($_POST['registrar'])){
if (strlen($_POST['txtUsuario']) >= 1 && strlen($_POST['txtpassword']) >= 1){
$nombre = trim($_POST['txtUsuario']);
$pass = trim($_POST['txtpassword']);
$fechaing = date("d/m/y");
$horaing = time();
$consulta = "INSERT INTO `ingresos`(noCuenta, idTarjeta, FechaIngreso, HoraIngreso) VALUES ('$txtUsuario','$txtpassword','$fechaing','horaing')";
$resultado = mysqli_query($conexion,$consulta);
if ($resultado){
?>
<h3 class="ok">Ingreso Correcto</h3>
<?php
}else{
?>
<h3 class="bad">Ingreso Incorrecto</h3>
<?php
}
}
}
 ?>