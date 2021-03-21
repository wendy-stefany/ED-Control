
<?php
include 'conexion.php';
$conexion = conectarBD();
$CampoNombre    = $_POST['Nombre'];
$CampoApellido    = $_POST['Apellido'];
$CampoTelefono    = $_POST['Telefono'];

$query1 ="SELECT MAX(num_proyecto) num_proyecto FROM proyecto";

$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

      while ($filas=pg_fetch_array($resultado)) {
        $num=$filas["num_proyecto"];
      }


if( empty($_POST['Tienda']) ) {
  $CampoTienda    = 'null';
  $CampoSucursal  = 'null';
  $CampoRazon = 'null';
  echo $CampoSucursal;
  $query ="insert into cliente(num_tienda, nombre_sucursal, razon_social, nombre, apellido,telefono,num_proyecto) values ($CampoTienda,$CampoSucursal,$CampoRazon,'$CampoNombre','$CampoApellido', '$CampoTelefono',$num)";}

else {


    $CampoTienda    = $_POST['Tienda'];
    $CampoSucursal  = $_POST['Sucursal'];
    $CampoRazon = $_POST['Razon'];
    echo $CampoSucursal;
    $query ="insert into cliente(num_tienda, nombre_sucursal, razon_social, nombre, apellido,telefono,num_proyecto)
    values ('$CampoTienda','$CampoSucursal','$CampoRazon','$CampoNombre','$CampoApellido', '$CampoTelefono'
    ,$num)";}
pg_query($conexion,$query);
header('Location: alta_cotizacion.html');
?>
