<?php
  if(isset($_COOKIE['IDusr']) || $_COOKIE['IDusr'] > 0){
    $_COOKIE['IDusr'] = -1;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style-index.css">
    <title>Inicio</title>
  </head>
  <body style="background-image: url(resource/fondo.jpg);">
    <div class="wrapper">
        <div class="elem shadow p-3 mb-5 bg-body rounded">
            <form method="POST" action="controller.php">
                <img src="resource/Logo.jpg">
                <div id="alertInvalido" class="alert alert-warning" role="alert" style="display:none">
                  ¡Credenciales inválidas!
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Usuario</label>
                  <input type="text" name="txtUsuario" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" name="txtClave" class="form-control" id="password">
                </div>
                <div>
                <center>
                <button type="button" class="btn btn-dark" onclick="checarFirma()">Entrar</button>
                <div>
                <a href='registro.php'>Registrar</a>
                </center>
                </div>
                
              </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      function checarFirma(){
        var conexion;
        if (window.XMLHttpRequest){
          conexion = new XMLHttpRequest(); 
        }
        conexion.onreadystatechange=function(){  
          if(conexion.readyState==4 && conexion.status==200){
            var resp = conexion.responseText; 
            // alert(resp);
            if(resp > 0){
              // redireccionar
              document.getElementById("alertInvalido").style.display = "none";
              location.href = 'inicio.php';
            }
            else{
              document.getElementById("alertInvalido").style.display = "block";
            }
                      //alert(this.responseText);
          }
        }
      conexion.open("POST", "controller.php", true);
      conexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var usr = document.getElementById("username").value;
        var pswd = document.getElementById("password").value;
        var params = "txtUsuario=" + usr + "&txtClave=" + pswd;
      // alert("Params: " + params);
      conexion.send(params);
        
      }
    </script>
  </body>
</html> 