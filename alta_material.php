
<?php
include 'conexion.php';
$conexion = conectarBD();

$CampoMaterial      = $_POST['Material'];
$CampoCosto         = $_POST['Costo'];
$CampoConcepto      = $_POST['Concepto'];



$query2 ="SELECT MAX(num_cotizacion) num_cotizacion FROM cotizacion";
$resultado2=pg_query($conexion,$query2) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr2=pg_num_rows($resultado2);
while ($filas=pg_fetch_array($resultado2)) {$num_cot=$filas["num_cotizacion"];}

echo $num_cot;
echo "string";
echo $num;

$query="insert into material(cantidad_material,concepto,costo_unitario,num_cotizacion) values ($CampoMaterial,'$CampoConcepto','$CampoCosto',$num_cot);";
pg_query($conexion,$query);


//header('Location: alta_material.html');
exit;
?>
