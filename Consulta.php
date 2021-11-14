<html lang="en">
<head>
  <meta charset="UTF-8"> <!--Para aceptar caracteres especiales-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Para la visualizacion del contenido autoajustable-->
  <link rel="stylesheet" href="css/Estilos.css"> <!--Estilos creados a mano-->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!--Estilos del bootstrap-->
  <script type="text/javascript" src="js/bootstrap.min.js"></script> <!--Scripts de bootstrap-->
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> <!--llamado del jquery-->
  <script src="https://kit.fontawesome.com/f959a384d4.js" crossorigin="anonymous"></script> <!--llamado de pagina de iconos-->
  <title>La casita de los niños</title>
</head>
<body>
    <div class="Consulta col-8"> <!--contenedor de la decicion-->
      <img src="img/LOGO.png" class="img-fluid" alt="Logo del jardin">
      <p>Ingrese su nombre para consultar</p>
      <form class="Form_Consulta col-11 text-center" action="Consulta.php" method="post">
        <input type="text" name="NombreCon" placeholder="Nombre" class="Datos col-10" required>
        <div class="Botones">
        <input type="submit" name="Consultar" value="Consultar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Decision.html'">Volver</button>
       </div>
      </form>

      <table class="Tabla_Con col-11 text-center">
        <tr>
          <td class="td">Fecha</td>
          <td class="td">Hora</td>
          <td class="td">Docente</td>
          <td class="td">Nombres</td>
          <td class="td">Apellidos</td>
          <td class="td">Telefono</td>
          <td class="td">Correo</td>
          <td class="td">Curso de interes</td>
          <td class="td">Alumno</td>

        </tr>
        <?php
        error_reporting(0);
          require_once("Conexion.php");
          $Nombre = $_POST['NombreCon'];
          $sql = "SELECT * FROM usuarios INNER JOIN alumno ON usuarios.NombreAl = alumno.NombreAl  INNER JOIN profesores ON usuarios.Curso = profesores.Curso WHERE usuarios.Nombre LIKE '$Nombre' ";
          $resultado = mysqli_query($conexion, $sql);
          $mostrar = mysqli_fetch_array($resultado);
          ?>
        <tr>
          <td class="td"><?php echo $mostrar['Fecha'] ?></td>
          <td class="td"><?php echo $mostrar[''] ?></td>
          <td class="td"><?php echo $mostrar['NombreP'] ?></td>
          <td class="td"><?php echo $mostrar['Nombre'] ?></td>
          <td class="td"><?php echo $mostrar['Apellido'] ?></td>
          <td class="td"><?php echo $mostrar['Telefono'] ?></td>
          <td class="td"><?php echo $mostrar['Correo'] ?></td>
          <td class="td"><?php echo $mostrar['Curso'] ?></td>
          <td class="td"><?php echo $mostrar['NombreAl'] ?></td>
        </tr>

      </table>
    </div>
  <footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
</body>
</html>
