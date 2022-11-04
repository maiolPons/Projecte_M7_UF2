<?php
    class categoriaController{
        public function mostrarCategorias(){
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

        public function anyadirCategoria(){
            require_once "views/admin/categorias/anyadirCategoria.php";
            if (isset($_POST['envio'])){
                require_once "models/categoria.php";
                $categoria = new Categoria();
                $categoria ->setNombre($_POST['nombre']);
                $categoria ->anyadirCategoria();
            }
        }

        public function estadoCategoria(){
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

        public function editarCategoria(){
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
    }
?>