<script type="text/javascript">
		function costos(str, num){ 
			var conexion;

			if(str==""){
				document.getElementById("txtHint").innerHTML=""; 
				return;
			}
			if (window.XMLHttpRequest){
				conexion = new XMLHttpRequest();  
			}
			conexion.onreadystatechange=function(){  
				if(conexion.readyState==4 && conexion.status==200){
					document.getElementById("div").innerHTML=conexion.responseText; 
				}
			}
			conexion.open("GET", "Cida.php?d="+str+"&n="+num, true);
			conexion.send();
		}
        function regreso(str, num){ 
			var conexion;

			if(str==""){
				document.getElementById("txtHint").innerHTML=""; 
				return;
			}
			if (window.XMLHttpRequest){
				conexion = new XMLHttpRequest();  
			}
			conexion.onreadystatechange=function(){  
				if(conexion.readyState==4 && conexion.status==200){
					document.getElementById("dive").innerHTML=conexion.responseText; 
				}
			}
			conexion.open("POST", "Cregreso.php?d="+str+"&n="+num, true);
			conexion.send();
		}
        function variables(per, habitacion, hotel, entrada, salida){
            var conexion;
			if (window.XMLHttpRequest){
				conexion = new XMLHttpRequest(); 
			}
            conexion.onreadystatechange=function(){  
				if(conexion.readyState==4 && conexion.status==200){
					//document.getElementById("dive").innerHTML=conexion.responseText; 
                    //alert(this.responseText);
                }
			}    
            conexion.open("POST", "CRUD/FacPaquete.php", true);
            conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var IDHoraIda = document.getElementById("slHorarioIda").value;
            var IDCostoIda = document.getElementById("IDCosto").value;

            var params = "dd=" + per+"&habi="+ habitacion + "&id=" + IDHoraIda + "&IDCostoIda=" + IDCostoIda + "&idhotel=" + hotel + "&entrada=" +  entrada + "&salida=" + salida;
    <?php
            if(isset($_POST["salida"])) { 
    ?>        
                var IDHoraSalida = document.getElementById("slHorarioSalida").value;
                var IDCostoReg = document.getElementById("IDCostoReg").value;
                params += "&idR=" + IDHoraSalida + "&IDCostoReg=" + IDCostoReg;
    <?php
            }
    ?>
            alert(entrada);
            conexion.send(params);
        }

        
			
</script>

