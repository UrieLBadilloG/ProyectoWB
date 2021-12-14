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
        function variables(per){
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
            // conexion.open("GET", "CRUD/FacVuelo.php?dd="+per, true);
            // conexion.send();
            conexion.open("POST", "CRUD/FacVuelo.php", true);
            conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var IDHoraIda = document.getElementById("slHorarioIda").value;
            var IDCostoIda = document.getElementById("IDCosto").value;
            // var isSoloIda = document.getElementById("radioBtnSoloIda").value;

            var params = "dd=" + per + "&id=" + IDHoraIda + "&IDCostoIda=" + IDCostoIda;
    <?php
            if(isset($_POST["salida"])) { 
    ?>        
                var IDHoraSalida = document.getElementById("slHorarioSalida").value;
                var IDCostoReg = document.getElementById("IDCostoReg").value;
                params += "&idR=" + IDHoraSalida + "&IDCostoReg=" + IDCostoReg;
    <?php
            }
    ?>
            alert(params);
            conexion.send(params);
                // alert(params);
        }

        
			
</script>

<?php
            if(isset($_POST["selecttt"]) && isset($_POST["destin"]) ) {
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
                if(isset($_POST["entrada"])){
                    echo ('<h5>'.'Dia entreada vuelo: '.'</h5>');
                    echo('<h6>'.$_POST["entrada"]. '</h6>'); 
                    }
                if(isset($_POST["salida"])){
                    echo ('<h5>'.'Dia salida vuelo: '.'</h5>');
                    echo('<h6>'.$_POST["salida"]. '</h6>');
                }
                echo ('<h5>'.'Numero de personas: '.'</h5>');
?>
                <form  method="POST">
                <!-- action="CRUD/FacVuelo.php" -->
<?php
                echo ('<h6 name="perso">'.$_POST["personas"].'</h6>');
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
                if(isset($_POST["entrada"])){
                    echo ('<div id="div">'.''.'</div>');
                }
                if(isset($_POST["salida"])){
                    echo ('<div id="dive">'.''.'</div>');
                }
                echo '<input type="hidden" name="dd" value="'. $_POST["personas"] .'">';
                echo('<button  class="btn btn-outline-secondary" onclick="variables('.$_POST["personas"].')">Comprar</button>');
                echo('</form>');
                
            }
            else{
                echo ('<h3>'.'Marque todos los campos solicitados'.'</h3>');
            }
            
?>