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
        <div class="navegacion"style="background-image: url(resource/fondo.jpg);">
            <ul class="in">
                <li><h2 style="background-image: url(resource/Logo.jpg);"></h2></li>
            </ul>
        </div>
        <div class="container">
            <div class="inner">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <img src="resource/Logo.jpg">
                </ul>
            </div>
            <div class="content">
                <div class="block">
                <form action="CRUD/crear.php" method="post" name="form-work">   
                <p><h1>Crear Usuario</h1></p>
                    <p>Primer Nombre</p>
                    <div class="input-group mb-3">
                    <input   type="text" name="Nombree" class="form-control" placeholder="Primer Nombre" aria-label="Nombre completo" aria-describedby="basic-addon1">
                    </div>
                    <p>Segundo Nombre</p>
                    <div class="input-group mb-3">
                    <input   type="text" name="Nombree2" class="form-control" placeholder="Segundo Nombre" aria-label="Nombre completo" aria-describedby="basic-addon1">
                    </div>
                    <p>Apellido paterno</p>
                    <div class="input-group mb-3">
                    <input   type="text" name="paterno" class="form-control" placeholder="Apellido paterno" aria-label="Nombre completo" aria-describedby="basic-addon1">
                    </div>
                    <p>Apellido materno</p>
                    <div class="input-group mb-3">
                    <input   type="text" name="materno" class="form-control" placeholder="Apellido materno" aria-label="Nombre completo" aria-describedby="basic-addon1">
                    </div>
                    <p>Correo</p>
                    <form action="CRUD/crear.php" method="post" name="form-work">
                    <div class="input-group mb-3">
                        <input type="email" name="Corre" class="form-control" placeholder="Correo" aria-label="Contaseña" aria-describedby="basic-addon1">
                    </div>
                    <p>Contaseña</p>
                    <form action="CRUD/crear.php" method="post" name="form-work">
                    <div class="input-group mb-3">
                        <input type="password" name="Contraseña" class="form-control" placeholder="Contaseña" aria-label="Contaseña" aria-describedby="basic-addon1">
                    </div>
                    <form action="CRUD/crear.php" method="post" name="form-work">
                    <p>Edad</p>
                    <form action="CRUD/crear.php" method="post" name="form-work">
                    <div class="input-group mb-3">
                        <input type="text" name="eda" class="form-control" placeholder="Edad" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <p>Direccion</p>
                    <form action="CRUD/crear.php" method="post" name="form-work">
                    <div class="input-group mb-3">
                        <input type="text" name="dir" class="form-control" placeholder="Direccion" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn btn-outline-secondary">Crear</button>
                    </form>
                    </form>
                    </form>
                    </form>
                    </form>
                    </form>
                    
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>