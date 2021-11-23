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
            <div class="content">
                <div class="block" style="width: 1000px;">
                    <p><h1>Notificaciones</h1></p>
                    <div class="alert alert-danger" role="alert">
                      "Uriel" ha tenido una mala racha de calificaciones
                    </div>
                    <div class="alert alert-warning" role="alert">
                      "Oscar" siempre rankea mal a Uriel
                    </div>
                    <div class="alert alert-success" role="alert">
                      "Oscar esta teniendo una buenas racha de calificaciones"
                    </div>
                    <div class="alert alert-primary" role="alert">
                      Se ha agregado correctamente el departamento
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>