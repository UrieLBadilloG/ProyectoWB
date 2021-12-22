<?php
  if(isset($_COOKIE['IDusr']) && $_COOKIE['IDusr'] > 0){
    //echo "ID: " . $_COOKIE['IDusr'];
  } else{
    header("refresh:0; index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UPIITRAVEL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS v5.0.2 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="styles/style-admin.css">
  </head>
  <body>
    <header>
      <nav class="cab navbar navbar-expand-lg navbar-light p-3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">UPIITRAVEL</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
              <a class="nav-link" href="vuelos2.php">Vuelos</a>
              <a class="nav-link" href="alojamiento.php">Alojamientos</a>
              <a class="nav-link" href="paquetes.php">Paquetes</a>
              <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Mi historial
                <?php
                  if(isset($_COOKIE['IDusr'])){
                    //echo "ID: " . $_COOKIE['IDusr'];
                  } else{
                   // echo "NONE";
                  }
                ?>
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
      <header class="car">
        <div
          id="carouselExampleDark"
          class="carousel carousel-dark slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleDark"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
            <button
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide-to="3"
            aria-label="Slide 4"
          ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="img/elpepe.jpg" class="d-block w-100 car-item-custom" alt="..." />
              <div class="carousel-caption d-none d-md-block">
                <h5>¿A donde quieres viajar?</h5>
                <p>
                  Quien bien te quiera, te hará viajar
                </p>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
              <img src="img/img2.jpg" class="d-block w-100 car-item-custom" alt="..." />
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
              <img src="img/img3.jpg" class="d-block w-100 car-item-custom" alt="..." />
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="10000">
              <img src="img/img4.jpg" class="d-block w-100 car-item-custom" alt="..." />
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </header>
      <div class="contenido">
        <div style="display: flex; height: 500px;" class="sec1 shadow-lg p-3 mb-5 bg-body rounded">
          <div style="width: 50%;" class="video p-3">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/sw7463aYB5k?autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="texto p-3">
            <p>"Los viajes son en la juventud una parte de educación y, en la vejez, una parte de experiencia." Francis Bacon </p>
          </div>
        </div>
        <div style="display: flex; height: 500px" class="sec2 shadow-lg p-3 mb-5 bg-body rounded">
          <div style="width: 50%;" class="video2 p-3">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nOBv6JRvTb4?autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="texto2 p-3">
            <p>“El auténtico viaje es ir. Una vez se ha llegado, se acaba el viaje. Hoy día, la gente comienza por el final.” Hugo Verlomme </p>
          </div>
        </div>
        <div style="height: 400px;" class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15368143.3020191!2d-103.24700910195502!3d19.882723930390437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses-419!2smx!4v1637727767985!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        
      </div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Historial</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div style="text-align: center;" class="offcanvas-body">
            <h3>Bienvenido</h3>
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
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
