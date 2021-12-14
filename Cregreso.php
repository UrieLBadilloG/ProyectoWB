<?php
    echo ('<h5>'.'Costo vuelo regreso: '.'</h5>');
    include("conexion.php");
    $n2;
    $consulta = "SELECT * FROM Vuelo";
    $ejecutar = sqlsrv_query ($con, $consulta);
    while($fila=sqlsrv_fetch_array($ejecutar)){
        if($fila['ID_vuelo']==$_GET['d']){
            $time=$fila['horaV'];
        echo "<h5 value=".$fila['ID_vuelo'].">".$fila['costo']."</h5>";
        $n2=$fila['costo'];
        }
    }
echo'</select>';
$n1=$_GET['n'];
$num = $n1*$n2;
echo "<h5>".'Costo total de vuelo de regreso'."</h5>";
echo "<h5>".$num."</h5>";
echo "<input type='hidden'  id='IDCostoReg' value=". $num .">"
?>