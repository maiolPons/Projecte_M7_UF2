<?php
echo "<p>Tabla pedidos</p>";
    echo "<table border='1'>";
    foreach ($todosLosPedidos as $pedido) {
        echo "<tr>";
        echo "<td>". $pedido['id'] . "</td>";
        echo "<td>".$pedido['idCliente'] . "</td>";
        echo "<td>".$pedido['ImporteTotal'] . "</td>";
        echo "<td>".$pedido['fechaPeticion'] . "</td>";
        echo "<td>".$pedido['estado'] . "</td>";
        echo "<td><a href='index.php?controller=pedido&action=mostrarDetalles&idPedido=". $pedido["id"] ."'>Abrir detalles</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>