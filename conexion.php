<?php
$srv="ingweb.database.windows.net";
$base="UPIITRAVEL2";
$user="Uri";
$pass="123456.b";
$informacion=array("Database"=>$base, "UID"=>$user, "PWD"=>$pass);
$con=sqlsrv_connect($srv, $informacion);
if( $con === false ) {
    die( print_r( sqlsrv_errors (), true));
}
    if($con){
       // echo"Conexion exitosa";
    }else{
        echo "fallo en la conexión";
    }
?>