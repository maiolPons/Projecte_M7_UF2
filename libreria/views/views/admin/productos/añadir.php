<div>
    <h2>Añadir nuevo libro</h2>
            
    <form class="contenedorForm" action="index.php?controller=libro&action=añadir" method="post" enctype="multipart/form-data">
        <div>
            <p>ISBN</p>
            <input type="text" name="isbn" required>
        </div>
        <div>
            <p>Título</p>
            <input type="text" name="titulo" required>
        </div>
        <div>
            <p>Autor</p>
            <input type="text" name="autor" required>
        </div>
        <div>
            <p>Editroial</p>
            <input type="text" name="editorial" required>
        </div>
        <div>
            <p>Descripción</p>
            <input type="text" name="descri" required>
        </div>
        
        <div>
            <p>Imagen</p>
            <input type="file" name="archivo" value="archivo" style="color:#4959ff" required>
        </div>
        <div>
            <p>Stock</p>
            <input type="number" name="stock" required>

        </div>
        <div>
            <p>Precio unitario</p>
            <input type="number" name="preU" required>
        </div>
        <div>
            <p>Categoria</p>
            <select name="categ" id="categ" required>
                <option value="" selected>Selecciona una categoria</option>
                <?php
                    foreach($rows as $categoria){
                        echo "<option value='".$categoria['id']."'>".$categoria['nombre']."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <p>Destacado</p>
            <input type="radio" name="dest" value="si" required>
            <label for="dest">Sí</label><br>
            <input type="radio" name="dest" value="no">
            <label for="dest">No</label><br>
        </div>
        <div>           
            <p><input type="submit" value="Crear"></p>
        </div>
    </form>
</div>

<div>
    <p><a href="index.php?controller=libro&action=mostrarLibros">Todos los libros</a></p>
    <p><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></p>
</div>