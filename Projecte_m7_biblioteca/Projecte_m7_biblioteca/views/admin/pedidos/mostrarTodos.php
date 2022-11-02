<?php
echo "<div>";
    echo "<h3>Tabla pedidos</h3>";
    echo "<div>";
        ?>
        <form action="index.php?controller=pedido&action=mostrarReservas" method="post">
            <span>Buscador: </span>
            <input type="text" name="query">
            <span>Todos: </span>
            <input type="radio" name="estado" value="todos" checked>
            <span>Pendiente: </span>
            <input type="radio" name="estado" value="pendiente">
            <span>Enviado: </span>
            <input type="radio" name="estado" value="enviado">
            <input type="submit" value="Buscar">
        </form>
        <?php
    echo "</div>";
    echo "<div>";
        echo "<table>";
        echo "<tr><th>Id Pedido</th><th>Dni Cliente</th><th>Email Cliente</th><th>Importe Total</th><th>Fecha Peticion</th><th>Estado del Pedido</th><th>Mostrar Detalles</th></tr>";
        $id="0";
        
        foreach ($todosLosPedidos as $pedido) {
            if($pedido['id'] != $id){
                $id=$pedido["id"];
                echo "<tr>";
                echo "<td>". $pedido['id'] . "</td>";
                echo "<td>".$pedido['dni'] . "</td>";
                echo "<td>".$pedido['email'] . "</td>";
                echo "<td>".$pedido['ImporteTotal'] . "</td>";
                echo "<td>".$pedido['fechaPeticion'] . "</td>";
                echo "<td>".$pedido['estado'] . "</td>";
                echo "<td><a href='index.php?controller=pedido&action=mostrarDetalles&idPedido=". $pedido["id"] ."'>Abrir detalles</a></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    echo "</div>";
echo "</div>";
?>