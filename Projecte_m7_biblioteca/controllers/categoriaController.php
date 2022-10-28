<?php
    class categoriaController{
        public function mostrarCategorias(){
            require_once "models/categoria.php";
            $categoria = new Categoria();
            $categorias = $categoria->mostrarDatosCategorias();
            require_once "views/admin/categorias/main.php";
        }
    }
?>