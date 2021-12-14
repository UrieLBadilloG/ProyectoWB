<?php

class Model
{
    var $id;
    var $usuario;
    var $clave;
    function __construct(){

    }
    function Logear(){
        $cadenaCnx="sqlsrv:Server=ingweb.database.windows.net,1433;Database=UPIITRAVEL2";
        $user="Uri";
        $pass="123456.b";
        $cnx= new PDO($cadenaCnx, $user, $pass);
        
        try{
            $consulta=$cnx->prepare("SELECT *FROM USUARIO  WHERE
            Correo=:parametro1 AND Contraseña=(SELECT dbo.fun_encriptar(:parametro2))");
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