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
                        <a class="nav-link link-dark" href="admin-perfil-eliminar.php">Eliminar</a>
                    </li>
                    <li class="nav-item">
                        <a style="border: 1px solid grey;" class="nav-link link-dark" aria-current="page" href="admin-perfil-usuarios.php">Usuarios</a>
                    </li>
                  </ul>
            </div>
            <div class="content">
                <div class="block" style="width: 1000px;">
                    <p><h1>Usuarios</h1></p>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Promedio</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Contraseña</th>

                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            include("conexion.php");
                            $consulta = "SELECT * FROM USUARIO";
                            $ejecutar = sqlsrv_query ($con, $consulta);
                            while($fila=sqlsrv_fetch_array($ejecutar)){
    
                            $id=$fila['ID_usuario'];
                            echo "<tr>";
                            echo "<td>".$fila['ID_usuario']."</td>";
                            echo "<td>".$fila['ID_depto']."</td>";
                            echo "<td>".$fila[ 'Nombre']."</td>";
                            echo "<td>".$fila[ 'Edad']."</td>";
                            echo "<td>".$fila['Direccion']."</td>";
                            echo "<td>".$fila['Promedio_R']."</td>";
                            echo "<td>".$fila[ 'Correo']."</td>";
                            echo "<td>".$fila['Estado']."</td>";
                            echo "<td>".$fila['contraseña']."</td>";
                          "</tr>"; 
                        }
                        ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>