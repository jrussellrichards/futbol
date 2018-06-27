<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<?php include_once("./header.php"); ?>

<?php
		$servername = "localhost"; 
		$username = "root";
		$password = "";
		$db= "futbol";

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$rut = $_POST['rut'];
		$contrasena = $_POST['contrasena'];
		$email = $_POST['email'];
		$celu = $_POST['celu'];

		$conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: " . mysqli_connect_error());				// Check connection
		$insert = "INSERT INTO usuario(nombre,apellido, correo, telefono,rut,contrasena)
					  VALUES('$nombre', '$apellido', '$email', '$celu','$rut','$contrasena')";
		
		if ($conn->query($insert) === TRUE) { 	
}else{
	echo $conn->error;
}
?>
		