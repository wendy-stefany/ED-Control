
<?php
include 'conexion.php';
$conexion         = conectarBD();
$CampoNombre      = $_POST['Nombre'];
$CampoApellido    = $_POST['Apellido'];
$CampoTelefono    = $_POST['Telefono'];
$CampoNum         = $_POST['num'];

if( empty($_POST['Tienda']) ) {
  $CampoTienda    = 'null';
  $CampoSucursal  = 'null';
  $CampoRazon = 'null';
  echo $CampoSucursal;
  echo $CampoTienda;
  echo $CampoRazon;
  $query ="update cliente set num_tienda=$CampoTienda, nombre_sucursal=$CampoSucursal, razon_social=$CampoRazon, nombre='$CampoNombre ', apellido='$CampoApellido',telefono='$CampoTelefono' where num_proyecto = $CampoNum;";}

else {
    $CampoTienda    = $_POST['Tienda'];
    $CampoSucursal  = $_POST['Sucursal'];
    $CampoRazon = $_POST['Razon'];
    echo $CampoSucursal;
    $query ="update cliente set num_tienda=$CampoTienda, nombre_sucursal='$CampoSucursal', razon_social='$CampoRazon', nombre='$CampoNombre ', apellido='$CampoApellido',telefono='$CampoTelefono' where num_proyecto = '$CampoNum';";}

pg_query($conexion,$query);
header('Location: index.php');
?>
