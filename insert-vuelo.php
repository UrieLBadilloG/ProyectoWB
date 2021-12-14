<?php
  //  if(isset($_POST['select-v-ori']) && isset($_POST['select-v-des']) && isset($_POST['date-vuelo']) 
   // && isset($_POST['select-v-hora']) && isset($_POST['num-v-capacper']) && isset($_POST['num-v-costo']))
    {
        include("conexion.php");
        $conne = new PDO("sqlsrv:server = $srv; Database = $base", $user, $pass);

        $origen =$_POST['select-v-ori'];
        $destino =$_POST['destin'];
        $hora = '07:00';
        //$hora = $_POST['select-v-hora'];
        $dia = $_POST['date-vuelo'];
        $costo = $_POST['num-v-costo'];
        $asientos = $_POST['num-v-capacper'];
        $sql = "INSERT INTO Vuelo (ID_aOrigen, ID_aDestino, horaV, dia, costo, asientos) VALUES (?,?,?,?,?,?)";
        try{
            $statement = $conne->prepare($sql);
            $statement->execute([$origen, $destino, $hora, $dia, $costo, $asientos]);
            
        } catch (PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . "admin-vuelos.php";
    //href("Location: admin-vuelo.php");
    exit();

?>
