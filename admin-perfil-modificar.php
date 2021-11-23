<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style-admin.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="wrapper">
        <div class="navegacion">
            <ul class="in">
                <li><h2>Admin</h2></li>
                <li><a href="admin-perfil-crear.php">- Perfil -</a></li>
                <li><a href="admin-general-agregar.php">General</a></li>
                <li><a href="admin-notificaciones.php">Notificaciones</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="inner">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-perfil-crear.php">Crear</a>
                    </li>
                    <li class="nav-item">
                        <a style="border: 1px solid grey;" class="nav-link link-dark" aria-current="page" href="admin-perfil-modificar.php">Modificar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-perfil-eliminar.php">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-perfil-usuarios.php">Usuarios</a>
                    </li>
                  </ul>
            </div>
            <div class="content">
                <div class="block">
                    <p><h1>Modificar usuario</h1></p>
                    <p><h3>Seleccione el usuario a modificar</h3></p>
                    <form action="CRUD/editarD.php" method="post" name="form-work">
                    <select name="Nombre" class="form-select" aria-label="Default select example"> 
                    <option selected>Nombres</option>
                    <?php
                         include("conexion.php");
                         $consulta = "SELECT * FROM USUARIO";
                         $ejecutar = sqlsrv_query ($con, $consulta);
      
                         while($fila=sqlsrv_fetch_array($ejecutar)){
                          echo "<option value=".$fila['ID_usuario'].">".$fila['ID_usuario']."</option>";
                         }
                      ?>   
                      
                    </select>
                    <br>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Modificar departamento
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Seleccione el departamento al cual lo quiere mover</p>
                                <form action="CRUD/editarD.php" method="post" name="form-work">
                                <select name="de" class="form-select" aria-label="Default select example">
                                <option selected>NULL</option>
                                <?php
                                  include("conexion.php");
                                  $consulta = "SELECT * FROM Departamento";
                                  $ejecutar = sqlsrv_query ($con, $consulta);

                                   while($fila=sqlsrv_fetch_array($ejecutar)){
                                   $id=$fila['ID_depto'];
                                   echo "<option value=".$fila['ID_depto'].">".$fila['ID_depto']."</option>";
                                 } 

                                ?> 
                                   
                                
                                <!-- <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> -->
                                  </select>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-lg">Modificar</button>
                           
                            <br><br>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Modificar contraseña
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <br>
                                <p>Nueva contraseña</p>
                                
                                <input name="ct" class="form-control form-control-lg" type="text" placeholder="Nueva contraseña" aria-label=".form-control-lg example">
                                <br>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-lg">Modificar</button>  
                            <br><br>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Modificar informacion
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class= "accordion-body">
                                <p>Cambio de informacion personal</p>
                                <form action="CRUD/editarD.php" method="post" name="form-work">
                                <input name="nbb" class="form-control form-control-lg" type="text" placeholder="Nombre completo" aria-label=".form-control-lg example">
                                <br>
                                <button type="submit" class="btn btn-secondary btn-lg">Modificar</button>
                                </form>
                                </form>
                                
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>