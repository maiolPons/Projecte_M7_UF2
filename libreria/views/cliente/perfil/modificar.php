<div class="modUsu">
    <h1 class="favorTitle">Mi perfil</h1>
    <form class="loginAltaUsu" action="index.php?controller=cliente&action=modificarPerfilI" method="POST">
        <?php
        foreach($rows as $row){?>
            <p>Nombre:</p>
            <input type="text" name="nombre" value="<?php echo $row['nombre']?>"> 
            <p>Apellidos:</p>
            <input type="text" name="apellidos" value="<?php echo $row['apellido']?>"> 
            <p>Dirección:</p>
            <input type="text" name="direccion" value="<?php echo $row['direccion']?>" > 
            <p>Actualizar contraseña:</p>
            <input type="password" name="contrasenya"> 
   

            <div>
                <input type="submit" name="enviar" value="enviar">
            </div>
            <?php
        }
        ?>
    </form>
</div>