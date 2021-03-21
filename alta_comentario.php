<?php

$CampoProyecto     = $_POST['proyecto'];
$CampoColaborador  = $_POST['colaborador'];
$CampoFecha        = $_POST['fecha'];
$CampoContenido    = $_POST['contenido'];
include 'conexion.php';
$conexion = conectarBD();

$query ="insert into comentario(num_proyecto, num_colaborador, fecha, Contenido)
 values ($CampoProyecto,$CampoColaborador,'$CampoFecha','$CampoContenido')";
 pg_query($conexion,$query);
 header('Location: comentarios.php');
 exit;

?>
