<?php require_once ('conexion.php'); $conexion=conectarBD();?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css.css" >
  	<h2>Colaboradores</h2>

<div>
<?php $query ="select *from colaboradores";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);

if($nr>0){

  echo "<table>
        <tr><td>ID Colaborador</td><td>Nombre</td><td>Apellido</td><td>Habilidad  </td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<tr class=bg1><td>".$filas["num_colaborador"]."</td>";
          echo"<td>".$filas["nombre"]."</td>";
          echo"<td>".$filas["apellido"]."</td>";
          echo"<td>".$filas["habilidad"]."</td></tr>";
        }echo"</table>";
}else {

  echo "No hay resultados"; }

  ?></div>
  <br><br>
  <div>
    <button  class= "button" onclick="location.href='index.php'">Back</button>
    <button  class= "button" onclick="location.href='alta_colaborador.html'">Dar de Alta</button>
    <button  class= "button" onclick="location.href='actualizar_colaborador.html'">Actualizar</button>
  </div>
  <head>
  </html>
