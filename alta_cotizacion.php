
<?php
include 'conexion.php';
$conexion = conectarBD();

$CampoIncidencia    = $_POST['Incidencia'];
$CampoTiempo        = $_POST['Tiempo'];
$CampoMaterial      = $_POST['Material'];
$CampoCosto         = $_POST['Costo'];
$CampoConcepto      = $_POST['Concepto'];


$query1 ="SELECT MAX(num_proyecto) num_proyecto FROM proyecto";
$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
while ($filas=pg_fetch_array($resultado)) {$num=$filas["num_proyecto"];}

$query="insert into cotizacion (num_incidencias,tiempo_entrega,num_proyecto) values ($CampoIncidencia,'$CampoTiempo',$num);";
pg_query($conexion,$query);

$query2 ="SELECT MAX(num_cotizacion) num_cotizacion FROM cotizacion";
$resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr2=pg_num_rows($resultado2);
while ($filas=pg_fetch_array($resultado2)) {$num_cot=$filas["num_cotizacion"];}

echo $num_cot;
echo "string";
echo $num;

$query="insert into material(cantidad_material,concepto,costo_unitario,num_cotizacion) values ($CampoMaterial,'$CampoConcepto','$CampoCosto',$num_cot);";
pg_query($conexion,$query);


header('Location: alta_material.html');
exit;
?>
