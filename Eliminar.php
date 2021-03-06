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

        <div class="Botones1">

        <div class="Botones">

        <input type="submit" name="Eliminar" value="Eliminar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Tabla_citas.php'">Volver</button>
       </div>
      </form>

    </div>
</div>
<footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

  <?php // Comienzo de la logica
    error_reporting(0);
      require_once("Conexion.php"); //Utilizamos el archivo de la conexion
      $ID = $_POST['ID_Con'];
      $sql2 = "SELECT Id_usuario FROM usuarios WHERE usuarios.Id_usuario LIKE '$ID'";
      $sql = "DELETE usuarios, alumno, citas FROM usuarios INNER JOIN alumno ON usuarios.TI = alumno.TI
                                             INNER JOIN citas ON usuarios.IDFec = citas.IDFec
                                             WHERE usuarios.Id_usuario LIKE '$ID' "; //Se seleccionan las tablas y los campos con los datos que se van a eliminar

    $resultado = mysqli_query($conexion, $sql2);
    if(!empty($_POST['ID_Con'])){
      if (mysqli_num_rows($resultado) > 0) {
      mysqli_query($conexion, $sql)
      or die("
      <script>
        Swal.fire({
          title: 'Problema al eliminar los datos',
          icon: 'error',
        });        </script>");//Mensaje de error

      ?>
        <script type="text/javascript"> //ventana emergente de confirmacion
            Swal.fire({
            title: 'Registro eliminado correctamente',
            icon: 'success'

          }).then((result) => {
            if (result.isConfirmed) {
              location.href="Tabla_citas.php";
            }
          });
        </script>
    <?php }else {
      ?>
        <script type="text/javascript"> //ventana emergente de confirmacion
            Swal.fire({
            title: 'ID invalido',
            icon: 'error'

          }).then((result) => {
            if (result.isConfirmed) {
              location.href="Eliminar.php";
            }
          });
        </script>
    <?php }}?>
