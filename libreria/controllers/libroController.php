
<?php

    require_once "models/libro.php";
    class LibroController{
//**************************************************************************************************************************************************************//
        //Muestra todos los libros
        public function mostrarLibros(){
            if(isset($_SESSION['admin'])){
                $libro = new Libro;
                if(isset($_POST["busc"])){
                    $rows = $libro->mostrarBuscador($_POST["busc"]);
                }else{
                    $rows = $libro->mostrarLibros();
                }
                require_once "views/admin/productos/mostrarLibros.php";
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
//**************************************************************************************************************************************************************//
        //Funcion que muestra la informacion detallada del libro seleccionado
        public function infoLibro(){
            if(isset($_SESSION['admin'])){
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro -> setIsbn($isbn);
                    $rows = $libro -> infoLibro();
                    require_once "views/admin/productos/infoLibro.php";
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
//**************************************************************************************************************************************************************//
        public function mostrarDescripcion(){
            if(isset($_SESSION['admin'])){
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro -> setIsbn($isbn);
        
                    $rows = $libro -> infoLibro();
                    require_once "views/admin/productos/descripcion.php";
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
//**************************************************************************************************************************************************************//
        public function formAñadir(){
            if(isset($_SESSION['admin'])){
                //---------Para mostrar las categorias------
                require_once "models/categoria.php";
                $categorias = new Categoria;
                $rows = $categorias->mostrar();
                //-----------------------------------------
                require_once "views/admin/productos/añadir.php";
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
//**************************************************************************************************************************************************************//
        // Insertar nuevo libro
        public function añadir(){
            if(isset($_SESSION['admin'])){
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
                    <script>alert("Producto añadido correctamente!")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=mostrarLibros">
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
    
//**************************************************************************************************************************************************************//
        //Mostrar el formulario para editar los datos de libro
        public function formEditar(){
            if(isset($_SESSION['admin'])){
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
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }

//**************************************************************************************************************************************************************//
        //Editar datos
        public function editar(){
            if(isset($_SESSION['admin'])){
                if(isset($_POST)){
                    $isbn = $_POST['isbn'];
                    $libro = new Libro();
        
                    //------------------Obtener los datos enviados por el formulario-------------//
                    $libro->setIsbn($isbn);
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
                    <script>alert("Producto modifcado correctamente!")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn  ?>">
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
    
//**************************************************************************************************************************************************************//
        public function formEditFoto(){
            if($_SESSION['admin']){
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    require_once "views/admin/productos/editFoto.php";
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }

//**************************************************************************************************************************************************************//
        //Editar imagen
        public function editarFoto(){
            if(isset($_SESSION['admin'])){
                if(isset($_POST)){
                    $isbn = $_POST['isbn'];
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
                    $libro->setIsbn($isbn);
                    $libro->setFoto($ruta);
                    $libro->modificarFoto();
                    ?>
                    <script>alert("Imagen modifcada correctamente!")</script>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }

//**************************************************************************************************************************************************************//
        public function activar(){
            if(isset($_SESSION['admin'])){
                if(isset($_GET)){
                    require_once "models/libro.php";
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro->setIsbn($isbn);
                    $libro->activarLibro();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }
    
//**************************************************************************************************************************************************************//
        public function desactivar(){
            if(isset($_SESSION['admin'])){
                if(isset($_GET)){
                    require_once "models/libro.php";
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro->setIsbn($isbn);
                    $libro->desactivarLibro();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
                <?php
            }
        }

//**************************************************************************************************************************************************************//
        //-----------------------------------CLIENTE----------------------------------------------//
        
        public function favoritos(){
            if($_SESSION['cliente']){
                $libro = new Libro();
                $rows = $libro->favoritos();
                $num = $rows->rowCount();
                require_once "views/cliente/libro/favoritos.php";
            }
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente"> 
                <?php
            }
        }
//**************************************************************************************************************************************************************//
        public function esFavorito(){
            if(isset($_SESSION['cliente'])){
                if(isset($_GET)){
                    require_once "models/libro.php";
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro->setIsbn($isbn);
                    $libro->esFavorito();

                    /***** DIANA *****/
                    if(isset($_GET['flag'])){
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=infoCategorias&isbn=<?php echo $isbn?>"> 
                        <?php
                    }
                    else{
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn?>"> 
                        <?php
                    }
                    
                }
            }

            
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente"> 
                <?php
            }

        }

//**************************************************************************************************************************************************************//
        public function NoEsFavorito(){
            if(isset($_SESSION['cliente'])){
                if(isset($_GET)){
                    require_once "models/libro.php";
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro->setIsbn($isbn);
                    $libro->NoesFavorito();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn?>"> 
                    <?php
                }
            }
            //Si el admin no esta logeado , no puede ver las paginas
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente"> 
                <?php
            }
        }

//**************************************************************************************************************************************************************//
        public function detalleLibro(){
            if($_SESSION['cliente']){
                if(isset($_GET['isbn'])){
                    $isbn = $_GET['isbn'];
                    $libro = new Libro();
                    $libro -> setIsbn($isbn);
                    $rows = $libro -> infoLibro();
                    require_once "views/cliente/libro/detalleLibro.php";
                }
            }
            else{
                ?>
                <script>alert("Tienes que logearte primero para ver esta página!")</script>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=cliente&action=logearCliente"> 
                <?php
            }
            
        }


/*******************************************************************************************************************************************************************/
    //Mostrar libros por Categorias

    public function infoCategorias(){
        $nombreCategoria=$_GET['nombre'];
        $idCategoria=$_GET['id'];
        require_once "models/libro.php";
        $libro = new Libro();
        $libros=$libro -> categoriasLibros($idCategoria);
        require_once "views/general/categorias.php";

    }

    }
?>