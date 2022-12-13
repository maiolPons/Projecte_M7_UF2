<link href="styles/styles.css" rel="stylesheet" type="text/css">
<h1 class="favorTitle">Mis favoritos</h1>
<div class="divMenuVertival">
    <ul class="menuVertival">
        <li id="buscador">
            <!---------------- Buscador ---------------->
            <form class="buscMenu" action="index.php?controller=libro&action=favoritos" method="post">
                <div class="">
                    <input type="text" name="busc" id="search2" placeholder="  Busca en tus favoritos..." />
                    <input class="lupaMenu" alt="" src="pic/lupa.png" type="image" />
                </div>
            </form>
		<!-- ---------------------------------------- -->
        </li>
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
            <a class="pedidos" href="index.php?controller=pedido&action=misPedidos">Mis pedidos</a>
        </li>
    </ul>
</div>
<?php
    echo "<h4 class='numFav'>".$num." ARTÍCULOS</h4></br>";
?>

<div class="zeroRows">
    <?php
    // Si no hay ningun favorito
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
                        <!-- <img src="pic/corazonRojo.png" alt="" style="width:5%; height:5%;"> -->
                        <img class="imgFav" src="<?php echo $row['foto'] ?>"/>
                    </div>
                </a>
                    <div>
                        <p class="tituloLibro"><?php echo $row['titulo'] ?></p>
                        <p class="price"><?php echo $row['precioUni']." €" ?></p>
                        <a href="index.php?controller=libro&action=NoEsFavorito&fav=1&isbn=<?php echo $isbn; ?>"><img src="pic/corazonRojo.png" alt="" id="corazon"></a>
                    </div>
        <?php
            echo "</div>";
        }
    }  
    ?>
</div>

