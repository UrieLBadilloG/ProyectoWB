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
            $date=$_POST['entrada'];
            $date2=$_POST['salida'];
                //$query="INSERT INTO Alojamiento(ID_usuario, ID_hotel, Entrada, Salida) values(".$_COOKIE['IDusr'].", ".$_POST['idhotel'].",".$date->format('y-m-d').", ".$date2->format('y-m-d').")";
                // $query="INSERT INTO Alojamiento(ID_usuario, ID_hotel, Entrada, Salida) values(".$_COOKIE['IDusr'].", ".$_POST['idhotel'].",\''.$date.'', -''.$date2.'-')";
                // $res=sqlsrv_prepare($con , $query);
                // if (sqlsrv_execute($res)) {
                //     $procedure_params = array($_COOKIE['IDusr'], $_POST['habi']);
                //     $query = "EXECUTE SPgenerarpaquete ?,?";
                //     $stmt = sqlsrv_prepare($con, $query, $procedure_params);
                //     if (sqlsrv_execute($stmt)) {
                //         $query = "EXECUTE SPgeneraralojapp";
                //         $stmt = sqlsrv_prepare($con, $query);
                //         if (sqlsrv_execute($stmt)) {
                //             header("Location: ../paquetes.php");
                //         }
                        
                //     }else {
                //         echo "Error al insertar los datos";
                //     }
                // }
                // else {
                //     return "Error al insertar los datos";
                // }
            $cnx= new PDO("sqlsrv:Server=ingweb.database.windows.net;Database=UPIITRAVEL2","Uri","123456.b");
            try{
                $consulta=$cnx->prepare("INSERT INTO Alojamiento(ID_usuario, ID_hotel, Entrada, Salida) VALUES(:p1, :p2, :p3, :p4)");
                $consulta->bindValue(":p1", $_COOKIE['IDusr']);
                $consulta->bindValue(":p2", $_POST['idhotel']);
                $consulta->bindParam(":p3", $date, PDO::PARAM_STR);
                $consulta->bindParam(":p4", $date2, PDO::PARAM_STR);
                // $procedure_params = array($_COOKIE['IDusr'], $_POST['idhotel'], $date, $date2);
                // $query = "INSERT INTO Alojamiento(ID_usuario, ID_hotel, Entrada, Salida) VALUES(?, ?, ?, ?)";
                // $stmt = sqlsrv_prepare($con, $query, $procedure_params);

                if ( $consulta->execute() ) {
                // if ( sqlsrv_execute($stmt) ) {
                    $procedure_params = array($_COOKIE['IDusr'], $_POST['habi']);
                    $query = "EXECUTE SPgenerarpaquete ?, ?";
                    $stmt = sqlsrv_prepare($con, $query, $procedure_params);
                    if (sqlsrv_execute($stmt)) {
                        $query = "EXECUTE SPgeneraralojapp";
                        $stmt = sqlsrv_prepare($con, $query);
                        if (sqlsrv_execute($stmt)) {
                            header("Location: ../paquetes.php");
                        }
                    }else {
                        echo "Error al insertar los datos";
                    }
                }
                else {
                    return "Error al insertar los datos";
                }
            }catch(PDOException $e){
                echo"Error en la conexion".$e;
            }
        }
        else {
            return "Error al insertar los datos";
        }
    }
    else{
        return "Datos insertados correctamente SOLO IDA";
    }

}else {
    return "Error al insertar los datos";
}

?> 
