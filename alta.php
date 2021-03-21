<!DOCTYPE html>
<html>
  <head>
    <title>Alta Colaborador</title>
  </head>
  <body>

    <from method="POST" action="http://localhost/ejemplo/alta_colaboradores.php">
      <table>
        <tr>
        <td>Nombre</td><td><input type="text" id="nombre"/></td>
        </tr>
        <tr>
        <td>Apellido</td><td><input type="text" name="apellido"/></td>
        </tr>
        <tr>
        <td>Habilidades</td><td><input type="text" name="habilidad"/></td>
        </tr>

      </table>

      <button  class= "button" onclick="location.href='alta_colaboradores.php'">Proyectos en Curso</button>
    </from>

  </body>
</html>
<?php
include 'conexion.php';
$conexion = conectarBD();
/*if( isset($_POST['nombre']) ) {
   $nombre =$_POST["nombre"];
 }
 if( isset($_POST['apellido']) ) {
   $apellido = $_POST["apellido"];
 }
 if( isset($_POST['habilidad']) ) {
   $habililidad = $_POST["habilidades"];
 }*/
 $nombre =$_POST["nombre"];
 $apellido = $_POST["apellido"];
 $habilidad = $_POST["habilidad"];


   $query ="insert into colaboradores (nombre, apellido, habilidad) values ('$nombre','$apellido','$habilidad')";
   pg_query($conexion,$query);
   //header("location:index.php");


  // $resultado=pg_insert($conexion,$query) or die ("Error en la consulta");//y esta linea es practicamente el query
   //$nr=pg_num_rows($resultado);

?>
