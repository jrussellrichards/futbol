<!DOCTYPE html>
<html>
<head>  
  <?php session_start(); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<script src="bootstrap.bundle.min.js / bootstrap.bundle.js"></script>
</head>
<body background="chillan.html">
<meta charset="uttf"/>



  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include_once("./header_panel.php");}

    else {include_once("./header.php"); }
?> 


<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include_once("./header_panel.php"); ?>

  
  <form action='reserva.php' method="POST">
    <div class="form-group col-md-6">
    <label for="exampleInputEmail1"> </label>
    <input type="text" class="form-control" name="abono"  placeholder="Abono">
    </div>
  <div class=" form-group col-md-6">
    <label for="exampleInputName"> </label>
    <input type="date" class="form-control" name="fecha" placeholder="Dia">
     </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1"> </label>
    <input type="time" class="form-control" name="hora"  placeholder="Hora">
    </div>
<div class="form-group col-md-6">
   <select name="cancha">
<option >Seleccione una cancha</option>
  <option value="1">Cancha 1</option>
  <option value="2">Cancha 2</option>
  <option value="3">Cancha 3</option>
  <option value="4">Cancha 4</option>
</select></div>
<div class="form-group col-md-6">
  <button  type="Pedir" name="btn_insert" class="btn btn-primary">Submit</button>
  </div>
</form>





  
  

<?php } else{ ?> <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <span><strong>Error: </strong> Debes iniciar sesión para poder arrendar una de nuestras canchas <a href="sesion.php" class="alert-link">Por favor inicia sesión o crea una cuenta</a>.</span>
    </div> 

  <?php } ?>





<?php 
  if(isset($_POST['btn_insert'])){ 
  $servername = "localhost"; 
    $username = "root";
    $password = "";
    $db= "futbol";


    $conn = mysqli_connect($servername, $username, $password,$db) or die("Connection failed: " . mysqli_connect_error());
    $hora = $_POST['hora'];

    $consulta = "SELECT * FROM horario where hora='$hora'";
    $resultados = mysqli_query($conn,$consulta);
    $consulta = mysqli_fetch_array($resultados);
   

    $fecha = $_POST['fecha'];    
    $cancha = $_POST['cancha'];
    $abono = $_POST['abono'];
    $rut=  $_SESSION['username'];
    $total_a_pagar=$consulta["valor"];
    $diferencia=$total_a_pagar-$abono;
    $hoy = date("y-m-d"); 


    $consulta_verificacion = "SELECT * FROM reserva where horario='$hora' and cancha='$cancha' and fecha_pago_saldo='$fecha'";
    // echo $consulta_verificacion;
    $resultado_verificacion = mysqli_query($conn,$consulta_verificacion);
    $row_cnt = $resultado_verificacion->num_rows;

      
    $insert_reserva = "INSERT INTO reserva(total_a_pagar, saldo_pendiente, fecha_pago_saldo,fecha_abono,rut,abono_pago,horario,cancha)
            VALUES( '$total_a_pagar', '$diferencia', '$fecha','$hoy','$rut','$abono','$hora',$cancha)";

    // echo $insert_reserva;        
    $consuta_abono= "SELECT * FROM horario where hora='$hora'";
    $resultado_consulta_abono = mysqli_query($conn,$consuta_abono);
    $resultado_consulta_abono=mysqli_fetch_array($resultado_consulta_abono);
    $abono_minimo=$resultado_consulta_abono[1];
    

 if($row_cnt<1 and $abono_minimo<$abono){
if ($conn->query($insert_reserva) === TRUE) {


      $consulta="select max(id_reserva) from reserva";
       $resultados = mysqli_query($conn,$consulta);
      $consulta = mysqli_fetch_array($resultados);
       $id_reserva=$consulta[0];












    echo "Reserva registrada";
    // $insert_user_reserva="insert into user_reservas values('$rut','$id_reserva')";
    // $conn->query($insert_user_reserva); 


} }else { ?>  <span><strong>Error: </strong> Es imposible agendar esa cancha en ese horario. Revisa que tu pago mínimo sea mayor que el solicitado o que estás ingresando un horario válido <a href="consulta_cancha.php" class="alert-link">Más información de nuestras canchas acá</a>.</span><?php 
          
 
}



    // $consulta_id = "SELECT max(id_reserva) FROM reserva";
    // $resultados = mysqli_query($conn,$consulta_id);
    // $consulta = mysqli_fetch_array($resultados);
    // $id_reserva=$consulta[0];
    // $insert_existe="insert into existe VALUES('$hora,'fecha',)";
    // $conn->query($insert_existe);






}
 ?>
</body>     