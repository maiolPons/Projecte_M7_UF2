
<div>
    <h2>Editar producto</h2>
            
    <form class="contenedorForm" action="index.php?controller=libro&action=editar" method="post" enctype="multipart/form-data">
        <?php
        foreach($rows as $row){?>
        <div>
            <p>ISBN</p>
            <input type="text" name="isbn" value="<?php echo $row['ISBN']?>" readonly required>
        </div>
        <div>
            <p>Título</p>
            <input type="text" name="titulo" value="<?php echo $row['titulo']?>" required>
        </div>
        <div>
            <p>Autor</p>
            <input type="text" name="autor" value="<?php echo $row['autor']?>" required>
        </div>
        <div>
            <p>Editroial</p>
            <input type="text" name="editorial" value="<?php echo $row['editorial']?>" required>
        </div>
        <div>
            <p>Descripción</p>
            <textarea type="text" name="descri" required><?php echo $row['descripcion']?></textarea>
        </div>
        
        <div>
            <p>Stock</p>
            <input type="number" name="stock" value="<?php echo $row['stock']?>" required>

        </div>
        <div>
            <p>Precio unitario</p>
            <input type="number" name="preU" value="<?php echo $row['precioUni']?>" required>
        </div>
        <div>
            <p>Categoria</p>
            <select name="categ" id="categ" required>
                <option value="<?php $row['nombre'] ?>" selected><?php echo $row['nombre'] ?></option>
                <?php
                    foreach($filas as $categoria){
                        echo "<option value='".$categoria['id']."'>".$categoria['nombre']."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <p>Destacado</p>
            <input type="radio" name="dest" value="si" required>
            <label for="dest">Sí</label>
            <input type="radio" name="dest" value="no">
            <label for="dest">No</label><br>
        </div>
        <div>           
            <p><input type="submit" value="Modificar"></p>
        </div>

        <?php
        }
        ?>
    </form>
</div>

<div>
    <p><a href="index.php?controller=libro&action=infoLibro">Detalles libro</a></p>

    <!-- ***************** NO ME SALE NADA************************* -->
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
    <p><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></p>
</div>
