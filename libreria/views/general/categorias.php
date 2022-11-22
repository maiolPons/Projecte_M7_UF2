<?php
    ?>
    <h1 class="bksh1"><?php echo $nombreCategoria?></h1>
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
    <div class="divMenuVertival">
        <ul class="menuVertival">
            <li class="novedades">
                <img src="pic/libr.png" alt="">
                <a class="messages" href="index.php">Página Principal</a>
            </li>
            <li>
                <img src="pic/news.png" alt="">
                <a class="favoritos" href="index.php">Novedades</a>
            </li>
            <li>
                <img src="pic/perfil.png" alt="">
                <a class="favoritos" href="index.php?controller=cliente&action=logearCliente">Iniciar sesión</a>
            </li>
        </ul>
    </div>
    <div class="books">
        <?php
    foreach($libros as $libro){
        ?>  
            <div class="books">
            <div>
                <!-- Imagen -->
                <div class="divimagenLibro" id="imagenLibro">
                    <?php
                    $id=$libro['idCategoria'];
                    $isbn=$libro['ISBN'];
                    if($libro['favorito']==1){?>
                        <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="x" src="pic/corazonRojo.png" alt=""></a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn ?>&flag=1&nombre=<?php echo $nombreCategoria ?>&id=<?php echo $id ?>"><img class="x" src="pic/corazonNegro.png" alt=""></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
                <?php if ($libros!=''){?>
                <!-- Imagen -->
                <div>
                <a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"> <img  src="<?php echo $libro['foto']?>" alt=""> </a>
                </div>
                <div>
                    <p> <?php echo $libro['titulo']?> </p>
                    <p> Autor/a: <?php echo $libro['autor']?> </p>
                    <p> <?php echo $libro['precioUni']?>€ </p>
                </div>
                <?php } 
                else{
                    echo "a";
                }
                ?>
            </div>
        <?php
    
    }
    ?> </div> <?php
?>