<?php
include("../conexion.php");
$origen=$_POST["Ori"];
$destino=$_POST["select"];
$Pass=$_POST["Contraseña"];
$Ed=$_POST["eda"];
$Dir=$_POST["dir"];

$query="INSERT INTO Usuario(Nombre, Correo, Edad, direccion, Contraseña) values('$Nom', '$Cor', '$Ed', '$Dir', (SELECT dbo.fun_encriptar('$Pass')))";
$res=sqlsrv_prepare($con , $query);
if (sqlsrv_execute($res)) {
   echo"Datos insertados correctamente";
//header("admin-perfil-crear.php");
}else {
      echo "Error al insertar los datos";
}
?>    