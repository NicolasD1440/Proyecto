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
<?php
error_reporting(0);
  require_once("Conexion.php"); //Utilizamos el archivo de la conexion
  $ID = $_GET['id'];
  $sql = "SELECT * FROM usuarios INNER JOIN alumno ON usuarios.TI = alumno.TI WHERE usuarios.Id_usuario LIKE '$ID' ";
  $resultado = mysqli_query($conexion, $sql);
  $mostrar = mysqli_fetch_array($resultado);
  $id = $mostrar['Id_usuario'];
 ?>
<body>
    <div class="Usuario col-5"> <!--contenedor de la decicion-->
      <img src="img/LOGO.png" class="img-fluid" alt="Logo del jardin">
      <p>Corrija los datos ingresados</p>
      <form class="Form_Datos col-11 text-center" action="FuncionModificar.php" method="post">
        <h2>Datos del acudiente</h2>
        <input type="text" name="ID" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Id_usuario'])?>" readonly="readonly">
        <input type="text" name="Nombre" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Nombre'])?>" required> <!--peticion de datos de registro-->
        <input type="text" name="Apellidos" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Apellido'])?>" required>
        <input type="text" name="Direccion" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Direccion'])?>" required>
        <input type="tel" name="Telefono" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Telefono'])?>" required>
        <input type="email" name="Correo" class="Datos col-10" value="<?php echo utf8_decode($mostrar['Correo'])?>" required>
        <select class="Datos col-10" name="Curso">
          <option class="Anterior"><?php echo utf8_decode($mostrar['Curso'])?></option>
          <option>Caminadores</option>
          <option>Parvulos</option>
          <option>Pre jardin</option>
          <option>Jardin</option>
          <option>Avanzado</option>
        </select>
        <h2>Datos del alumno</h2>
        <input type="text" name="TDI"  class="Datos col-10" value="<?php echo utf8_decode($mostrar['TI'])?>" readonly="readonly">
        <input type="text" name="NombreAl"  class="Datos col-10" value="<?php echo utf8_decode($mostrar['NombreAl'])?>" required>
        <input type="text" name="ApellidoAl"  class="Datos col-10" value="<?php echo utf8_decode($mostrar['ApellidoAl'])?>" required>
        <input type="text" name="Edad"  class="Datos col-10" value="<?php echo utf8_decode($mostrar['Edad'])?>" required>

        <div class="Botones"> <!--Contenedor de botones finales-->
        <input type="submit" name="Modificar" value="Modificar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Consulta.php'">Volver</button>
       </div>
      </form>
    </div>
  <footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
