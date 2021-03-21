<?php

$CampoNombre    = $_POST['nombre'];
$CampoApellido  = $_POST['apellido'];
$CampoHabilidad = $_POST['habilidad'];
echo $CampoNombre;
include 'conexion.php';
$conexion = conectarBD();

$query ="insert into colaboradores(nombre, apellido, habilidad) values ('$CampoNombre','$CampoApellido','$CampoHabilidad')";
 pg_query($conexion,$query);

 header('Location: colaboradores.php');
 exit;
?>
