<?php
include("conexion.php");
$consulta = "SELECT * FROM usuario";
$ejecutar = sqlsrv_query ($conn, $consulta);

while($fila=sqlsrv_fetch_array($ejecutar)){
    
        $id=$fila['ID_depto'];
        echo "<tr>";
        echo "<td>".$fila['ID_depto']."</td>";
     //       echo "<td>".date_format ($fila['Faniversario'], 'd/m/Y')."</td>";
    //    echo "<td><a href='editar.php?editar=$id'>Editar</a></td>";
       // echo "<td><a href='sseliminar.php?borrar=$id'>Eliminar</a></td>";
       "</tr>"; 
}

echo "</table>";
echo "<br><br>";
?>
