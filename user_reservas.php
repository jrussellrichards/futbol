<!DOCTYPE html>
<html>
<head>
  <?php session_start(); ?>


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
</head>
<body background="">
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



<?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $db= "futbol";



    $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: " . mysqli_connect_error());       // Check connection

         


              $consulta = "SELECT * FROM user_reservas,usuario,reserva where user_reservas.rut=usuario.rut and user_reservas.reserva= reserva.id_reserva";
              $resultados = mysqli_query($conn,$consulta);
      ?>

         <table class="table">
        <tr>
          <th>Número de reserva</th>
          <th>Fecha de reserva</th>
          <th>Cancha</th>
          <th>Fecha</th>
          <th>Horario</th>
          <th>Valor</th>
          <th>Abono</th>
          <th>Total a pagar</th>

          
        </tr>  

        <?php
           

    while($consulta = mysqli_fetch_array($resultados))
    {
               echo "<tr>";
               echo "<td>" . $consulta["id_reserva"] . "</td>";
               echo "<td>" . $consulta["fecha_abono"] ."</td>";
               echo "<td>" . $consulta["cancha"] . "</td>";
               echo "<td>" . $consulta["fecha_pago_saldo"] ."</td>";
               echo "<td>" . $consulta["horario"] . "</td>";
               echo "<td>" . $consulta["total_a_pagar"] . "</td>";              
               echo "<td>" . $consulta["abono_pago"] ."</td>";
               echo "<td>" . $consulta["saldo_pendiente"] ."</td>";
               

             echo "</tr>";
    }
  
?>




</body ">


		