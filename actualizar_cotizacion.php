<link rel="stylesheet" type="text/css" href="css" >
<?php
$CampoNum           = $_POST['Num'];
$CampoIncidencia    = $_POST['Incidencia'];
$CampoTiempo        = $_POST['Tiempo'];


include 'conexion.php';
$conexion = conectarBD();

$query1 ="SELECT num_cotizacion FROM cotizacion where num_proyecto=$CampoNum;";
$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

      while ($filas=pg_fetch_array($resultado)) {
        $num_cot=$filas["num_cotizacion"];
      }

$query ="update cotizacion set num_incidencias ='$CampoIncidencia',tiempo_entrega ='$CampoTiempo' where num_proyecto='$CampoNum'";
pg_query($conexion,$query);

header('Location: index.php');
exit;
?>
