
<?php

$CampoEstado    = $_POST['estado'];
$Campofecha_levantamiento  = $_POST['fecha_levantamiento'];
$Camponum_captador = $_POST['num_captador'];
$Camponum_supervisor    = $_POST['num_supervisor'];
$Campoautorizado    = $_POST['autorizado'];


if( empty($_POST['fecha_rechazo']) ) {
  $Campofecha_rechazo = 'null';
  $Campofecha_inicio    = $_POST['fecha_inicio'];
  $Campofecha_finalizacion    = $_POST['fecha_finalizacion'];
  $query ="insert into proyecto(estado, fecha_lanzamiento,num_captador,num_supervisor,autorizado,fecha_inicio,fecha_finalizacion,fecha_rechazo) values ('$CampoEstado','$Campofecha_levantamiento',$Camponum_captador,$Camponum_supervisor,'$Campoautorizado','$Campofecha_inicio', '$Campofecha_finalizacion',$Campofecha_rechazo)";
}
else {
  $Campofecha_rechazo = $_POST['fecha_rechazo'];
  $Campofecha_inicio    = 'null';
  $Campofecha_finalizacion  = 'null';
  $query ="insert into proyecto(estado, fecha_lanzamiento,num_captador,num_supervisor,autorizado,fecha_inicio,fecha_finalizacion,fecha_rechazo) values ('$CampoEstado','$Campofecha_levantamiento',$Camponum_captador,$Camponum_supervisor,'$Campoautorizado',$Campofecha_inicio, $Campofecha_finalizacion,'$Campofecha_rechazo')";
}



include 'conexion.php';
$conexion = conectarBD();

pg_query($conexion,$query);
header('Location: cliente.html');
exit;
?>
