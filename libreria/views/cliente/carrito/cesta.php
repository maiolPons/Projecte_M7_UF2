<?php
    if(isset($_SESSION['carritoCompra']) && count($_SESSION['carritoCompra'])!=0){
        $importe = [];
        $numProducts = count($_SESSION['carritoCompra']);
        ?>
        <div class="cesta">
            <div class="divLibrosC">
                <?php
                echo "<p class='pr'>Precio</p>";
                echo "<h1>Cesta</h1>";
                for($i = 0 ; $i<count($arrayInfo) ; $i++){
                    $infoLibros = $arrayInfo[$i];
                    foreach($infoLibros as $info){
                        $isbn = $_SESSION['carritoCompra'][$i][0];
                        ?>
                        <div class="libroCarrito">
                            <div>
                                <div><a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"><img src="<?php echo $info['foto'] ?>"></a></div>
                                <div class="divTitu"><a href="index.php?controller=libro&action=detalleLibro&isbn=<?php echo $isbn; ?>"><?php echo $info['titulo'] ?></a></div>
                                <div class="divPreu"><?php echo $info['precioUni']."€" ?></div>
                            </div>
                            <div class="last">
                                <div class="aut">por <?php echo $info['autor']." - ".$isbn?></div>
                                <form action="index.php?controller=pedido&action=verCarrito&isbnC=<?php echo $isbn ?>" method="post">
                                    <input type="number" value="<?php echo $_SESSION['carritoCompra'][$i][1] ?>" name="cantidadLibroCesta" id="inputCantidad" min="1" max="<?php echo $info['stock']?>"required>
                                    <input type="submit" value="Actualizar carrito">
                                </form>
                                <div class="divA"><a href="index.php?controller=pedido&action=eliminarCarrito&isbn=<?php echo $isbn?>">Eliminar</a></div>
                            </div>
                            <?php
                            if($info['stock'] <= 10){
                                echo "<div><p>Quedan solo ".$info['stock']."</p></div>";
                            }
                            $cantidad = $_SESSION["carritoCompra"][$i][1];
                            $sub = $cantidad*$info['precioUni'];
                            ?>
                            <div>
                                <p>Subtotal: <?php echo $sub ?>€</p>
                            </div>
                        </div>
                    <?php
                    array_push($importe , (int)$sub);
                    }
                }
                ?>
            </div>
            <div class="divCompra">
                <!-- Aqui va la parte donde hay el importe total y el botton de comprar-->
                <h3>Resumen del pedido</h3>
                <p style="margin-left:20px">Total <?php echo "(".$numProducts." productos): "?><span><?php echo array_sum($importe)."€"?></span></p>
                <form action="" method="post">
                    <div class="divButton"><a href="index.php?controller=pedido&action=comprar">Comprar</a></div>
                </form>
            </div>

        </div>
        <?php
    }

    else{
        echo "Cesta vacia";
    }
    
?>
