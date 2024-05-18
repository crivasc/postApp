
<?php require_once '../config/index.php'; 
if(defined('SITE_NAME')){
    echo 'Acceso no autrizado!';
    header('location:./bienvenida.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Definir Conexion</title>
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/icofont/icofont.min.css">
</head>
<body>
   <div class="container">
    <div class="text-center my-2">
            <i class="icofont-automation" style="font-size:6rem; color:rgb(2 67 71);"></i>
    </div>
     <h5 class="text-center">Definir Conexion a la BD</h5>
    <div class="my-4 inserData d-flex justify-content-center">
   
    <form action="sources/installer.php" method="post">
        <label for="siteName">Nombre del sitio:</label>
        <input class="form-control" type="text" name="siteName" id="siteName" required><br>

        <label for="dbHost">Host de la BD:</label>
        <input class="form-control" type="text" name="dbHost" id="dbHost" required><br>

        <label for="dbName">Nombre de la BD:</label>
        <input class="form-control" type="text" name="dbName" id="dbName" required><br>

        <label for="dbUser">Usuario de la BD:</label>
        <input class="form-control" type="text" name="dbUser" id="dbUser" required><br>

        <label for="dbPass">Password de la BD:</label>
        <input class="form-control" type="password" name="dbPass" id="dbPass"><br>

        <button class="btn btn-small col-12 btn-primary" type="submit">Instalar</button>
    </form>
    </div>
   </div>
</body>
</html>