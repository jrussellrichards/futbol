<!DOCTYPE html>
<html>
<head>

  <?php 

$host_db = "localhost";

$user_db = "root";

$pass_db = "";

$db_name = "futbol"; 

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
$rut=$_SESSION['username'];

 
$sql = "SELECT * FROM usuario WHERE rut = '$rut'";


$result = $conexion->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$nombre=$row["nombre"];




   ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<body background="chillan.html">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>  <div class="col-12 container">
    <div class="col-4"> <a class="navbar-brand" href="curva.html">La Curva Soccer</a></div> 
    <div class="col-6"></div>
    <div class=" col-2" ><?php echo "Bienvenido " . $nombre; ?></div>
    </div>
<?php }  ?>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="panel_sesion.php">Principal <span class="sr-only">(ucrrent)</span></a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="panel_sesion.php">Inicio</a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="user_reservas.php">Mis reservas</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="sesion_destroy.php">Cerrar sesión</a>
      </li>     	  
    </ul>
    
  </div>
</nav>		
