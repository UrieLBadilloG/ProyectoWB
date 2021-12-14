<?php
    echo ('<h5>'.'Costo vuelo ida: '.'</h5>');
    include("conexion.php");
    if(isset($_GET['d'])){
        $n2;
        $consulta = "SELECT * FROM Vuelo WHERE ID_vuelo = " . $_GET['d'];
        $ejecutar = sqlsrv_query ($con, $consulta);
        while($fila=sqlsrv_fetch_array($ejecutar)){
            {
                $time=$fila['horaV'];
                echo "<h5 value=".$fila['ID_vuelo'].">".$fila['costo']."</h5>";
                $n2=$fila['costo'];
            }
        }
    echo'</select>';
        if(isset($_GET['n'])){
        $n1=$_GET['n'];
        $num = $n1*$n2;
        echo "<h5>".'Costo total de vuelo de ida'."</h5>";
        echo "<h5>".$num."</h5>";
        echo "<input type='hidden'  id='IDCosto' value=". $num .">";
        }
    }
?>
