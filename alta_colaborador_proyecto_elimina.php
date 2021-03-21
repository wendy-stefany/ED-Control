<?php

$CampoColaborador    = $_POST['num_colaborador'];
$num  = $_POST['num'];

include 'conexion.php';
$conexion = conectarBD();

$query ="delete from colaborador_proyecto where num_colaborador=$CampoColaborador ";

 pg_query($conexion,$query);

header('Location: alta_colaborador_proyecto_elimina.html');
 exit;
?>
