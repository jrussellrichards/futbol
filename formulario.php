<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<?php include_once("./header.php"); ?>
<form action="formularioo.php" class="form-horizontal" method='POST' style="margin:0 auto">
  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="nombre" placeholder="Nombre" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="apellido" placeholder="Apellido" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="rut" placeholder="Rut" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="email" class="form-control" name="email" placeholder="Email"  />
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-4 control-label"></label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="celu" placeholder="Celular" />
    </div>
  </div>

  <div class="form-group">
    <div class="">
      <center><button type="submit" class="btn btn-primary">Registrarse</button></center>
    </div>
  </div>

</form>

</body>