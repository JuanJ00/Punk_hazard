<?php include("cabecera.php")?>


<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");


switch($accion){


	case "Agregar":

		$sentenciaSQL= $conexion->prepare("INSERT INTO servicios (nombre,descripcion,imagen) VALUES (:nombre,:descripcion,:imagen);");
		$sentenciaSQL->bindParam(':nombre',$txtNombre);
		$sentenciaSQL->bindParam(':descripcion',$txtDescripcion);

		$fecha= new DateTime();

		$nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
		
		$tmpImagen=$_FILES["txtImagen"]["tmp_name"];
		
		if($tmpImagen!=""){

			move_uploaded_file($tmpImagen,"img/".$nombreArchivo);

		}
		
		$sentenciaSQL->bindParam(':imagen',$nombreArchivo);
		$sentenciaSQL->execute();

		header("Location:servicios.php");
		break;



	case "Modificar":
			// echo "Presionado botón modificar";

		$sentenciaSQL= $conexion->prepare("UPDATE servicios SET nombre=:nombre WHERE id=:id ");
		$sentenciaSQL->bindParam(':nombre',$txtNombre);  
		$sentenciaSQL->bindParam(':id',$txtID);                                      

		$sentenciaSQL->execute();
		
		$sentenciaSQL= $conexion->prepare("UPDATE servicios SET descripcion=:descripcion WHERE id=:id ");
		$sentenciaSQL->bindParam(':descripcion',$txtDescripcion);  
		$sentenciaSQL->bindParam(':id',$txtID);                                      
		$sentenciaSQL->execute();

		if($txtImagen!=""){
		
			$fecha= new DateTime();
			$nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
			$tmpImagen=$_FILES["txtImagen"]["tmp_name"];
	
			move_uploaded_file($tmpImagen,"img/".$nombreArchivo);
	
			$sentenciaSQL= $conexion->prepare("SELECT imagen FROM servicios WHERE id=:id");
			$sentenciaSQL->bindParam(':id',$txtID);                                       
			$sentenciaSQL->execute();
			$servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
			
			if(isset($servicio["imagen"]) &&($servicio["imagen"]!="imagen.jpg")){
	
				if(file_exists("img/".$servicio["imagen"])){
	
					unlink("img/".$servicio["imagen"]);
				}
	
			}
			

		$sentenciaSQL= $conexion->prepare("UPDATE servicios SET imagen=:imagen WHERE id=:id ");
		$sentenciaSQL->bindParam(':imagen',$nombreArchivo);  
		$sentenciaSQL->bindParam(':id',$txtID);                                      
		$sentenciaSQL->execute();
		
		}
		header("Location:servicios.php");
			break;	

	case "Cancelar":
			header("Location:servicios.php");
			break;	
	
	case "Seleccionar":
			
		
		$sentenciaSQL= $conexion->prepare("SELECT * FROM servicios WHERE id=:id");
		$sentenciaSQL->bindParam(':id',$txtID);                                       
		$sentenciaSQL->execute();
		$servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

		$txtNombre=$servicio['nombre'];
		$txtDescripcion=$servicio['descripcion'];
		$txtImagen=$servicio['imagen'];

	
			break;	

	case "Borrar":

		$sentenciaSQL= $conexion->prepare("SELECT imagen FROM servicios WHERE id=:id");
		$sentenciaSQL->bindParam(':id',$txtID);                                       
		$sentenciaSQL->execute();
		$servicio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
		
		if(isset($servicio["imagen"]) &&($servicio["imagen"]!="imagen.jpg")){

			if(file_exists("img/".$servicio["imagen"])){

				unlink("img/".$servicio["imagen"]);
			}

		}
			// echo "Presionado botón borrar";
		$sentenciaSQL= $conexion->prepare("DELETE FROM servicios WHERE id=:id"); 
		$sentenciaSQL->bindParam(':id',$txtID);                                       
		$sentenciaSQL->execute();
		header("Location:servicios.php");
		
			break;		

}		


$sentenciaSQL= $conexion->prepare("SELECT * FROM servicios ");
$sentenciaSQL->execute();
$listaservicios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="body">
	<div class="padre">

	<div class="box">
		<form autocomplete="off" method="POST" enctype="multipart/form-data">
			<h5>Servicio</h5>
			<div class="inputBox">
				<label for="">ID</label>
				<input type="text"  required readonly value="<?php echo $txtID; ?>"  name="txtID" id = "txtID" >
				<i></i>
			</div>
			<div class="inputBox">
				<input type="text"  required  value="<?php echo $txtNombre; ?>" name="txtNombre" id = "txtNombre" required="required">
				<span>Nombre</span>
				<i></i>
			</div>

			<div class="inputBox">
				<input type="text" required  value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id = "txtDescripcion" required="required" >
				<span>Descripcion</span>
				<i></i>
			</div>
			
			<div class="inputBox inputBox2">
				<input type="file"  name="txtImagen" id = "txtImagen">
				<i>
				<?php echo $txtImagen; ?>

				<?php   if($txtImagen!=""){  ?>

					<img src="img/<?php echo $txtImagen;?>" alt="" class="">

				<?php	}?>
				</i>
				<span></span>
			</div>
			<div class="links">
				<br>
			</div>
			<div class="botones">
			<input type="submit"  <?php echo ($accion=="Seleccionar")?"disable":"";?> value="Agregar" name="accion">
			<input type="submit"  <?php echo ($accion!="Seleccionar")?"disable":"";?> value="Modificar" name="accion">
			<input type="submit"  <?php echo ($accion!="Seleccionar")?"disable":"";?> value="Cancelar" name="accion">
			</div>
		</form>
	</div>



	<div id="main-container">

		<table>
			<thead>
				<tr>
					<th>ID</th><th>Nombre</th><th>Descripcion</th><th>Imagen</th><th>Acciones</th>
				</tr>
			</thead>
			<?php foreach($listaservicios as $servicio){ ?>
			<tr>
				<td><?php echo $servicio['id']; ?></td>
				<td><?php echo $servicio['nombre']; ?></td>
				<td><?php echo $servicio['descripcion']; ?></td>
				<td>
					
				<img src="img/<?php echo $servicio['imagen']; ?>" alt="">
				

				</td>
				
				
				
				<td class="botonesserv">
 
				<!-- Seleccionar | Borrar -->
				
				<form method="POST">

				<input type="hidden" name="txtID" id="txtID" value="<?php echo $servicio['id'];?>"/>
				<input type="submit" value="Seleccionar"  name="accion"/>
				<input type="submit" value="Borrar" name="accion"/>

				
				</form> 

				</td>
			</tr>
			<?php }?>
		</table>
	</div>


</div>

</div>
</body>
</html>

<?php include("pie.php")?>
