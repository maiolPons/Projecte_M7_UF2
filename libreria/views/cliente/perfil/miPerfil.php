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
<?php
foreach($rows as $row){
    $nombre = $row['nombre'];
}
echo "<h1 class='miPerfil'>Hola " . $nombre ."!</h1>";
?>
<div class="formPerfil">
    
        <div class="editProfile">
            <a href="#">Editar mis datos</a>
        </div>

        <div>
            <p>EMAIL  </p>
            <p><?php echo $row['email']?></p>
        </div>

        <div>
            <p>NOMBRE </p>
            <p><?php echo $row['nombre']?></p>
        </div>
       
        <div>
            <p>APELLIDO </p>
            <p><?php echo $row['apellido']?></p>
        </div>

        <div>
            <p>DNI</p>
            <p><?php echo $row['dni']?></p>
        </div>

        <div>
            <p>DIRECCIÓN </p>
            <p><?php echo $row['direccion']?></p>
        </div>
</div>


