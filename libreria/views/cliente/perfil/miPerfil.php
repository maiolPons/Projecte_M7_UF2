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


<div class="formAltaUsu">
    <h1 class="favorTitle">Mi perfil</h1>
    <form class="loginAltaUsu">
        <?php
        foreach($rows as $row){?>
            <input type="email" name="email" value=<?php echo $row['email']?> readonly> 
            <input type="text" name="nombre" value=<?php echo $row['nombre']?> readonly> 
            <input type="text" name="apellidos" value=<?php echo $row['apellido']?> readonly> 
            <input type="text" name="direccion" value=<?php echo $row['direccion']?> readonly> 
            <input type="text" name="dni" value=<?php echo $row['dni']?> readonly> 
            <div>
                <a href="#">Modificar mi perfil</a>
            </div>
            <?php
        }
        ?>
    </form>
</div>
