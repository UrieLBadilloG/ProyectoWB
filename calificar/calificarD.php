<?php
include("../conexion.php");
$NomG=$_POST["nomm"];
$NomS=111111;
$cali=$_POST["cal"]; 
//$bg=$_POST["plus"];
$bg=$_POST["plus"];

$procedure_params = array($cali,$NomS,$NomG, $bg);
$query = "EXECUTE SET_RATING ?,?,?,?";
$stmt = sqlsrv_prepare($con, $query, $procedure_params);


if (sqlsrv_execute($stmt)) {
  // echo"Datos insertados correctamente";
  //header('location'.$user-perfil.php);
}else {
       echo "Error al insertar los datos";
}
?> 