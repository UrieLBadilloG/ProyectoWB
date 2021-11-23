<?php

function conexionSQL(){
    $srv="DESKTOP-AV4HT3K";
    $base="AM";
    $user="sa";
    $pass="2020640576";
    $informacion=array("Database"=>$base, "UID"=>$user, "PWD"=>$pass);
    $con=sqlsrv_connect($srv, $informacion);
    if( $con === false ) {
        die( print_r( sqlsrv_errors (), true));
    }
        if($con){
            echo "fallo en la conexión";
        }
        else{
            echo "Conexion exitosa";;
        }

}
//conexionSQL();
?>