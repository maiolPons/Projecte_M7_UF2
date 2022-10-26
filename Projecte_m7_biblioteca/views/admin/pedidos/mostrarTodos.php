<?php
    echo "<table border='1'>";
    foreach ($todosLosPedidos as $pedido) {
        echo "<tr>";
        echo "<td>". $pedido['id'] . "</td>";
        echo "<td>".$pedido['idCliente'] . "</td>";
        echo "<td>".$pedido['ImporteTotal'] . "</td>";
        echo "<td>".$pedido['fechaPeticion'] . "</td>";
        echo "<td>".$pedido['estado'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>