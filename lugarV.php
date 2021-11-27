<?php
    include("conexion.php");
    $consulta = "SELECT * FROM Lugar_vuelos";
    $ejecutar = sqlsrv_query ($con, $consulta);
    while($fila=sqlsrv_fetch_array($ejecutar)){
       // $Nm=$fila['Nombre'];
        echo "<option value=".$fila['ID_lugaro'].">".$fila['Nombre']."</option>";
                } 
?>