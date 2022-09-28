<?php

session_start();

     if(!isset($_SESSION['usuario'])){
    
        header("Location:./index.php");
        // header("Location:servicios.php");

     }else{

          if($_SESSION['usuario']=="ok"){

            $nombreUsuario=$_SESSION["nombreUsuario"];
          }
     }

?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="es">
    <link rel="stylesheet" href="estilos/estiloadmin.css">
    <link rel="stylesheet" href="estilos/styleserv.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>


<!-- Cabecera inicio---- -->
</head>
<body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/Sitio Web"?>



<header id ="header">
       <div class="contenedor_header">
            <div class="logo">
                <img src="img/hackerlogo.svg" alt="">
                <h1 class="titulo">PUNK  </h1>
            </div>
            <div class="contendedor_nav">
                <nav id="nav">
                    <ul id="a">
                       <li><a href="#" class="select">Administrador del sitio web</a></li>
                       <li><a href="<?php echo $url;?>/administrador/inicio.php">Inicio</a></li>
                       <li><a href="<?php echo $url;?>/administrador/servicios.php">Servicios</a></li>
                       <li><a href="<?php echo $url;?>/administrador/cerrar.php">Cerrar</a></li>
                       <li><a href="<?php echo $url;?>" target="_blank">Ver mi sitio</a></li>

                    </ul>
                </nav>
            </div>

             <div class="btn_menu" id="btn-menu"><i class="fa fa-bars"></i></div>
        
            </div>       
</header>



