<?php

$CampoColaborador    = $_POST['num_colaborador'];
$num  = $_POST['num'];

include 'conexion.php';
$conexion = conectarBD();

$query ="insert into colaborador_proyecto(num_proyecto,num_colaborador) values ($num,$CampoColaborador)";

 pg_query($conexion,$query);

 header('Location: alta_colaborador_proyecto_agrega.html');
 exit;
?>
