<?php
$CampoNum           = $_POST['num_comentario'];

echo $CampoNum;
include 'conexion.php';
$conexion = conectarBD();

$query="delete from comentario where num_comentario=$CampoNum;";
pg_query($conexion,$query);

header('Location: index.php');
exit;
?>
