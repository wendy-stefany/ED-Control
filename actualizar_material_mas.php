<link rel="stylesheet" type="text/css" href="css" >
<?php
$CampoNum           = $_POST['Num'];
$CampoMaterial      = $_POST['Material'];
$CampoCosto         = $_POST['Costo'];
$CampoConcepto      = $_POST['Concepto'];

include 'conexion.php';
$conexion = conectarBD();

$query1 ="SELECT num_cotizacion FROM cotizacion where num_proyecto=$CampoNum;";
$resultado=pg_query($conexion,$query1) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

      while ($filas=pg_fetch_array($resultado)) {
        $num_cot=$filas["num_cotizacion"];
      }
$query="delete from material where num_cotizacion=$num_cot;";
pg_query($conexion,$query);
$query="insert into material(cantidad_material,concepto,costo_unitario,num_cotizacion) values ($CampoMaterial,'$CampoConcepto','$CampoCosto',$num_cot);";
pg_query($conexion,$query);

header('Location: actualizar_material_mas.html');
exit;
?>
