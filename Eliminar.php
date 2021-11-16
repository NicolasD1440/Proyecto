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
    <div class="Eliminar col-8"> <!--contenedor de la decicion-->
      <img src="img/LOGO.png" class="img-fluid" alt="Logo del jardin">
      <p>Escriba el ID a Eliminar</p>
      <form class="Form_Eliminar col-11 text-center" action="Eliminar.php" method="post">
        <input type="text" name="ID_Con" placeholder="ID a eliminar" class="Datos col-10" required><!--e pide el Id del usuario a eliminar--> 
        <div class="Botones">
        <input type="submit" name="Eliminar" value="Eliminar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Tabla_citas.php'">Volver</button>
       </div>
      </form>

        <?php // Comienzo de la logica
        error_reporting(0);
          require_once("Conexion.php"); //Utilizamos el archivo de la conexion
          $ID = $_POST['ID_Con'];
          $sql = "DELETE usuarios, alumno FROM usuarios INNER JOIN alumno ON usuarios.NombreAl = alumno.NombreAl WHERE usuarios.Id_usuario LIKE '$ID' "; //Se seleccionan las tablas y los campos con los datos que se van a eliminar
          $resultado = mysqli_query($conexion, $sql);
					$eliminar = mysqli_fetch_array($resultado);
					echo "Eliminado correctamente";

          ?>

    </div>
<footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
</body>
</html>
