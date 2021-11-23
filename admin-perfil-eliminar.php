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
                        <a class="nav-link link-dark" href="admin-perfil-modificar.php">Modificar</a>
                    </li>
                    <li class="nav-item">
                        <a style="border: 1px solid grey;" class="nav-link link-dark" aria-current="page" href="admin-perfil-eliminar.php">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-perfil-usuarios.php">Usuarios</a>
                    </li>
                  </ul>
            </div>
            <div class="content">
                <div class="block">
                    <p><h1>Eliminar usuario</h1></p>
                    <p><h3>Seleccione el usuario a eliminar</h3></p>
                    <form action="CRUD/elimi.php" method="post" name="form-work">
                    <select name="mal" class="form-select" multiple aria-label="multiple select example">
                       
                        <?php
                                  include("conexion.php");
                                  $consulta = "SELECT * FROM USUARIO";
                                  $ejecutar = sqlsrv_query ($con, $consulta);

                                   while($fila=sqlsrv_fetch_array($ejecutar)){
                                   $id=$fila['ID_usuario'];
                                   echo "<option value=".$fila['ID_usuario'].">".$fila['ID_usuario']."</option>";
                                 } 

                        ?> 
                      </select>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          <p>¿Seguro que decea eliminar?</p>
                        </label>
                      </div>
                      <button type="submit" class="btn btn-outline-secondary">Eliminar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>