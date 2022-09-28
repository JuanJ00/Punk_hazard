<?php
session_start();
if($_POST) {
	if(($_POST['usuario']=="juan")&&($_POST['clave']=="juanjose")){

		$_SESSION['usuario']="ok";
	    $_SESSION['nombreUsuario']="juan";  
		header('Location:inicio.php');

	}else{

		$mensaje="Error: El usuario o  contraseña son incorrectos";

	}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del sitio web</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>
    
<div class="formulario">

		<form method="POST">
			<h2>Administrador</h2>
			<div class="inputBox">
				<input type="text"  name = "usuario" required="required" >
				<span>Usuario</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password"  name = "clave" required="required" > 
				<span>Contraseña</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#">Olvidaste tu contraseña</a>
				<a href="#">Registrate</a>
			</div>
			<input type="submit" value="Entrar">
		</form>
</div>

</body>
</html>