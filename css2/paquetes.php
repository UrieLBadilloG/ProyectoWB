<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/estilos.css" />
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
	</script>
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
            <a class="nav-link"  href="vuelos2.php">Vuelos</a>
            <a class="nav-link" href="alojamiento.php">Alojamientos</a>
            <a class="nav-link active" aria-current="page" href="paquetes.php">Paquetes</a>
            <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
              aria-controls="offcanvasExample">
              Mi historial
            </a>
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
          <h3>Solicitud de vuelo</h3>
          <form action="">
            <h5 class="m-2">Origen</h5>
            <select class="form-select" aria-label="">
              <option selected>Seleccione el origen de salida</option>
              <?php
                include("conexion.php");
                $consulta = "SELECT * FROM Lugar_vuelos";
                $ejecutar = sqlsrv_query ($con, $consulta);
                while($fila=sqlsrv_fetch_array($ejecutar)){
                $Nm=$fila['Nombre'];
                echo "<option value=".$fila['Nombre'].">".$fila['Nombre']."</option>";
                } 
              ?>
            </select>

            <h5 class="m-2">Destino</h5>

            <select class="form-select" aria-label="" name="select" id="select" onclick="muestraselect(this.value)">
              <option selected>Seleccione el destino</option>
              <?php
                include("conexion.php");
                $consulta = "SELECT * FROM Lugar_turistico";
                $ejecutar = sqlsrv_query ($con, $consulta);
                while($fila=sqlsrv_fetch_array($ejecutar)){
                $Nm=$fila['Nombre'];
                echo "<option value=".$fila['ID_lugart'].">".$fila['Nombre']."</option>";
                } 
              ?>
            </select>
            <h5 class="m-2">Dia de entrada</h5>
            <input type="datetime-local">
            <h5 class="m-2">Dia de salida</h5>
            <input type="datetime-local">
            <h5 class="m-2">Num personas</h5>
            <input class="form-control" type="number" placeholder="Numero">
          </form>
        </section>
        <section class="mapa2">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d200329.6579226351!2d-86.85537091701408!3d21.096703909659176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4c2b05aef653db%3A0xce32b73c625fcd8a!2zQ2FuY8O6biwgUS5SLg!5e0!3m2!1ses-419!2smx!4v1637975139635!5m2!1ses-419!2smx"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
      </div>
    </div>
    <!--Aqu??-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Historial</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div style="text-align: center;" class="offcanvas-body">
        <h3>Bienvenido</h3>
        <h4>Uriel</h4>
        <div class="card">
          <div class="card-header">
            Vuelo a Cancun
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Uriel compro un vuelo de CDMX a Cancun para la fecha de 24/sep/2022</p>
            </blockquote>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Vuelo a Cancun
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Uriel compro un vuelo de Cancun a CDMX para la fecha de 30/sep/2022</p>
            </blockquote>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            Vuelo a Cancun
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Uriel compro un vuelo de Cancun a Chiapas para la fecha de 14/Oct/2022</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    <div class="contenido">
            <div class="sec1 shadow-lg p-3 mb-5 bg-body rounded">
                <section class="formulario">
                    <h3>Solicitud de alojamiento</h3>
                    <form action="">
                        <h5 class="m-2">Hotel</h5>
                        <div id="div">
                        <select class="form-select" aria-label="" name="select" id="select">
                            <option selected>Seleccione su hotel</option>
                        </select>
                    </form>
                </section>
                <section class="mapa2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d338189.0293208603!2d-87.21568917732472!3d20.526869520840226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4e5d781aae6d93%3A0xd9906e1324d837f9!2sGrand%20Velas%20Riviera%20Maya!5e0!3m2!1ses-419!2smx!4v1637969460802!5m2!1ses-419!2smx"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
            </div>
        </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>