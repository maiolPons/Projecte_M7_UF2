<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
    <title>Administrador</title>
</head>
<body>
    <?php
        session_start();
        require_once "autoload.php";

        //--------------------------------------------------------//
        if(isset($_SESSION['admin'])){
            require_once "views/admin/commonAdmin/headerAdmin.html";
        }
        else{
            require_once "views/admin/commonAdmin/header.html";
        }
        //--------------------------------------------------------//

        if (isset($_GET['controller'])){
            $nombreController = $_GET['controller']."Controller";
        }
        else{
            $nombreController="";
        }
        if (class_exists($nombreController)){
            $controlador = new $nombreController(); 
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            echo "<p>placeHolder</p>";
        }
            $controlador->$action();   
        }else{
            echo "<h1>Pagina principal</h1>";
        }
        ?>
        <?php
        //--------------------------------------------------------//
        if(isset($_SESSION['admin'])){
            require_once "views/admin/commonAdmin/footerAdmin.html";
        }
        else{
            require_once "views/admin/commonAdmin/footer.html";
        }
        //--------------------------------------------------------//
    ?>
</body>
</html>