<?php
include("conexion.php");
require_once'model.php';
//instancia
$model= new Model();
$model->usuario=$_POST['txtUsuario'];
$usuario = $_POST['txtUsuario'];;
$model->clave=$_POST["txtClave"];
$rango = 0;

$filaController=$model->Logear();
if($filaController>0){

   $sql = "SELECT Rango FROM USUARIO WHERE ID_usuario = $usuario";
   $stmt = sqlsrv_query( $con, $sql );
   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      $rango =  $row['Rango'];
   }
   echo"<h1>Bienvenido Usuario con rango $rango</h1>";
   switch($rango){
      case 1:
         header("Location: admin-perfil-crear.php?");
         break;
     case 2:
         header("Location: admin-perfil-crear.php?");
         break;
     case 3:
         header("Location: user-perfil.php?");
         break;
   }
   

}else{
    echo "<h1>Usuario o contraseña Incorrectos!</h1>";
}
?>