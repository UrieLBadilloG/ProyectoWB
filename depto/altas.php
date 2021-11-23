<?php
include("../conexion.php");
$Nom=$_POST["Nombre"];
$query="INSERT INTO Departamento(Nombre) values('$Nom')";
$res=sqlsrv_prepare($con , $query);
if (sqlsrv_execute($res)) {
   //echo"Datos insertados correctamente";
}else {
       echo "Error al insertar los datos";
}
?> 