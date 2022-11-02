    <?php
    require_once "models/admin.php";
    class AdminController{
        //Si los datos son correctos , muestra el menu del administrador
        public function logear(){
            if($_POST){
                $admin = new Admin();
                //Si existe el usuario 
                if($admin->existeAdmin($_POST['nom'],$_POST['passwd'])){
                    //Crear variables de sessión 
                    $_SESSION['nom'] = $_POST['nom'];//Nombre de usuario del admin
                    $_SESSION['passwd'] = $_POST['passwd'];//La contraseña
                    
                    //Mostrar el menu
                    require_once "views/admin/general/menu.php";
                }
                
                else{
                    echo "usuario invalido";
                ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php"> 
                     <?php
                }
            }
            else{
                require_once "views/admin/login/formAdmin.php";
            }
        }

        public function mostrarMenu(){
            require_once "views/admin/login/menu.php";
        }
        
        //Cerrar sesion
        public function salir(){
            $salir = new Admin;
            $salir->salir();
            header("Location: index.php");

        }
    }
    ?>
