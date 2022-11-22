<div class="divMenuVertival">
    <ul class="menuVertival">
    <?php
        if(isset($_SESSION['cliente'])){?>

            <li id="first">
                <img src="pic/usuario.png" alt="">
                <a class="profile" href="index.php?controller=cliente&action=miPerfil">Mi perfil</a>
            </li>
            <li id="second">
                <img src="pic/news.png" alt="">
                <a class="messages" href="index.php">Novedades </a>
            </li>
            <li id="third">
                <img src="pic/corazon.png" alt="">
                <a class="favoritos" href="index.php?controller=libro&action=favoritos">Mis favoritos</a>
            </li>
            <li id="fourth">
                <img src="pic/sent.png" alt="">
                <a class="pedidos" href="#">Mis pedidos</a>
            </li>
        <?php
        }
        else{?>
            <li id="first">
                <img src="pic/libr.png" alt="">
                <a class="messages" href="index.php">Página Principal</a>
            </li>
            <li id="second">
                <img src="pic/news.png" alt="">
                <a class="favoritos" href="index.php">Novedades</a>
            </li>
            <li id="third">
                <img src="pic/perfil.png" alt="">
                <a class="favoritos" href="index.php?controller=cliente&action=logearCliente">Iniciar sesión</a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
  <?php
    foreach($rows as $row){
        $isbn = $row['ISBN'];
        ?>
        <div id="div1">
            <div>
                <!-- Imagen -->
                <div class="divimagenLibro">
                    <?php
                    if(isset($_SESSION['cliente'])){
                        if($row['favorito']==1){?>
                            <a href="index.php?controller=libro&action=NoEsFavorito&isbn=<?php echo $isbn; ?>"><img src="pic/corazonRojo.png" alt=""></a>
                            <?php
                        }
                        else{?>
                            <a href="index.php?controller=libro&action=esFavorito&isbn=<?php echo $isbn; ?>"><img src="pic/corazonNegro.png" alt=""></a>
                            <?php
                        }
                    }
                    ?>
                    <img src="<?php echo $row['foto']?>" alt="">
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