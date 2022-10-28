
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "autoload.php";
        require_once "views/admin/commonAdmin/header.html";

        require_once "views/admin/general/menu.php";
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
            echo "No existe el controlador";
        }

        require_once "views/admin/commonAdmin/footer.html";
    ?>
</body>
</html>