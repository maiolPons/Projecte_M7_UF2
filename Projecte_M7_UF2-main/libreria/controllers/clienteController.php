<?php
require_once "models/cliente.php";
class ClienteController{
    //Si los datos son correctos , muestra el menu del administrador
    public function logearCliente(){
        if($_POST){
            $cliente = new Cliente();
            $email = $_POST['email'];
            $passwd = $_POST['passwd'];
            //Si existe el usuario 
            if($cliente->existeCliente($email,$passwd)==true){
                //Crear variables de sessión 
                $_SESSION['cliente'] = $_POST['email'];//Nombre de usuario del admin
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> <!-- cuando entra el cliente , le redirige otra vez a la pagina principal -->
                <?php

            }
            
            else{
                ?>
                <script>alert("Usuario inválido , intenta otra vez!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente">
                <?php
            ?>
                    <?php
            }
        }
        else{
            require_once "views/cliente/login/formCliente.php";
        }
    }

    //Crear Cuenta
    public function crearCliente(){
        require_once "views/cliente/login/altaCliente.php";
        if (isset($_POST['enviar'])){
            $cliente= new Cliente();
            $cliente->setEmail($_POST['email']);
            $cliente->setNombre($_POST['nombre']);
            $cliente->setApellido($_POST['apellidos']);
            $cliente->setDireccion($_POST['direccion']);
            $cliente->setDni($_POST['dni']);
            $cliente->setContrasenya($_POST['passwd']);
            if ($cliente->comprobarDuplicados()){
                ?>
                    <script>alert("Este e-mail o DNI ya han sido registrados.Vuelve a rellenar los campos.")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=crearCliente">
                <?php
            }
            else{
                if ($cliente->anyadirCliente()==true){
                    ?>
                    <script>alert("Usuario creado satisfactoriamente! Ya puedes iniciar sesión")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente">
                    <?php
                }
                else{
                    ?>
                    <script>alert("Algo no ha ido como esperabamos, por favor vuelve a rellenar los campos")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=crearCliente">
                    <?php 
                }
            }
        }

    }
    
    //Cerrar sesion
    public function salir(){
        $salir = new Cliente;
        $salir->salir();
        header("Location: index.php");

    }
}
?>
