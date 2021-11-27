<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style-user.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <header class="headerge shadow-lg p-3 mb-5 bg-body rounded">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a style="font-weight: bold;" class="navbar-brand" href="user-perfil.php">U S U A R I O</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" data-bs-toggle="offcanvas" href="#offcanvasExample">Calificar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Cerrar sesion</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <main class="wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-1 caja text-center">
                    <img src="resource/peon-de-ajedrez.png" class="perfil mx-auto d-block" alt="...">
                    <?php
                      echo "<link rel=stylesheet href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css>";
                      echo "<link rel=stylesheet href=styles/style-user.css>";
                      include("conexion.php");
                      //$ID = $_POST['USER'];
                     $consulta = "SELECT USUARIO.Nombre AS Nombre,Departamento.Nombre AS Depto,USUARIO.Promedio_R AS Promedio FROM USUARIO,Departamento
                                  WHERE (USUARIO.ID_depto = Departamento.ID_depto) AND (USUARIO.ID_usuario = 111111)";
                      $ejecutar = sqlsrv_query ($con, $consulta);

                      $fila=sqlsrv_fetch_array($ejecutar);
                      $progress = $fila['Promedio']*20;
                      echo "<h1 class=\"m-3\">Bienvenido</h1>";
                      echo "<h2 class=\"m-3\">".$fila['Nombre']."</h2>";
                      echo "<h5 class=\"m-3\">Departamento</h5>";
                      echo "<p class=\"dep\">---".$fila['Depto']."---</p>";
                      echo "<br>";
                      echo "<h6>Promedio calificacion</h6>";
                      echo "<div  class=\"progress m-4\">
                              <div class=\"progress-bar progress-bar-striped progress-bar-animated\" role = \"progressbar\"aria-valuenow=\"75\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ".$progress."%; background-color: #363020;\" >".$fila['Promedio']." de satisfaccion
                              </div>
                            </div>";
                    ?>

                    
                </div>
              </div>
        </div>
        <br>
        <div class="hist">
            <?php
              //$ID = $_GET['USER'];
              echo "<link rel=stylesheet href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css>";
              echo "<link rel=stylesheet href=styles/style-user.css>";
              include("conexion.php");
              $consulta = "SELECT ID_getter,N_Estrellas,Badge.Descripcion AS Descripcion FROM Rating,Badge
               WHERE (ID_setter = 111111) AND (Rating.ID_bonus = Badge.ID_bonus)";
              $ejecutar = sqlsrv_query ($con, $consulta);
              while($fila=sqlsrv_fetch_array($ejecutar)){
    
                echo "<div class=\"card\">";
                echo "<div class=\"card-header\">
                        Calificacion a ".$fila['ID_getter']."
                      </div>";
                echo "<div class=\"card-body\">
                        <blockquote class=\"blockquote mb-0\">
                          <p>".$fila['Descripcion']."</p>
                          <footer class=\"blockquote-footer\">Calificacion ".$fila['N_Estrellas']."</footer>
                        </blockquote>
                      </div>";
                echo "</div>";
              }
              /*
            <div class="card">
              <div class="card-header">
                  Calificacion a Itzel
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Trabajo bien</p>
                  <footer class="blockquote-footer">Calificacion 4</footer>
                </blockquote>
              </div>
            </div>*/
            ?>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title">Calificar</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h3>Usuario a calificar</h3>
                <p>(Al calificar al usuario se califica al departamento)</p>
                <form action="calificar/calificarD.php" method="post" name="form-work">
                <select name="nomm" id="" class="form-select" >
              
                <?php
                                  include("conexion.php");
                               //  if(opc=="Departamento"){
                            //      echo"<option>Holaholita</option>";
                               //  }
                                  $consulta = "SELECT * FROM USUARIO";
                                  $ejecutar = sqlsrv_query ($con, $consulta);

                                    while($fila=sqlsrv_fetch_array($ejecutar)){
                                  $id=$fila['ID_usuario'];
                                   echo "<option value=".$fila['ID_usuario'].">".$fila['ID_usuario']."</option>";
                                 } 

                 ?> 
                </select>
                <br>
                <label class="form-label">Calificacion</label>
                <input name="cal" type="range" list="tickmarks" class="form-range" min="1" max="5" id="customRange">
                <br><br>
                <form action="calificar/calificarD.php" method="post" name="form-work">
                <select name="plus" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <p>1-Super actitud</p>
                <p>2-Super rapidez</p>
                <p>3-Creatividad</p>
                <p>1-Super servicio</p>
                <p>1-No aplica</p>
                <br>
                <button type="submit" class="btn btn-outline-secondary">Rankear</button>
                                </form>
                                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>