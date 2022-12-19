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
        <li id="fourth">
            <img src="pic/sent.png" alt="">
            <a class="pedidos" href="index.php?controller=pedido&action=misPedidos">Mis pedidos</a>
        </li>
    </ul>
</div>
<div class="mP">
    <?php
    // Si no hay ningun favorito
    if($num==0){?>
        <P>Actualmente no hay ningún pedido. Puedes empezar a comprar en nuestra web</P>
    <?php
    }
    else{
        foreach ($pedidos as $pedido) {
        echo "<div class='tablaP'>";
            echo "<table>"; ?>
            <tr>
                <td>ID PEDIDO  </td>
                <td>FECHA DE PETICIÓN</td>
                <td>ESTADO</td>
                <td>IMPORTE TOTAL</td>
                <td>DETALLE DEL PEDIDO</td>
            </tr>
            <tr>
                <?php $id=$pedido['id']?>
                <td><?php echo $pedido['id']?></td>
                <td><?php echo $pedido['fechaPeticion']?></td>
                <td><?php echo $pedido['estado']?></td>
                <td><?php echo $pedido['ImporteTotal']?></td>
                <td><a href="index.php?controller=pedido&action=detalledelPedido&id=<?php echo $id ?>">Detalle</a></td>
            </tr> <?php
            echo "</table>"; 
        echo "</div>";
        }
    }  
    ?>
</div>

