<?php
class categoriaController{
    public function mostrarCategorias(){
        if (isset ($_SESSION['admin'])){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            if(isset($_POST['buscar'])){
                    $categoria -> setNombre($_POST['nombre']);
                    $categorias = $categoria->Buscador();
            }
            else{
                    $categorias = $categoria->mostrarDatosCategorias();
            }
            require_once "views/admin/categorias/tablaPrincipal.php";
        }
        else{
            LogAdmin();
        }
    }

        public function anyadirCategoria(){
            if (isset ($_SESSION['admin'])){
                require_once "views/admin/categorias/anyadirCategoria.php";
                if (isset($_POST['envio'])){
                    require_once "models/categoria.php";
                    $categoria = new Categoria();
                    $categoria ->setNombre($_POST['nombre']);
                    $categoria ->anyadirCategoria();
                }
            }
            else{
                LogAdmin();
            }
        }

        public function estadoCategoria(){
            if (isset ($_SESSION['admin'])){
                if (isset($_GET['id'])){
                    require_once "models/categoria.php";
                    $categoria = new Categoria();
                    $categoria ->setId($_GET['id']);
                    if($_GET['estado']==0){
                        $categoria ->setActivo(1);
                    }
                    if($_GET['estado']==1){
                        $categoria ->setActivo(0);
                    }
                    $categoria ->estadoCategoria();

                    //redirect
                    ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=categoria&action=mostrarCategorias">
                    <?php
                } 
            }
            else{
                LogAdmin();
            }
        }

        public function editarCategoria(){
            if (isset ($_SESSION['admin'])){
                require_once "views/admin/categorias/editarCategoria.php";
                if (isset ($_POST['envio'])){
                    require_once "models/categoria.php";
                    $categoria = new Categoria();
                    $categoria -> setNombre($_POST['nombre']);
                    $categoria->setId($_GET['id']);
                    $categoria ->editarCategoria();
                    ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=categoria&action=mostrarCategorias">
                    <?php
                }
            }
            else{
                LogAdmin();
            }
        }


        //Mostrar categorias en header

        public function categoriasHeader(){
            if (isset($_SESSION['cliente'])){
                require_once "models/categoria.php";
                $categoria = new Categoria();
                $categorias=$categoria->mostrarDatosCategorias();
                require_once "views/admin/commonAdmin/headerCliente.php";
            }
            else{
                LogCliente();
            }
        }

}


?>