<?php

$host="localhost"; //declaracion de variables
$user="root";
$pw="";
$db="jardin";

$conexion = mysqli_connect($host,$user,$pw) //conexion con el server
or die("problema al conectar con el servidor".mysqli_error($conexion));

mysqli_select_db($conexion,$db) //conxeion con la base de datos
or die("problema al conectar con la base de datos".mysqli_error($conexion));

?>
