<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"sitio");

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$query = "INSERT INTO `informacion_usuario`(`usuario`,`correo`,`mensaje`) VALUES ('$usuario','$correo','$mensaje') ";

mysqli_query($connection,$query);

echo "LOS DATOS HAN SIDO ENVIADOS A LA BASE DE DATOS";
?> 
