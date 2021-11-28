
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
    <div class="Administrador col-10 col-sm-5"> <!--contenedor de la decicion-->
      <img src="img/LOGO.png" class="img-fluid" alt="Logo del jardin">
      <form class="Form_Datos col-11 text-center"  method="post">
        <input type="text" id="Admin" name="usu" placeholder="Administrador" class="Datos col-10" required>
        <input type="password" id="Clave" name="cont" placeholder="Contraseña" class="Datos col-10" required>
        <input type="password" id="ConfClave" name="Confcont" placeholder="Repita su contraseña" class="Datos col-10" required>
        <label> <input type="checkbox" id="check" name="mostrar" onclick="Mostrar()"> Mostrar contraseña</label>
        <input type="submit" name="Ingresar" value="Ingresar" class="Asignacion col-5">
        <button type="button" class="Asignacion col-5" onclick="location.href='Decision.html'">Volver</button>
      </form>
    </div>
  <footer>© Creado por Cristian Giovani Cruz Herrera Deivy Nicolas Castiblanco Infante & Johan Daniel Chavez Celeita</footer>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<script type="text/javascript">
  function Mostrar() {
    var pass = document.getElementById("Clave");
    var Confpass = document.getElementById("ConfClave");
    if(document.getElementById("check").checked){
        pass.type = 'text';
        Confpass.type = 'text';
    }
    else{
      pass.type = 'password';
      Confpass.type = 'password';
    }
  }
</script>
<?php
error_reporting(0);
function hashes($str){
  $arr1 = str_split($str);
  for ($i=0; $i <count($arr1); $i++) {
   $arr1[$i] = ($arr1[$i] * $arr1[$i]) * $i;
   $suma = $suma + $arr1[$i];
  }
  return $suma;
}
session_start();

if (isset($_POST['Ingresar'])) {
include('Conexion.php');
$usuario = $_POST['usu'];
$aux = $_POST['cont'];
$aux2 = $_POST['Confcont'];
$contraseña = hashes($aux);
$confCont = hashes($aux2);



$_SESSION['Admin'] = $usuario;

if ($contraseña == $confCont) {

    $conexion=mysqli_connect("localhost","root","","jardin");
    $consulta = "SELECT * FROM admin where Admin ='$usuario' and Contraseña='$contraseña'";
    $resultado = mysqli_query($conexion,$consulta);
    $filas = mysqli_num_rows($resultado);

    if($filas){
    ?>
      <script type="text/javascript">
          Swal.fire({
            title: 'Bienvenido',
            text:  '<?php echo utf8_decode($usuario) ?>',
            icon: 'success',

          }).then((result) => {

            if (result.isConfirmed) {
              location.href="Tabla_citas.php";
              mysqli_free_result("Admin.php");
            }
          });
        </script>;
    <?php
    }else{
        ?>
        <script type="text/javascript">
            Swal.fire({
              title: 'Error al ingresar',
              text: 'verifique sus datos',
              icon: 'error',

            }).then((result) => {

              if (!result.isConfirmed) {
                location.href="Admin.php";
                mysqli_free_result("Admin.php");
              }
            });
          </script>;
      <?php
    }
  }else{
    ?>
    <script type="text/javascript">
        Swal.fire({
          title: 'Error al ingresar',
          text: 'Las contraseñas no coinciden',
          icon: 'error',

        }).then((result) => {

          if (!result.isConfirmed) {
            location.href="Admin.php";
            mysqli_free_result("Admin.php");
          }
        });
      </script>;
  <?php
    }

}
mysqli_free_result($resultado);
mysqli_close($conexion);
