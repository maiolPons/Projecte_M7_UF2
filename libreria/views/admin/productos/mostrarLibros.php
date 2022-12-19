<!-- Vista que muestra todos los libros con solo la imagen , el titula , el autor y el precio -->
<a href="index.php?controller=libro&action=formAñadir"><img class="plus" src="pic/plus.png" alt=""></a>

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
            echo "<a href='index.php?controller=libro&action=infoLibro&isbn=".$row["ISBN"]."'><div class='displayItem'><img src='".$row["foto"]."'><hr><p>".$row["titulo"]."</p><hr><p>Autor: ".$row["autor"]."</p><p>Editorial: ".$row["editorial"]."</p><p>Precio: ".$row["precioUni"]."€</p></div></a>";
        }
    ?>
</div>


