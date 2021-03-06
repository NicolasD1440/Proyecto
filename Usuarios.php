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
    <div class="Usuario col-5"> <!--contenedor de la decicion-->
      <img src="img/LOGO.png" class="img-fluid" alt="Logo del jardin">
      <p>Ingrese sus datos para asignar la cita en el jardin</p>
      <form class="Form_Datos col-11 text-center" action="Usuarios.php" method="post">
        <h2>Datos del acudiente</h2>
        <input type="text" name="Nombre" placeholder="Nombres" class="Datos col-10" required> <!--peticion de datos de registro-->
        <input type="text" name="Apellidos" placeholder="Apellidos" class="Datos col-10" required>
        <input type="text" name="Direccion" placeholder="Direccion" class="Datos col-10" required>
        <input type="tel" name="Telefono" placeholder="Telefono" class="Datos col-10" required>
        <input type="email" name="Correo" placeholder="Correo" class="Datos col-10" required>
        <select class="Datos col-10" name="Curso">
          <option>..........</option>
          <option>Caminadores</option>
          <option>Parvulos</option>
          <option>Pre jardin</option>
          <option>Jardin</option>
          <option>Avanzado</option>
        </select>
        <h2>Datos del alumno</h2>
        <input type="text" name="TDI" placeholder="Numero de T.I" class="Datos col-10" required>
        <input type="text" name="NombreAl" placeholder="Nombre" class="Datos col-10" required>
        <input type="text" name="ApellidoAl" placeholder="Apellido" class="Datos col-10" required>
        <input type="text" name="Edad" placeholder="Edad" class="Datos col-10" required>

        <div class="Botones"> <!--Contenedor de botones finales-->
        <input type="submit" name="Asignar" value="Asignar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Consulta.php'">Consultar</button>
        <button type="button" class="Asignacion col-5" onclick="location.href='Decision.html'">Volver</button>
       </div>
      </form>
    </div>
  <footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php // Comienzo de la logica
error_reporting(0);

clearstatcache();

//ob_clean();


  require_once('Conexion.php');//llamado del archivo de conexion

  function fecha_aleatoria($formato = "Y-m-d", $limiteInferior = "2021-11-01", $limiteSuperior = "2021-11-30"){ //funcion de fecha aleatoria
    $milisegundosLimiteInferior = strtotime($limiteInferior);
    $milisegundosLimiteSuperior = strtotime($limiteSuperior);
    $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
    return date($formato, $milisegundosAleatorios);
  }
  //9-5
  function horas(){
    $arreglo = ["9:00","9:30","10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "1:00"
  ,"1:30","2:00","2:30", "3:30","4:00","4:30","5:00"];

  $lower = 0;
  $upper = 15;
  $ramdon = mt_rand($lower, $upper);

  return $arreglo[$ramdon];
  }
   $Hora = horas();
   $Fecha = fecha_aleatoria();
   $ID = mt_rand(1000, 9999); //creacion de un ID de 4 digitos aleatorio
   $IDFech = mt_rand(100, 999);//creacion de ID de 3 digitos aleatorios

   if(strlen($_POST['Nombre']) >= 1 && strlen($_POST['Apellidos']) >= 1 && strlen($_POST['Direccion']) >= 1 &&
   strlen($_POST['Telefono']) >= 1 && strlen($_POST['Correo']) >= 1 && strlen($_POST['Curso']) >= 1 && strlen($_POST['NombreAl']) >= 1
   && strlen($_POST['ApellidoAl']) >= 1 && strlen($_POST['Edad']) >= 1 ){ //comprobacion de campos vacios

    mysqli_query($conexion,"INSERT INTO alumno (TI, NombreAl, ApellidoAl, Edad)
    VALUES ('$_POST[TDI]','$_POST[NombreAl]','$_POST[ApellidoAl]','$_POST[Edad]')")//Insercion de datos en la tabla alumno

    or die("
    <script>
      Swal.fire({
        title: 'Problema al registrar los datos alumno',
        icon: 'error'

      }).then((result) => {
        if (result.isConfirmed) {
          location.href= 'Decision.html';
        }
      });
    </script>");//Mensaje de error en aluno

    mysqli_query($conexion,"INSERT INTO citas (IDFec, Fecha, Hora)
    VALUES ('$IDFech','$Fecha','$Hora')")//Insercion de datos en la tabla citas

    or die("
    <script>
      Swal.fire({
        title: 'Problema al registrar los datos cita',
        icon: 'error'

      }).then((result) => {
        if (result.isConfirmed) {
          location.href= 'Decision.html';
        }
      });
    </script>");//Mensaje de error en citas

    mysqli_query($conexion,"INSERT INTO usuarios (Id_usuario, Nombre, Apellido, Direccion, Telefono, Correo, Curso,IDFec,TI)
    VALUES ('$ID','$_POST[Nombre]','$_POST[Apellidos]','$_POST[Direccion]',' $_POST[Telefono] ',
    '$_POST[Correo]','$_POST[Curso]','$IDFech','$_POST[TDI]')")//Insercion de datos en la tabla usuarios

    or die("
    <script>
      Swal.fire({
        title: 'Problema al registrar los datos del acudiente',
        icon: 'error'

      }).then((result) => {
        if (result.isConfirmed) {
          location.href= 'Decision.html';
        }
      });
    </script>");//Mensaje de error en usuarios
?>

  <script type="text/javascript"> //ventana emergente de confirmacion
    Swal.fire({
      title: 'Datos registrados',
      text: 'Su ID de consulta es: ' + <?php echo utf8_decode($ID)?>,
      icon: 'success'

    }).then((result) => {
      if (result.isConfirmed) {
        location.href="Decision.html";
      }
    });
  </script><?php // Ventana emergente de confirmacion ?>
  <?php
}
 ?>
