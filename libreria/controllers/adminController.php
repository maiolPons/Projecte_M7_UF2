<?php
require_once "models/admin.php";
class AdminController{
    //Si los datos son correctos , muestra el menu del administrador
    public function logear(){
        if($_POST){
            $admin = new Admin();
            $user = $_POST['nom'];
            $passwd = $_POST['passwd'];
            //Si existe el usuario 
            if($admin->existeAdmin($user,$passwd)==true){
                //Crear variables de sessión 
                $_SESSION['admin'] = $_POST['nom'];//Nombre de usuario del admin
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> 
                <?php

            }
            
            else{
                ?>
                <script>alert("Usuario inválido , intenta otra vez!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear">
                <?php
            ?>
                    <?php
            }
        }
        else{
            require_once "views/admin/login/formAdmin.php";
        }
    }
    
    //Cerrar sesion
    public function salir(){
        $salir = new Admin;
        $salir->salir();
        header("Location: index.php?controller=admin&action=logear");

    }
}
?>