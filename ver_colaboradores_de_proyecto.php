<?php require_once ('conexion.php'); $conexion=conectarBD();?>
<!DOCTYPE html>
<html>
  <head>
    <title>Colaboradores de proyecto</title>
    <link rel="stylesheet" type="text/css" href="css.css" >
  	<h2>Colaboradores de proyecto</h2>

<?php
$num    = $_POST['num'];
  $query ="SELECT colaborador_proyecto.num_proyecto, colaborador_proyecto.num_colaborador, colaboradores.nombre, colaboradores.apellido FROM colaborador_proyecto, colaboradores WHERE colaborador_proyecto.num_colaborador = colaboradores.num_colaborador and colaborador_proyecto.num_proyecto=$num;";//esta
  $resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
  $nr=pg_num_rows($resultado);
  if($nr>0){
    echo "<table>
          <tr><td># Colaborador</td><td>Nombre</td><td>Apellido</td><tr>";
          while ($filas=pg_fetch_array($resultado)) {
            echo"<trtr class=bg1><td>".$filas["num_colaborador"]."</td>";
            echo"<trtr class=bg1><td>".$filas["nombre"]."</td>";
            echo"<trtr class=bg1><td>".$filas["apellido"]."</td></tr>";
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
