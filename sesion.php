<!DOCTYPE html>
<html>
<head>  
<?php session_start();   ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
</head>


<?php  include_once("./header.php"); ?>




<form class="form-horizontal" action="sesion.php" method="POST" style="margin:0 auto">
  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="username" placeholder="Ingresa tu usuario" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña" />
    </div>
  </div>


  
  <div class="form-group">
    <div class="">
  <center><button name="btn_sesion" type="submit" class="btn btn-primary">Iniciar sesión</button></center>
    </div>
  <  
	  
</form>
</body>
<?php



if(isset($_POST['btn_sesion'])){ 

 

$host_db = "localhost";

$user_db = "root";

$pass_db = "";

$db_name = "futbol"; 

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 

if ($conexion->connect_error) {

 die("La conexion falló: " . $conexion->connect_error);

}

 

$username = $_POST['username'];

$password = $_POST['contrasena'];

  

$sql = "SELECT * FROM usuario WHERE rut = '$username'";

 

$result = $conexion->query($sql);

 

 

if ($result->num_rows > 0) {     

 }

 $row = $result->fetch_array(MYSQLI_ASSOC);

 if ( $password== $row['contrasena']) { 

  

  $_SESSION['loggedin'] = true;

  $_SESSION['username'] = $username;

  $_SESSION['start'] = time();

  $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);


   


  header("Location: panel_sesion.php");
 } else { 

 echo "Username o Password estan incorrectos."; ?>
<script type="text/javascript">
    $('#myModal').modal({ show: false})
    $('#myModal').modal('show');
    
</script>


<?php 


 }

 mysqli_close($conexion);
}
 ?>

