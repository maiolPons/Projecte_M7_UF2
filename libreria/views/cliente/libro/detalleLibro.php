<?php
    foreach($rows as $row){
        $isbn = $row['ISBN'];
        ?>
        <div id="div1">
            <div>
                <!-- Imagen -->
                <div class="divimagenLibro">
                    <?php
                    if($row['favorito']==1){?>
                        <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn; ?>"><img src="pic/corazonRojo.png" alt=""></a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn; ?>"><img src="pic/corazonNegro.png" alt=""></a>
                        <?php
                    }
                    ?>
                    <img  src="<?php echo $row['foto']?>" alt="">
                </div>
            </div>
            <div>
                <!-- Titulo -->
                <div class="divTituloLibro">
                    <h1><?php echo $row['titulo']?></h1>
                </div>
                <!-- Autor -->
                <div class="divAutorLibro">
                    <p>Autor/a : <?php echo $row['autor'] ?></p>
                </div>
                <!-- Isbn y editorial -->
                <div class="divEditLibro">
                    <p><?php echo $row['ISBN']." / ".$row['editorial']?></p>
                </div>
                <!-- Descripcion -->
                <div class="divDescriLibro">
                    <p><?php echo $row['descripcion']?></p>
                </div>
                <!-- Precio -->
                <div class="divPrecioLibro">
                    <p><?php echo $row['precioUni']."€"?></p>
                </div>
                <!-- Añadir a la cesta -->
                <a href="#">
                    <div class="botonAñadir">
                        <img src="pic/cesta.png" alt="">
                        <p>AÑADIR A LA CESTA</p>
                    </div>
                </a>
            </div>
    <?php 
    }
?>