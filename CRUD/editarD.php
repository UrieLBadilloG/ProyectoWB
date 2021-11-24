<?php
include("../conexion.php");
$Nom=$_POST["Nombre"];
$dp=$_POST["de"];
$ctt=$_POST["ct"];
$nm=$_POST["nbb"];
if($dp!="NULL"){
  // echo "Holaalalalala";
  $query="UPDATE USUARIO set ID_depto = $dp where ID_usuario=$Nom ";
  $res1=sqlsrv_prepare($con , $query);
  if (sqlsrv_execute($res1)) {
  // echo"Datos insertados correctamente";
}
}
if($ctt!=NULL){
  $query1="UPDATE USUARIO set contraseña = '$ctt' where ID_usuario=$Nom ";
  $res2=sqlsrv_prepare($con , $query1);
  if (sqlsrv_execute($res2)) {
    // echo"Datos insertados correctamente";
    }
}
if($nm!=NULL){
  $query2="UPDATE USUARIO set Nombre= '$nm' where ID_usuario=$Nom ";
  $res3=sqlsrv_prepare($con , $query2);
  if (sqlsrv_execute($res3)) {
     // echo"Datos insertados correctamente";
    }
}
else{

}
//$res=sqlsrv_prepare($con , $query);

?> 