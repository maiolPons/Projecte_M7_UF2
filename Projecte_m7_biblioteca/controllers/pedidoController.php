<?php
class PedidoController{
    public function mostrarReservas(){
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $todosLosPedidos = $pedido->mostrarTodosPedidos();
        require_once "views/admin/pedidos/mostrarTodos.php";
    }
    public function mostrarDetalles(){
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $pedido->setId($_GET["idPedido"]);
    }
}
?>