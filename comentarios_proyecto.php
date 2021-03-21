<?php require_once ('conexion.php'); $conexion=conectarBD();?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css.css" >
  	<h2>Comentarios</h2>

<?php
$Num_Proyecto = $_POST['num'];

$query ="select*from comentario where num_proyecto=$Num_Proyecto;";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
if($nr>0){
  echo "<table>
        <tr><td># Proyecto</td><td># Colaborador</td><td># Comentario</td><td>Fecha</td>
            <td>Contenido</td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<trtr class=bg1><td>".$filas["num_proyecto"]."</td>";
          echo"<td>".$filas["num_colaborador"]."</td>";
          echo"<td>".$filas["num_comentario"]."</td>";
          echo"<td>".$filas["fecha"]."</td>";
          echo"<td>".$filas["contenido"]."</td></tr>";
        }echo"</table>";
}else {

  echo "No hay resultados"; }

  ?>
  <br><br>
  <div>
    <button  class= "button" onclick="location.href='index.php'">Back</button>
    <button  class= "button" onclick="location.href='comentarios_Eliminar.html'">Eliminar Comentario</button>
  </div>
  <head>
  </html>
