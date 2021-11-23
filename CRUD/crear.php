<?php
include("../conexion.php");
$iusu=$_POST["Nombre"];
$sn=$_POST["Nombree"];
$pw=$_POST["Contraseña"];
$dp=$_POST["de"];
$ed=$_POST["eda"];
$di=$_POST["dir"];
$ra=$_POST["ran"];
$corr=$_POST["Corre"];
print_r:  $_POST;
$query="INSERT INTO Usuario(ID_usuario, ID_depto, Nombre, Edad, Direccion, Promedio_R, Rango, contraseña, Correo, Estado) values('$iusu','$dp','$sn', '$ed', '$di', NULL, '$ra', '$pw','$corr', 1)";
$res=sqlsrv_prepare($con , $query);
if (sqlsrv_execute($res)) {
//   echo"Datos insertados correctamente";
//header("admin-perfil-crear.php");
}else {
       echo "Error al insertar los datos";
}
?>    