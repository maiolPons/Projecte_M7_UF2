<?php
    class categoriaController{
        public function mostrarCategorias(){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            $categorias = $categoria->mostrarDatosCategorias();
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

        public function desactivarCategoria(){
            require_once "models/categoria.php";
            var_dump($_GET);
        }
    }
?>
