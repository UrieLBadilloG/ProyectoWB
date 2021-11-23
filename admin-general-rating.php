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
                <li><a href="admin-perfil-crear.php">Perfil</a></li>
                <li><a href="admin-general-agregar.php">- General -</a></li>
                <li><a href="admin-notificaciones.php">Notificaciones</a></li>

            </ul>
        </div>
        <div class="container">
            <div class="inner">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-general-agregar.php">Agregar dep</a>
                    </li>
                    <li class="nav-item">
                        <a style="border: 1px solid grey;" class="nav-link link-dark" aria-current="page" href="admin-general-rating.php">Rating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="admin-general-reportes.php">Reportes</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div style="width: 800px;" class="block">
                    <p><h1>Rating departamentos</h1></p>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Rank</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Designer</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                  </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Trapeador</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                                  </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    <p><h1>Rating personas</h1></p>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dep</th>
                            <th scope="col">Rank</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Oscar</td>
                            <td>Designer</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 55%">75%</div>
                                  </div>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">1</th>
                            <td>Uriel</td>
                            <td>Trapeador</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%">25%</div>
                                  </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>