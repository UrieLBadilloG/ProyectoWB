<?php
// session_start();

require_once'model.php';
//instalcia
$model= new Model();
$model->usuario=$_POST['txtUsuario'];
$model->clave=$_POST["txtClave"];

$filaController=$model->Logear();
if($filaController>0){
    // setcookie('active_session', $random_string, time()+3600*24, '/');
    setcookie('IDusr', $filaController['ID_usuario'], time()+3600*24, '/');
    echo 1;
    header("refresh:2; index.php"); 
    // header("Location: inicio.php");
}else{
    setcookie('IDusr', -1, time()+360*24, '/');
    echo -1;
    // echo "<h1>¡Usuario o contraseña Incorrectos!</h1>";
    header("refresh:2; index.php"); 
}
?>