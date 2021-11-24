<?php

require_once'model.php';
//instalcia
$model= new Model();
$model->usuario=$_POST['txtUsuario'];
$model->clave=$_POST["txtClave"];

$filaController=$model->Logear();
if($filaController>0){
    echo"<h1>Bienvenido Usuario</h1>";
}else{
    echo "<h1>Usuario o contraseña Incorrectos!</h1>";
    header("refresh:2; url=http://localhost/login/"); 
}
?>