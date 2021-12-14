<?php
include("../conexion.php");
$hotel=$_POST["sel"];
$entrada=$_POST["ent"];
$salida=$_POST["sal"];
$num;
$consulta = "SELECT * FROM Hotel";
$ejecutar = sqlsrv_query ($con, $consulta);
while($fila=sqlsrv_fetch_array($ejecutar)){
        if($hotel == $fila['ID_hotel']){
            $num= $fila['Habitaciones'];
        }
} 

if($num>0){
  $procedure_params = array($_COOKIE['IDusr'],$hotel,$entrada,$salida);
  $query = "EXECUTE HotelR ?,?,?,?";
  $stmt = sqlsrv_prepare($con, $query, $procedure_params);
  if (sqlsrv_execute($stmt)) {
      header("Location: ../alojamiento.php");
  }else {
      echo "Error al insertar los datos";
  }
}
else{
  echo "Ya no hay habitaciones disponibles";
}
?> 