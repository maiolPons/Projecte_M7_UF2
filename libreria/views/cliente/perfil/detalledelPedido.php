<?php
echo "<div class='tablaP'>";
echo "<table>"; ?>
<tr>
    <td></td>
    <td>ISBN</td>
    <td>Titulo</td>
    <td>Autor</td>
    <td>Precio Uni</td>
    <td>Editorial</td>
    <td>Cantidad</td>
</tr> <?php
for($i=0;$i<count($arrayPedido);$i++){
    for($j=0;$j<count($arrayPedido[1]);$j++){
            if ($i!=0){?>
            <tr>
                <td><img src="<?php echo $arrayPedido[$i][$j][5]?>"></td>
                <td><?php echo $arrayPedido[$i][$j][0]?></td>
                <td><?php echo $arrayPedido[$i][$j][1]?></td>
                <td><?php echo $arrayPedido[$i][$j][2]?></td>
                <td><?php echo $arrayPedido[$i][$j][7]?></td>
                <td><?php echo $arrayPedido[$i][$j][3]?></td>
                <td><?php echo $arrayPedido[$i][$j][9]?></td>
            </tr> <?php
        }    }
    }  
    echo "</table>"; 
    echo "</div>";
?>