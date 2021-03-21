<?php require_once ('conexion.php'); $conexion=conectarBD();?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css.css" >
  	<h2>Proyectos Terminados</h2>

<?php $query ="select num_proyecto, fecha_lanzamiento, num_captador, num_supervisor, autorizado,
               fecha_inicio, fecha_finalizacion,fecha_rechazo from proyecto where estado='terminado';";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
if($nr>0){
  echo "<table>
        <tr><td>#PROYECTO</td><td>FECHA LEVANTAMIENTO</td><td>#CAPTADOR</td><td>#SUPERVISOR</td>
            <td>AUTORIZADO</td><td>FECHA INICIO</td><td>FECHA FINALIZACION</td><td>FECHA Rechazo</td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<trtr class=bg1><td>".$filas["num_proyecto"]."</td>";
          echo"<td>".$filas["fecha_lanzamiento"]."</td>";
          echo"<td>".$filas["num_captador"]."</td>";
          echo"<td>".$filas["num_supervisor"]."</td>";
          echo"<td>".$filas["autorizado"]."</td>";
          echo"<td>".$filas["fecha_inicio"]."</td>";
          echo"<td>".$filas["fecha_finalizacion"]."</td>";
          echo"<td>".$filas["fecha_rechazo"]."</td></tr>";
        }echo"</table>";
}else {

  echo "No hay resultados"; }

  ?>
  <br><br>
  <div>
    <button  class= "button" onclick="location.href='index.php'">Back</button>
  </div>
  <head>
  </html>
