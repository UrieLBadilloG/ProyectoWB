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
        function obtenerAeropuertos(str){ 
          if(str==""){
            document.getElementById("txtHint").innerHTML=""; 
            return;
          }
          var conexion;
          if (window.XMLHttpRequest){
            conexion = new XMLHttpRequest();  
          }
          conexion.onreadystatechange=function(){  
            if(conexion.readyState==4 && conexion.status==200){
              document.getElementById("div").innerHTML=conexion.responseText; 
            }
          }
          conexion.open("GET", "Slugaresturisticos.php?c="+str, true);
          conexion.send();
        }
        function obtenerAeropuertosDestino(estado){ 
          if(estado==""){
            document.getElementById("txtHint").innerHTML=""; 
            return;
          }
          var conexion;
          if (window.XMLHttpRequest){
            conexion = new XMLHttpRequest();  
          }
          conexion.onreadystatechange=function(){  
            if(conexion.readyState==4 && conexion.status==200){
              document.getElementById("div-sel-destino").innerHTML=conexion.responseText; 
            }
          }
          conexion.open("GET", "Slugaresturisticos.php?c="+estado, true);
          conexion.send();
        }
			
	</script>
    <title>Vuelos</title>
</head>

<body>
  <header>
    <nav class="cab navbar navbar-expand-lg navbar-dark p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">UPIITRAVEL-ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="inicio.php">Inicio</a>
            <a class="nav-link active" aria-current="page" href="vuelos2.php">Vuelos</a>
            <a class="nav-link" href="alojamiento.php">Hoteles</a>
            <!-- <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
              aria-controls="offcanvasExample">
              Mi historial
            </a> -->
            <a id="div12" class="nav-link" href="index.php">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="contenido">
      <div class="sec1 shadow-lg p-3 mb-5 bg-body rounded">
        <section class="formulario">
          <h3>Generación de vuelo</h3>
            <h5 class="m-2">Origen</h5>
            
              <select name="select-estado-ori" id="select-estado-ori" class="form-select" onclick="obtenerAeropuertos(this.value)">
                <option selected>Seleccione estado origen</option>
                <?php
                  include("conexion.php");
                  $consulta = "SELECT * FROM estados";
                  $ejecutar = sqlsrv_query ($con, $consulta);
                  while($fila=sqlsrv_fetch_array($ejecutar)){
                    echo "<option value=".$fila['ID_estado'].">".$fila['Nombre']."</option>";
                  }
                ?>
              </select>
              <form action="insert-vuelo.php" method="post">
              <div id="div">
              <select name="select-v-ori" id="select-v-ori" class="form-select">
                <option selected>Seleccione lugar</option>
              </select>
              </div>
              
              <h5 class="m-2">Destino</h5>
              <select name="select-estado-destin" id="select-estado-des" class="form-select" onclick="obtenerAeropuertosDestino(this.value)">
              <option selected>Seleccione estado destino</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM estados";
                $ejecutar = sqlsrv_query ($con, $consulta);
                while($fila=sqlsrv_fetch_array($ejecutar)){
                  echo "<option value=".$fila['ID_estado'].">".$fila['Nombre']."</option>";
                }
              ?>
              </select>
              
                <div id="div-sel-destino">
                <form action="insert-vuelo.php" method="post">
                <select name="destin"  class="form-select">
                  <option selected>Seleccione el estado destino</option>
                </select>
              </div>
    
              <h5 class="m-2">Fecha:</h5>
              <input type="date" name="date-vuelo" id="date-vuelo"  onclick="this.value" require>

              <select name="select-v-hora" id="select-v-hora" class="form-select" onclick="this.value">
                <option selected>Seleccione la Hora del Vuelo</option>
                <option value="1">07:00</option>
                <option value="2">08:00</option>
                <option value="3">09:00</option>
                <option value="4">10:00</option>
                <option value="5">11:00</option>
                <option value="6">12:00</option>
                <option value="7">13:00</option>
                <option value="8">14:00</option>
                <option value="9">15:00</option>
                <option value="10">16:00</option>
                <option value="11">17:00</option>
                <option value="12">18:00</option>
                <option value="13">19:00</option>
                <option value="14">20:00</option>
                <option value="15">21:00</option>
              </select>

              <h5 class="m-2">Costo:</h5>
              <input type="number" name="num-v-costo" id="num-v-costo" step="0.01" min="0" class="form-control" require>

              <h5 class="m-2">Capacidad asientos:</h5>
              <input class="form-control" type="number" placeholder=1 name="num-v-capacper" id="num-v-capacper"  onchange="this.value" require>
              <div>
                <button type="submit" class="btn btn-outline-secondary">Agregar vuelo</button>
              </div>
            </form>
            </form>
            </form>

        </section>
      </div>
    </div>
    <!--Aquí-->
    
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>