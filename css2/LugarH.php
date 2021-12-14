<?php
    include("conexion.php");
    $consulta = "SELECT * FROM Hotel";
    $ejecutar = sqlsrv_query ($con, $consulta);
    echo'<select name="sel" id="select" class="col-4 form-control">';
    while($fila=sqlsrv_fetch_array($ejecutar)){
        if($fila['ID_lugart']==$_GET['c']){
            echo "<option value='".$fila['ID_hotel']."'>".$fila['Nombre']."</option>";
        }
    }

echo'</select>';
?>