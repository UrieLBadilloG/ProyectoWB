<?php
    include("conexion.php");
    $IDS;
    $consulta1 = "SELECT * FROM Aeropuertos";
    $ejecutar1 = sqlsrv_query ($con, $consulta1);
    while($fila=sqlsrv_fetch_array($ejecutar1)){
        if($fila['ID_estado']==$_GET['c']){
            $IDS=$fila['ID_aeropuerto'];
        }
    }

    $consulta = "SELECT * FROM Lugar_turistico";
    $ejecutar = sqlsrv_query ($con, $consulta);
    echo'<select name="select" id="select" class="form-select" onclick="muestraselect(this.value)">';
    while($fila=sqlsrv_fetch_array($ejecutar)){
        if($fila['ID_aeropuerto']==$IDS){
            echo "<option value='".$fila['ID_lugart']."'>".$fila['Nombre']."</option>";
        }
    }

echo'</select>';


?>