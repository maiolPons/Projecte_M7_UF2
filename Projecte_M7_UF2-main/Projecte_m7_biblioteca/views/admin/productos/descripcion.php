<?php
    foreach ($rows as $row) {
        $isbn = $row['ISBN'];
        echo "<h1 class='title'>".$row['titulo']."</h1>";
        ?>
        <img class="picD" src="<?php echo $row['foto'] ?>"/>
        <?php
        echo "<p class='descr'>".$row['descripcion']."</p>";
        
    }
?>

<div>
    <p><a href="index.php?controller=libro&action=infoLibro&isbn=<?php echo $isbn ?>">Detalles libro</a></p>
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
    <p><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></p>
</div>