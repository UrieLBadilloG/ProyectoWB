<?php   
include("../conexion.php");
$p=$_POST['dd'];
$id= $_POST['id'];
$ida= $_POST['IDCostoIda'];


$query="INSERT INTO facturaV(ID_usuario, ID_vuelo, personas, ctotal) values(".$_COOKIE['IDusr'].", '$id','$p', '$ida')";
$res=sqlsrv_prepare($con , $query);
if (sqlsrv_execute($res)) {
    
    // SI ES UN VUELO REDONDO:
    if (isset($_POST['idR']) && $_POST['IDCostoReg']){
        $id2= $_POST['idR'];
        $idr2= $_POST['IDCostoReg'];
        $query="INSERT INTO facturaV(ID_usuario, ID_vuelo, personas, ctotal) values(".$_COOKIE['IDusr'].", '$id2','$p', '$idr2')";
        $res=sqlsrv_prepare($con , $query);
        if (sqlsrv_execute($res)) {
            return "Datos insertados correctamente. IDA Y VUELTA.";
        }
        else {
            return "Error al insertar los datos";
        }
    }
    else{
        return "Datos insertados correctamente SOLO IDA";
    }


//header("admin-perfil-crear.php");
}else {
    return "Error al insertar los datos";
}
?> 
