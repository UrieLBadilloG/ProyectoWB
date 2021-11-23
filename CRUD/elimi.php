<?php
include("../conexion.php");
$eli=$_POST["mal"];



$query="DELETE FROM USUARIO where ID_usuario= $eli";
$res=sqlsrv_prepare($con , $query);
if (sqlsrv_execute($res)) {
 //  echo"Datos insertados correctamente";
}else {
       echo "Error al insertar los datos";
}
?> 