<?php
            if(isset($_POST["selecttt"]) && isset($_POST["destin"]) && $_POST["destin"]!=NULL) {
                include("conexion.php");
                $consulta = "SELECT * FROM Aeropuertos";
                $ejecutar = sqlsrv_query ($con, $consulta);
                while($fila=sqlsrv_fetch_array($ejecutar)){
                if($fila['ID_aeropuerto']==$_POST["selecttt"]){
                    echo ('<h5>'.'Origen de vuelo: '.'</h5>');
                    echo('<h6>'.$fila['Nombre'] . '</h6>');
                    //echo "Origen: ".$fila['Nombre'];
                }
                }
                $consulta2 = "SELECT * FROM Aeropuertos";
                $ejecutar2 = sqlsrv_query ($con, $consulta2);
                while($fila=sqlsrv_fetch_array($ejecutar2)){
                if($fila['ID_aeropuerto']==$_POST["destin"]){
                    echo ('<h5>'.'Destino de vuelo: '.'</h5>');
                    echo('<h6>'.$fila['Nombre'] . '</h6>');
                    //echo "Origen: ".$fila['Nombre'];
                }
                }
                
                $consulta3 = "SELECT * FROM Hotel";
                $ejecutar3 = sqlsrv_query ($con, $consulta3);
                while($fila3=sqlsrv_fetch_array($ejecutar3)){
                if($fila3['ID_hotel']==$_POST["sel"]){
                    echo ('<h5>'.'Hotel: '.'</h5>');
                    echo('<h6>'.$fila3['Nombre'] . '</h6>');
                    //echo "Origen: ".$fila['Nombre'];
                }
                }
                if(isset($_POST["entrada"])){
                    echo ('<h5>'.'Dia entreada vuelo: '.'</h5>');
                    echo('<h6>'.$_POST["entrada"]. '</h6>'); 
                    }
                if(isset($_POST["salida"])){
                    echo ('<h5>'.'Dia salida vuelo: '.'</h5>');
                    echo('<h6>'.$_POST["salida"]. '</h6>');
                }
                echo ('<h5>'.'Numero de personas: '.'</h5>');
                echo ('<h6 name="perso">'.$_POST["personas"].'</h6>');
                echo ('<h5>'.'Numero de habitaciones: '.'</h5>');
                echo ('<h6 name="perso">'.$_POST["habitaciones"].'</h6>');
                
                $person = $_POST["personas"];
                if(isset($_POST["entrada"])){
                    echo ('<h5 name="ida">'.'Horario de vuelo disponible: '.'</h5>');
                    echo'<select  id="slHorarioIda" onclick="costos(this.value, '.$_POST["personas"].')">';
                    include("conexion.php");
                    $consulta = "SELECT * FROM Vuelo";
                    $ejecutar = sqlsrv_query ($con, $consulta);
                    while($fila=sqlsrv_fetch_array($ejecutar)){
                        $date=$fila['dia'];
                        if($fila['ID_aOrigen']==$_POST["selecttt"] && $fila['ID_aDestino']==$_POST["destin"] && $date->format('20y-m-d') ==$_POST["entrada"]){
                            $time=$fila['horaV'];
                            echo "<option value=".$fila['ID_vuelo'].">".$time->format('H:i')."</option>";
                        }
                    
                    }
                    echo'</select>';
                }
                
                
                if(isset($_POST["salida"])) { 
                    echo ('<h5>'.'Horario de vuelo de regreso disponible: '.'</h5>');
                    echo'<select id="slHorarioSalida" onclick="regreso(this.value, '.$_POST["personas"].')">';
                    include("conexion.php");
                    $consulta = "SELECT * FROM Vuelo";
                    $ejecutar = sqlsrv_query ($con, $consulta);
                    $fila=sqlsrv_fetch_array($ejecutar);
                    $date=$fila['dia'];
                    while($fila=sqlsrv_fetch_array($ejecutar)){
                    if($fila['ID_aDestino']==$_POST["selecttt"] && $fila['ID_aOrigen']==$_POST["destin"] && $date->format('20y-m-d') ==$_POST["entrada"]){
                        $time=$fila['horaV'];
                        echo "<option value=".$fila['ID_vuelo'].">".$time->format('H:i')."</option>";
                    }
                    }
                    echo'</select>';
                }
                    $chotel=0;
                    echo ('<h5>'.'Costo por habitacion: '.'</h5>');
                    include("conexion.php");
                    $consulta = "SELECT * FROM Hotel";
                    $ejecutar = sqlsrv_query ($con, $consulta);
                    while($fila=sqlsrv_fetch_array($ejecutar)){
                    if($fila['ID_hotel']==$_POST["sel"]){
                        echo('<h6>'.$fila['Cpersona'] . '</h6>');
                        echo ('<h5>'.'Costo por todas las habitaciones: '.'</h5>');
                        $chotel= $fila['Cpersona']*$_POST["habitaciones"];
                        echo $chotel;
                    }
                    }
                        
                    echo ('<div id="div">'.''.'</div>');
                
                if(isset($_POST["salida"])){
                    echo ('<div id="dive">'.''.'</div>');
                }
                echo '<input type="hidden" name="dd" value="'. $_POST["personas"] .'">';
                $date=$_POST["entrada"];
                echo('<button  class="btn btn-outline-secondary" onclick="variables('.$_POST["personas"].', '.$_POST["habitaciones"].', '.$_POST["sel"].', \''.$date.'\', \''.$_POST["salida"]. '\')">Comprar</button>');
                echo('</form>');
                
            }
            else{
                echo ('<h3>'.'Marque todos los campos solicitados'.'</h3>');
            }
            
?>