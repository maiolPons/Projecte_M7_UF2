
<?php
require_once "models/libro.php";

class LibroController{
    //Muestra todos los libros
    public function mostrarLibros(){
        $libro = new Libro;
        $rows = $libro->mostrarLibros();
        require_once "views/admin/productos/mostrarLibros.php";
    }

    //Funcion que muestra la informacion detallada del libro seleccionado
    public function infoLibro(){
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $libro = new Libro();
            $libro -> setIsbn($isbn);

            $rows = $libro -> infoLibro();
            require_once "views/admin/productos/infoLibro.php";
        }
    }

    public function desactivar(){
        echo "Estoy en desactivar";
    }

    public function formAñadir(){
        //---------Para mostrar las categorias------
        require_once "models/categoria.php";
        $categorias = new Categoria;
        $rows = $categorias->mostrar();
        //-----------------------------------------
        require_once "views/admin/productos/añadir.php";
    }

    public function añadir(){
        if(isset($_POST)){
            require_once "models/libro.php";
            $libro = new Libro();

            //----------------------------Imagen------------------------------------------//
            if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
                $nombreDirectorio = "img/";
                $archivo=$_FILES['archivo']['name'];
                move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreDirectorio .$archivo );
            }
            else{
                print ("No se ha podido subir el fichero\n");
            }
            $ruta = $nombreDirectorio.$archivo;
            //---------------------------------------------------------------------------//

            //------------------Obtener los datos enviados por el formulario-------------//
            $libro->setIsbn($_POST['isbn']);
            $libro->setTitulo($_POST['titulo']);
            $libro->setAutor($_POST['autor']);
            $libro->setEditorial($_POST['editorial']);
            $libro->setDescripcion($_POST['descri']);
            $libro->setFoto($ruta);
            $libro->setStock($_POST['stock']);
            $libro->setPrecioUni($_POST['preU']);
            $libro->setCategoria($_POST['categ']);
            
            if($_POST['dest']=='si'){
                $libro->setDestacado(1);
            }
            $libro->setNovedades(date('Y-m-d'));
            //---------------------------------------------------------------------------//

            $libro->insertar();

            ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=mostrarLibros">
            <?php
        }
    }

    public function formEditar(){
        //Para mostrar las categorias
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];

            require_once "models/categoria.php";
            $categorias = new Categoria();
            $filas = $categorias->mostrar();

            $libro = new Libro();
            $libro -> setIsbn($isbn);
            $rows = $libro -> infoLibro();
            require_once "views/admin/productos/editar.php";
        }
    }

    //Editar datos
    public function editar(){
        if(isset($_POST)){
            $libro = new Libro();

            //------------------Obtener los datos enviados por el formulario-------------//
            $libro->setIsbn($_POST['isbn']);
            $libro->setTitulo($_POST['titulo']);
            $libro->setAutor($_POST['autor']);
            $libro->setEditorial($_POST['editorial']);
            $libro->setDescripcion($_POST['descri']);
            $libro->setStock($_POST['stock']);
            $libro->setPrecioUni($_POST['preU']);
            $libro->setCategoria($_POST['categ']);
            
            if($_POST['dest']=='si'){
                $libro->setDestacado(1);
            }
            //---------------------------------------------------------------------------//
            $libro->modificar();

            ?>
            <!-- ERROR CUANDO QUIERO VOLVER A LA PAGINA "infoLibro"-->
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=mostrarLibros">
            <?php

        }
    }

    //-------------------------------//
    public function formEditFoto(){
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            require_once "views/admin/productos/editFoto.php";
            return $isbn;
        }
    }

    //Editar imagen
    public function editarFoto(){
        if(isset($_POST)){
            

            $libro = new Libro();

            //----------------------------Imagen------------------------------------------//
            if (is_uploaded_file ($_FILES['archivo']['tmp_name'])){
                $nombreDirectorio = "img/";
                $archivo=$_FILES['archivo']['name'];
                move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreDirectorio .$archivo );
            }
            else{
                print ("No se ha podido subir el fichero\n");
            }
            $ruta = $nombreDirectorio.$archivo;
            //---------------------------------------------------------------------------//
            $libro->setIsbn($_POST['isbn']);
            $libro->setFoto($ruta);
            $libro->modificarFoto();
            ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=mostrarLibros">
            <?php
        }
    }

}
?>