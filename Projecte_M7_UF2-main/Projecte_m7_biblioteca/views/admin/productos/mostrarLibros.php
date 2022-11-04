<!-- Vista que muestra todos los libros con solo la imagen , el titula , el autor y el precio -->

<h1 class="prod">Productos</h1>

<!-- Formulario del buscador -->
<form class="buscador" action="index.php?controller=libro&action=mostrarLibros" method="post">
    Buscador: 
    <input type="text" name="busc">
    <input type="submit" value="Buscar">
</form>

<div class="contenedor">

    <?php
    
    foreach ($rows as $row) {
            $isbn = $row['ISBN'];
            ?>
            <div class="libros">
                <a class="alibros" href="index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">
                    <div>
                        <img class="pict" src="<?php echo $row['foto'] ?>"/>
                    </div>
                    <div>
                        <p><?php echo $row['titulo'] . " (titulo)"?></p>
                        <p><?php echo $row['autor'] . " (autor)"?></p>
                        <p><?php echo $row['precioUni']." €" ?></p>
                    </div>
                </a>
            </div>
    <?php
    }
    
    ?>      
</div>

<p><a href="index.php?controller=libro&action=formAñadir">Añadir nuevo producto</a></p>
<p><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></p>



