<?php
$srv="DESKTOP-H3MGCA8";
$base="UPIITRAVEL";
$user="Uri";
$pass="123456";
$informacion=array("Database"=>$base, "UID"=>$user, "PWD"=>$pass);
$con=sqlsrv_connect($srv, $informacion);
if( $con === false ) {
    die( print_r( sqlsrv_errors (), true));
}
    if($con){
      //  echo"Conexion exitosa";
    }else{
        echo "fallo en la conexión";
    }
?>