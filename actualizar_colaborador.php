<link rel="stylesheet" type="text/css" href="css" >
<?php
$CampoNum       = $_POST['num'];
$CampoNombre    = $_POST['nombre'];
$CampoApellido  = $_POST['apellido'];
$CampoHabilidad = $_POST['habilidad'];
include 'conexion.php';
$conexion = conectarBD();

$query ="update colaboradores set nombre ='$CampoNombre',apellido ='$CampoApellido', habilidad='$CampoHabilidad' where num_colaborador='$CampoNum'";
pg_query($conexion,$query);

header('Location: colaboradores.php');
exit;
?>
