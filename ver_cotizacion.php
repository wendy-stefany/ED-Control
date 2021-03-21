<?php require_once ('conexion.php'); $conexion=conectarBD();?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cotizacion</title>
    <link rel="stylesheet" type="text/css" href="css.css" >
  	<h2>Cotizacion</h2>

<?php
error_reporting(0);
$numP   = $_POST['num'];
$query ="select *from cliente where num_proyecto=$numP";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
if($nr>0){
  echo "<table>
        <tr><td>#Tienda</td><td>Sucursar</td><td>Razon Social</td><td>Nombre</td>
        <td>Apellido</td><td>Telefono</td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<trtr class=bg1><td>".$filas["num_tienda"]."</td>";
          echo"<td>".$filas["nombre_sucursal"]."</td>";
          echo"<td>".$filas["razon_social"]."</td>";
          echo"<td>".$filas["nombre"]."</td>";
          echo"<td>".$filas["apellido"]."</td>";
          echo"<td>".$filas["telefono"]."</td>";

        }echo"</table>";
}

$query ="select *from cotizacion where num_proyecto=$numP;";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
if($nr>0){
  echo "<table>
        <tr><td>#Cotizacion</td><td>#Incidencia</td><td>Tiempo de Entrega</td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<trtr class=bg1><td>".$filas["num_cotizacion"]."</td>";
          $num=$filas["num_cotizacion"];
          echo"<td>".$filas["num_incidencias"]."</td>";
          echo"<td>".$filas["tiempo_entrega"]."</td></tr>";
        }echo"</table>";
}else {

  echo "No hay resultados "; }

  $costo=0;
  $query ="select *from material where num_cotizacion=$num;";//esta
  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
  $nr=pg_num_rows($resultado);
  if($nr>0){
    echo "<table>
          <tr><td>Cantidad Material</td><td>Concepto</td><td>Costo Unitario</td><td>Costo Parcial</td><tr>";
          while ($filas=pg_fetch_array($resultado)) {
            echo"<trtr class=bg1><td>".$filas["cantidad_material"]."</td>";
            $cant=$filas["cantidad_material"];
            echo"<td>".$filas["concepto"]."</td>";
            echo"<td>".$filas["costo_unitario"]."</td>";
            $cost=$filas["costo_unitario"];
            $t  = $cost * $cant;
            $costo=$costo+$t;
              echo"<td>".$t."</td><tr>";
          }echo"</table>";
            $iva=$costo *.16;
            $total =$costo+$iva;
    echo "<table>
              <tr><td>Costo</td><td>IVA</td><td>Total</td><tr>";
              echo"<trtr class=bg1><td>".$costo."</td>";
              echo"<td>".$iva."</td>";
              echo"<td>".$total."</td></tr>";
              echo"</table>";
      }else {

    echo "No hay resultados "; }

  ?>

  <br><br>
  <div>
    <button  class= "button" onclick="location.href='index.php'">Back</button>
  </div>
  <head>
  </html>
