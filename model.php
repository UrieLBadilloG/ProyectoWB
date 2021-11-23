<?php

class Model
{
    var $id;
    var $usuario;
    var $clave;
    var $con;
    function __construct(){

    }
    function Logear(){
        $cadenaCnx="sqlsrv:Server=DESKTOP-H3MGCA8;Database=AM";
        $user="Uri";
        $pass="123456";
        $cnx= new PDO($cadenaCnx, $user, $pass);
        
        try{
            $consulta=$cnx->prepare("SELECT *FROM USUARIO  WHERE
            ID_usuario=:parametro1 AND contraseña=:parametro2");
            $consulta->bindValue(":parametro1", $this->usuario);
            $consulta->bindValue(":parametro2", $this->clave);
            $consulta->execute();

            $filaModel=$consulta->fetch();
            return $filaModel;

        }catch(PDOException $e){
          echo"Error en la conexion".$e;
       }
    }

}

?>