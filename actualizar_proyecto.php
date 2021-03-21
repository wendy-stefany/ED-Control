
<?php
$CampoNum                = $_POST['num_proyecto'];
$CampoEstado    = $_POST['estado'];
$Campofecha_levantamiento  = $_POST['fecha_levantamiento'];
$Camponum_captador = $_POST['num_captador'];
$Camponum_supervisor    = $_POST['num_supervisor'];
$Campoautorizado    = $_POST['autorizado'];
echo $Campofecha_levantamiento;


if( empty($_POST['fecha_rechazo']) ) {
  $Campofecha_rechazo = 'null';
  $Campofecha_inicio    = $_POST['fecha_inicio'];
  $Campofecha_finalizacion    = $_POST['fecha_finalizacion'];
  $query ="update proyecto set estado ='$CampoEstado',fecha_lanzamiento='$Campofecha_levantamiento' ,num_captador=$Camponum_captador, num_supervisor=$Camponum_supervisor,autorizado='$Campoautorizado', fecha_inicio='$Campofecha_inicio', fecha_finalizacion='$Campofecha_finalizacion',fecha_rechazo=$Campofecha_rechazo  where num_proyecto='$CampoNum'";
}
else  {
  $Campofecha_rechazo = $_POST['fecha_rechazo'];
  $Campofecha_inicio    = 'null';
  $Campofecha_finalizacion  = 'null';
  $query ="update proyecto set estado ='$CampoEstado',fecha_lanzamiento='$Campofecha_levantamiento', num_captador='$Camponum_captador', num_supervisor='$Camponum_supervisor',autorizado='$Campoautorizado', fecha_inicio=$Campofecha_inicio, fecha_finalizacion=$Campofecha_finalizacion,fecha_rechazo='$Campofecha_rechazo'  where num_proyecto='$CampoNum'";

  }

include 'conexion.php';
$conexion = conectarBD();
pg_query($conexion,$query);

header('Location: index.php');
?>
