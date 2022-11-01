
<h1 class="prod">Productos</h1>
<!-- Imrimir la tabla con los datos de todos los libros -->
<table>
    <tr>
        <th>ISBN</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Stock</th>
        <th>Precio unidad</th>
        <th>Categoria</th>
        <th>Destacado</th>
        <th>Editar</th>
        <th>Desactivar</th>

    <?php
    
    foreach ($rows as $row) {
        $isbn = $row['ISBN'];
        //var_dump($row);
        echo $row['activo'];
        echo "<tr>";
            echo "<td>". $row['ISBN'] . "</td>";
            echo "<td>".$row['titulo'] . "</td>";
            echo "<td>".$row['autor'] . "</td>";
            echo "<td>".$row['editorial'] . "</td>";
            echo "<td>".$row['descripcion'] . "</td>";
            ?>
            <td>
                <img class="pic" src="<?php echo $row['foto'] ?>"/>
            </td>
            <?php
            echo "<td>".$row['stock'] . "</td>";
            echo "<td>".$row['precioUni'] . "</td>";
            echo "<td>".$row['nombre'] . "</td>";

            if($row['destacado']==0){
                echo "<td>No</td>";
            }
            else{
                echo "<td>Sí</td>"; 
            }
            
            echo "<td>
                <a href='index.php?controller=libro&action=formEditar&isbn=$isbn'><img class='edit' src='pic/datos.png'></a>
                <a href='index.php?controller=libro&action=formEditFoto&isbn=$isbn'><img class='edit' src='pic/image.png'></a>
            </td>";

            if($row['activo']==1){?>
                <td>
                    <a href="#"><img class="edit" src="pic/activado.png"></a>
                </td><?php
            }
            else{?>
                <td>
                    <a href="#"><img class="edit" src="pic/desactivado.png"></a>
                </td><?php
            }
        echo "</tr>";
    }
    ?>
    </tr>
</table>

<div class="addProd">
    <p><a href="index.php?controller=libro&action=formAñadir">Añadir nuevo producto</a></p>
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
    <p><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></p>
</div>