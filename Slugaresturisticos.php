<?php
    include("conexion.php");
    $consulta = "SELECT * FROM Aeropuertos";
    $ejecutar = sqlsrv_query ($con, $consulta);
    echo'<select name="select-v-ori" id="select-v-ori" class="form-select">';
    while($fila=sqlsrv_fetch_array($ejecutar)){
        if($fila['ID_estado']==$_GET['c']){
            echo "<option value='".$fila['ID_aeropuerto']."'>".$fila['Nombre']."</option>";
        }
    }

echo'</select>';


?>
