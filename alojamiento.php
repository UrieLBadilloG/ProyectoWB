<?php
  if(isset($_COOKIE['IDusr']) && $_COOKIE['IDusr'] > 0){
    //echo "ID: " . $_COOKIE['IDusr'];
  } else{
    header("refresh:0; index.php");
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estiloss.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript">
		function muestraselect(str){ 
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
			conexion.open("GET", "LugarH.php?c="+str, true);
			conexion.send();
		}
        function estados(str){ 
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
					document.getElementById("dv").innerHTML=conexion.responseText; 
				}
			}
			conexion.open("GET", "estadoH.php?c="+str, true);
			conexion.send();
		}
        function incrustarMapa(){
            var conexion;
                    if (window.XMLHttpRequest){
                        conexion = new XMLHttpRequest(); 
                    }
            conexion.onreadystatechange=function(){  
                        if(conexion.readyState==4 && conexion.status==200){
                            document.getElementById("mapaVuelos").innerHTML = conexion.responseText; 
                            //alert(this.responseText);
                }
                    }
            var IDEstado = document.getElementById("s").value;
            conexion.open("POST", "CRUD/VuelosMapa.php", true);
            conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            var params = "IDestado=" + IDEstado + "&isAlojamiento=1";
            // alert("Params: " + params);
            conexion.send(params);
        }
			
	</script>
    <title>Alojamiento</title>
</head>

<body>
    <header>
        <nav class="cab navbar navbar-expand-lg navbar-dark p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UPIITRAVEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                        <a class="nav-link"  href="vuelos2.php">Vuelos</a>
                        <a class="nav-link active" aria-current="page" href="alojamiento.php">Alojamientos</a>
                        <a class="nav-link" href="paquetes.php">Paquetes</a>
                        <!--Esto lo vas a copiar en todas las paginas-->
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            Mi historial
                        </a>
                        <!--Hasta aqui porque estas todo tonto-->
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <a id="div12" class="nav-link" href="index.php">Cerrar sesion</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="contenido">
            <div class="sec1 shadow-lg p-3 mb-5 bg-body rounded">
                <section class="formulario">
                    <h3>Solicitud de alojamiento</h3>
                    <form action="CRUD/FacAlojamiento.php" method="post">
                    <h5 class="m-2">Estado</h5>
                        <select name="select" id="s" class="form-select" onclick="estados(this.value)" onchange="incrustarMapa()">
                            <option selected>Seleccione un estado</option>
                            <?php
                                include("conexion.php");
                                 $consulta = "SELECT * FROM estados";
                                $ejecutar = sqlsrv_query ($con, $consulta);
                                while($fila=sqlsrv_fetch_array($ejecutar)){
                                echo "<option value=".$fila['ID_estado'].">".$fila['Nombre']."</option>";
                                } 
                            ?>
                        </select>
                        <h5 class="m-2">Lugar</h5>
                        <div id="dv">
                        <select name="select" id="select" class="form-select" onclick="muestraselect(this.value)">
                            <option selected>Seleccione el lugar de viaje</option>
                        </select>
                        </div>
                        <h5 class="m-2">Hotel</h5>
                        <div id="div">
                            <select name="sel" id="select" class="form-select">
                                <option selected>Primero seleccione lugar de viaje</option>
                            </select>
                        </div>
                        <h5 class="m-2">Dia de entrada</h5>
                        <input type="date" name="ent">
                        <h5 class="m-2">Dia de salida</h5>
                        <input type="date" name="sal">
                        <h5 class="m-2">Num personas</h5>
                        <input class="form-control" type="number" placeholder="Numero">
                        <div>
                            <button type="submit" class="btn btn-outline-secondary m-2">Realizar apartado</button>
                        </div>
                    </form>
                </section>
                <section id="mapaVuelos" class="mapa2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15007912.237317769!2d-111.64056310536196!3d23.314268494456325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses-419!2smx!4v1639438412530!5m2!1ses-419!2smx"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
            </div>
        </div>
        <!--Este codigo lo vas a copiar en todas las paginas, hasta abajo pero antes de los scripts-->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Historial</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div style="text-align: center;" class="offcanvas-body">
                <div class="card">
                    <div class="card-header">
                        Vuelos
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <?php
                                $n=1;
                                include("conexion.php");
                                $procedure_params = array($_COOKIE['IDusr']);
                                $consulta = "EXECUTE sp_selectVuelosUser ?";
                                $ejecutar = sqlsrv_query ($con, $consulta, $procedure_params);
                                while($fila=sqlsrv_fetch_array($ejecutar)){
                                        $date= $fila['diaVuelo'];
                                        echo "<p>".$n.'.-Compro un vuelo de ' .$fila['estadoOri'].' hacia '.$fila['estadoDes'].' con fecha: '.$date->format('20y-m-d')."</p>";
                                        $n=$n+1;
                                }
                        ?>
                        </blockquote>
                    </div>
                </div>
                <div class="card">
          <div class="card-header">
            Alojamientos
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <?php
              $n=1;
                            include("conexion.php");
                            $procedure_params = array($_COOKIE['IDusr']);
                            $consulta = "EXECUTE sp_selectAlojamientosUser ?";
                            $ejecutar = sqlsrv_query ($con, $consulta, $procedure_params);
                            while($fila=sqlsrv_fetch_array($ejecutar)){
                                    $date= $fila['Entrada'];
                                    $date2= $fila['Salida'];
                                    echo "<p>".$n.'.-Solicito alojamiento en el hotel:  ' .$fila['Hotel'].' en '.$fila['LugarTurist'].' con fecha de entrada: '.$date->format('20y-m-d').' y fecha de salida: '.$date2->format('20y-m-d')."</p>";
                                    $n=$n+1;
                            }
                            
              ?>
            </blockquote>
          </div>
        </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>