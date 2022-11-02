<?php

    //Buscador
    echo "<nav>";

    ?>
    <form action="index.php?controller=categoria&action=mostrarCategorias" method="post">
        <span>Buscador: </span>
        <input type="text" name="nombre">

        <input type="submit" value="Buscar" name="buscar">
    </form>

    <?php
    echo "</nav>";


    echo "<h2> Categorias </h2>";
    echo "<table border=1>";
    echo "<tr>";
    echo "<td> Id </td>";
    echo "<td> Nombre </td>";
    echo "<td> Eliminar </td>";
    echo "</tr>";

    foreach ($categorias as $categoria){
        echo "<tr>";
        echo "<td>" .$categoria['id']. "</td>";
        echo "<td>" .$categoria['nombre']. "</td>";

        $id=$categoria['id'];
        $estado=$categoria['activo'];

        if($categoria['activo']==1){
            echo "<td> <a href='index.php?controller=categoria&action=estadoCategoria&id=$id&estado=$estado'> Desactivar </a> </td>"; 
        }
        else if ($categoria['activo']==0){
            echo "<td> <a href='index.php?controller=categoria&action=estadoCategoria&id=$id&estado=$estado'> Activar </a> </td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<a href='index.php?controller=categoria&action=anyadirCategoria'> Añadir categoría </a>";
?>