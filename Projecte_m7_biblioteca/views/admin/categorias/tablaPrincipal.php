<?php
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

        //kaboom
        echo "<td> <a href='index.php?controller=categoria&action=desactivarCategoria&id='".$categoria['id']."'&estado='".$categoria['activo']."'> Desactivar </a> </td>"; 
        echo "</tr>";
    }
    echo "</table>";

    echo "<a href='index.php?controller=categoria&action=anyadirCategoria'> Añadir categoría </a>";
?>