<div class="divMenuVertival">
    <ul class="menuVertival">
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
    </ul>
</div>
<div class="zeroRows">
    <?php
    // Si no hay ningun favorito
    if($num==0){?>
        <P>Actualmente no hay ningún pedido. Puedes empezar a comprar en nuestra web</P>
    <?php
    }
    else{
        foreach ($pedidos as $pedido) {
            echo "<div class='librosFav'>";
            echo $pedido['id'];
            echo $pedido['fechaPeticion'];
            echo $pedido['estado'];
            echo $pedido['ImporteTotal'];
            echo "</div>";
        }
    }  
    ?>
</div>


