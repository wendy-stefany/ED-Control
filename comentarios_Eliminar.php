
<?php

$numP   = $_POST['num'];
include 'conexion.php';
$conexion = conectarBD();
$query ="select *from comentario where num_proyecto=$numP";//esta
$resultado=pg_query($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
$nr=pg_num_rows($resultado);
if($nr>0){
  echo "<table>
        <tr><td>#Colaborador</td><td>#Comentario</td><td>Fecha</td><td>Contenido</td><tr>";
        while ($filas=pg_fetch_array($resultado)) {
          echo"<trtr class=bg1><td>".$filas["num_colaborador"]."</td>";
          echo"<td>".$filas["num_comentario"]."</td>";
          echo"<td>".$filas["fecha"]."</td>";
          echo"<td>".$filas["contenido"]."</td></tr>";
        }echo"</table>";
}else {

  echo "No hay resultados"; }
  ?>
  <html>
      <head>
          <meta charset='utf-8' >
          <link rel="stylesheet" type="text/css" href="css.css" >
   <title>Eleminar Comentario</title>

      </head>
  <body>
  </br>
    <h2>Eliminar Comentario</h2>
  <div>
    <form action="comentarios_Eliminar2.php" method="post">
        	<input name="num_comentario" type="num" placeholder="#Comentario" required />
  				<button id="alta" name="alta" type="submit" class="btn">Borrar</button>
  </form>
    <div>

    </body>
  </html>
