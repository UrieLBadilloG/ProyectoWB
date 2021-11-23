<?php
include("../conexion.php");
$consulta = "SELECT * FROM Departamento";
$ejecutar = sqlsrv_query ($con, $consulta);

while($fila=sqlsrv_fetch_array($ejecutar)){
        $id=$fila['ID_depto'];
        echo "<option>".$fila['ID_depto']."</option>";
} 

?>
