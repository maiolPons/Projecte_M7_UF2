<link href="styles/styles.css" rel="stylesheet" type="text/css">
<h1 class="favorTitle">Tus favoritos</h1>
<div class="divMenuVertival">
    <ul class="menuVertival">
        <li>
            <img src="pic/usuario.png" alt="">
            <a class="profile" href="index.php?controller=cliente&action=miPerfil">Mi perfil</a>
        </li>
        <li class="novedades">
            <img src="pic/news.png" alt="">
            <a class="messages" href="index.php">Novedades </a>
        </li>
        <li>
            <img src="pic/corazon.png" alt="">
            <a class="favoritos" href="index.php?controller=libro&action=favoritos">Mis favoritos</a>
        </li>
        <li>
            <img src="pic/sent.png" alt="">
            <a class="pedidos" href="#">Mis pedidos</a>
        </li>
    </ul>
</div>


<div class="zeroRows">
    <?php
    // Si no hay ningun favorito
    echo "<h4>".$num." ARTÍCULOS</h4></br>";
    if($num==0){?>
        <P>Aún no has añadido ningún artículo a tu lista de favoritos. Comienza a comprar y añade tus productos preferidos.</P>
    <?php
    }
    else{
        foreach ($rows as $row) {
            echo "<div class='librosFav'>";
            $isbn = $row['ISBN'];
            ?>
                <a class="alibros" href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>">
                    <div>
                        <img src="pic/corazonRojo.png" alt="" style="width:5%; height:5%;">
                        <img class="imgFav" src="<?php echo $row['foto'] ?>"/>
                    </div>
                    <div>
                        <p><?php echo $row['titulo'] ?></p>
                        <p class="price"><?php echo $row['precioUni']." €" ?></p>
                    </div>
                </a>
        <?php
            echo "</div>";
        }
    }  
    ?>
</div>

