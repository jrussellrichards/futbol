<!DOCTYPE html>
<html>
<head>
  <?php session_start(); 
  
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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


}

   



   ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
</head>

  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>  <body background=".html">
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
        <a class="nav-link" href="panel_sesion.php">Principal <span class="sr-only">(current)</span></a>
      </li>


<li class="nav-item">
        <a class="nav-link" href="reserva.php">Reserva</a>
      </li>  
<li class="nav-item">
        <a class="nav-link" href="profile.php">Perfil</a>
      </li> 
<li class="nav-item">
        <a class="nav-link" href="consulta_cancha.php">Canchas</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="sesion_destroy.php">Cerrar sesión</a>
      </li>         
    </ul>
    
  </div>
</nav>
</body>
<?php }  

else { ?>      <body background="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand col-12" href="curva.html">La Curva Soccer</a>
 

  <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Principal <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="formulario.php">Registrarse</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="sesion.php">Iniciar Sesión</a>
      </li>  
<li class="nav-item">
        <a class="nav-link" href="reserva.php">Reserva</a>
      </li>  

<li class="nav-item">
        <a class="nav-link" href="consulta_cancha.php">Canchas</a>
      </li>         
    </ul>
    
  </div>
</nav>
</body>  <?php        }


?>






<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $db= "futbol";



    $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: " . mysqli_connect_error());       // Check connection

         


              $consulta = "SELECT * FROM horario";
              $resultados = mysqli_query($conn,$consulta);
      ?>

         <table class="table">
        <tr>
          <th>Hora</th>
          <th>Abono mínimo</th>
          <th>Valor</th>

          
        </tr>  

        <?php
           

    while($consulta = mysqli_fetch_array($resultados))
    {
              echo "<tr>";
               echo "<td>" . $consulta["hora"] . "</td>";
               echo "<td>" . $consulta["abono_minimo"] ."</td>";
               echo "<td>" . $consulta["valor"] . "</td>";

               
             echo "</tr>";
    }
  
?>






		