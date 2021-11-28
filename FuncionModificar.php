<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>

<?php
require_once("Conexion.php");
error_reporting(0);
$ID = $_POST['ID'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellidos'];
$Direccion = $_POST['Direccion'];
$Telefono = $_POST['Telefono'];
$Correo = $_POST['Correo'];
$Curso = $_POST['Curso'];
$TIF = $_POST['TDI'];
$NombreAl = $_POST['NombreAl'];
$ApellidoAl = $_POST['ApellidoAl'];
$Edad = $_POST['Edad'];

mysqli_query($conexion, "UPDATE usuarios SET Nombre = '$Nombre',
                     Apellido = '$Apellido', Direccion = '$Direccion', Telefono = '$Telefono',
                     Correo = '$Correo', Curso = '$Curso', TI = '$TIF' WHERE usuarios.Id_usuario like '$ID'");

mysqli_query($conexion, "UPDATE alumno SET NombreAl = '$NombreAl',
                    ApellidoAl = '$ApellidoAl', Edad = '$Edad' WHERE alumno.TI like '$TIF'");

?>

<script type="text/javascript"> //ventana emergente de confirmacion
  Swal.fire({
    title: 'Datos Modificados correctamente',
    text: 'Su ID de consulta es: ' + <?php echo utf8_decode($ID)?>,
    icon: 'success'

  }).then((result) => {
    if (result.isConfirmed) {
      location.href="Consulta.php";
    }
  });
</script>

</body>
</html>
