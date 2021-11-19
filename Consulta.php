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
      <p>Ingrese su ID de para consultar</p>
      <form class="Form_Consulta col-11 text-center" action="Consulta.php" method="post">
        <input type="text" name="ID_Con" placeholder="ID de consulta" class="Datos col-10" required><!--Peticion del ID a consultar-->
        <div class="Botones">
        <input type="submit" name="Consultar" value="Consultar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Decision.html'">Volver</button>
       </div>
      </form>

      <table class="Tabla_Con col-11 text-center"><!--Creacion de la tabla a mostrar-->
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
        <?php // Cominzo de la logica
        error_reporting(0);
          require_once("Conexion.php"); //Utilizamos el archivo de la conexion
          $ID = $_POST['ID_Con'];
          $sql = "SELECT * FROM usuarios INNER JOIN alumno ON usuarios.TI = alumno.TI
                                         INNER JOIN profesores ON usuarios.Curso = profesores.Curso
                                         INNER JOIN citas ON usuarios.fecha = citas.fecha
                                         WHERE usuarios.Id_usuario LIKE '$ID' "; //Consulta a realizar con las tablas enlazadas
          $resultado = mysqli_query($conexion, $sql);
          $mostrar = mysqli_fetch_array($resultado);
          ?>
        <tr>  <?php // visualisacion de datos de consulta ?>
          <td class="td"><?php echo $mostrar['Fecha'] ?></td>
          <td class="td"><?php echo $mostrar['Hora'] ?></td>
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
