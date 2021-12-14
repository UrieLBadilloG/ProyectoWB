<?php
include("../conexion.php");
$Nom=$_POST["Nombree"];
$pat=$_POST["paterno"];
$mat=$_POST["materno"];
$Cor=$_POST["Corre"];
$Pass=$_POST["Contraseña"];
$Ed=$_POST["eda"];
$Dir=$_POST["dir"];
$conn=0;

if(isset($_POST["Nombree2"])){
      $snom=$_POST["Nombree2"];
}
else{
      $snom=NULL;
}
$consulta = "SELECT * FROM Usuario";
$ejecutar = sqlsrv_query ($con, $consulta);
while($fila=sqlsrv_fetch_array($ejecutar)){
      if($fila['Correo']==$Cor){
            $conn=1;
      }
}
if($conn==0){
      $query="INSERT INTO Usuario(PNombre, SNombre, ApellidoP, ApellidoM, Correo, Edad, direccion, Contraseña) values('$Nom', '$snom', '$pat', '$mat', '$Cor', '$Ed', '$Dir', (SELECT dbo.fun_encriptar('$Pass')))";
      $res=sqlsrv_prepare($con , $query);
      if (sqlsrv_execute($res)) {
         //   echo"Datos insertados correctamente";
            header("Location: ../index.php");
      }else {
            echo "Error al insertar los datos";
      }
}
else{
      echo "El registro ya existe";
}
?>    