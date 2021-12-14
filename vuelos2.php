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
  <link rel="stylesheet" href="css/estiloss.css"/>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
  <header>
    <nav class="cab navbar navbar-expand-lg navbar-dark p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">UPIITRAVEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="inicio.php">Inicio</a>
            <a class="nav-link active" aria-current="page" href="vuelos2.php">Vuelos</a>
            <a class="nav-link" href="alojamiento.php">Alojamientos</a>
            <a class="nav-link" href="paquetes.php">Paquetes</a>
            <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
              aria-controls="offcanvasExample">
              Mi historial
            </a>
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
          <h3>Solicitud de vuelo</h3>
            <h5 class="m-2">Origen</h5>
            <form action="vuelos2.php" method="post">
            <select name="selecttt" id="selecte" class="form-select" onclick="this.value">
                <option selected>Seleccione el origen de salida</option>
                <?php
                  include("conexion.php");
                  $consulta = "SELECT * FROM Aeropuertos";
                  $ejecutar = sqlsrv_query ($con, $consulta);
                  while($fila=sqlsrv_fetch_array($ejecutar)){
                  $Nm=$fila['Nombre'];
                  echo "<option value=".$fila['ID_aeropuerto'].">".$fila['Nombre']."</option>";
                  } 
                ?>
              </select>
              
              <h5 class="m-2">Destino</h5>
              <select name="destin" id="s" class="form-select" onclick="this.value" onchange="incrustarMapa()">
              <option selected>Seleccione el destino</option>
                <?php
                  include("conexion.php");
                  $consulta = "SELECT * FROM Aeropuertos";
                  $ejecutar = sqlsrv_query ($con, $consulta);
                  while($fila=sqlsrv_fetch_array($ejecutar)){
                  $Nm=$fila['Nombre'];
                  echo "<option value=".$fila['ID_aeropuerto'].">".$fila['Nombre']."</option>";
                  } 
                ?>
              </select>
              <p>
                <input type="radio" name="cuando" value="hoy" onclick="activar()"> Ida y vuelta<br>
                <input type="radio" name="cuando" value="manana" onclick="desactivar()"> Solo Ida
              </p>
            <h5 class="m-2">Ida</h5>
            <input type="date" name="entrada" id="caja"  onclick="this.value" disabled="">
            <h5 class="m-2">Regreso</h5>
            <input type="date" name="salida" id="caja2" onclick="this.value" disabled="">
            <h5 class="m-2">Num personas</h5>
            <input class="form-control" type="number" placeholder="Seleccione numero de personas" name="personas" min="0"  onchange="this.value" >
            <div>
              <button type="submit" class="btn btn-outline-secondary m-2">Agregar a mi canasta</button>
            </div>
            </form>
            <button style="float: right;" class="btn btn-outline-secondary" type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Mi canasta</button>
          <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasBottomLabel">Confirmacion Aeromexico</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
              <?php
                  include("solicitudvuelo.php");              
              ?>            
            </div>
          </div>
        </section>
        <section id="mapaVuelos" class="mapa2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15007912.237317769!2d-111.64056310536196!3d23.314268494456325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses-419!2smx!4v1639438412530!5m2!1ses-419!2smx"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
      </div>
    </div>
    <!--Aquí-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Historial</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
  function activar() {
    document.getElementById('caja').disabled=false
    document.getElementById('caja2').disabled=false

  }
  function desactivar() {
    document.getElementById('caja').disabled=false
    document.getElementById('caja2').disabled=true
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

    var params = "IDestado=" + IDEstado;
    // alert("Params: " + params);
    conexion.send(params);
  }
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>