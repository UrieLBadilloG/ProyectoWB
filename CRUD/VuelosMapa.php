<?php
    // include("../conexion.php");
    $IDState=0;
        $cadenaCnx="sqlsrv:Server=ingweb.database.windows.net;Database=UPIITRAVEL2";
        $user="Uri";
        $pass="123456.b";
        $cnx= new PDO($cadenaCnx, $user, $pass);
    $consulta = null;
    if ( isset($_POST['isAlojamiento'])){
        // Es de Alojamiento
        $consulta = $cnx->prepare("SELECT * FROM Estados WHERE ID_estado = :paramEst");
    }else {
        $consulta = $cnx->prepare("SELECT E.* FROM Estados AS E INNER JOIN Aeropuertos AS A ON A.ID_estado = E.ID_estado WHERE A.ID_aeropuerto = :paramEst");
    }
    $consulta->bindValue(":paramEst", $_POST['IDestado']);
    $consulta->execute();
    $fila = $consulta->fetch();
    
    $mapa = '<h5> No fue posible recuperar Mapa. :\') </h5>';
    if($fila > 0){
        $mapa = '<iframe src="' . $fila['urlMapa'] . '" 
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
    }
    ECHO $mapa;
?>