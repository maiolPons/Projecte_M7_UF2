<?php
class PedidoController{
    //mostrar listado de reservas
    public function mostrarReservas(){
        require_once "models/pedido.php";
        $pedido = new Pedido();
        if(isset($_POST["query"])){
            $pedido->setEstado($_POST["estado"]);
            $todosLosPedidos = $pedido->mostrarBuscador($_POST["query"]);
        }else{
            $todosLosPedidos = $pedido->mostrarTodosPedidos();
        }
        
        require_once "views/admin/pedidos/mostrarTodos.php";
    }
    //mostrar detalles del pedido seleccionado
    public function mostrarDetalles($id){
        $arrayPedido = array();
        $arrayLibros = array();
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $pedido->setId($id);
        $rows=$pedido->mostrarPedido();
        foreach ($rows as $info) {
            $peidoInfo = array();
            $pedido->setIdCliente($info["idCliente"]);
            array_push($peidoInfo,$id,$info["idCliente"],$info["estado"],$info["fechaPeticion"],$info["ImporteTotal"]);
            array_push($arrayPedido,$peidoInfo);
        }
        
        //Crear objeto cliente
        require_once "models/cliente.php";
        $cliente = new Cliente();
        $cliente->setId($pedido->getIdCliente());
        $rows=$cliente->mostrarCliente();
        foreach ($rows as $info) {
            $ClienteInfo = array();
            array_push($ClienteInfo,$id,$info["email"],$info["nombre"],$info["apellido"],$info["direccion"],$info["dni"]);
            array_push($arrayPedido,$ClienteInfo);
        }
        //crear objeto detalles de pedido
        require_once "models/detallesPedido.php";
        $detallesPedido = new DetallesPedido();
        $rows=$detallesPedido->cogerDetallesPedido($id);
        //recoger datos libros
        foreach ($rows as $info) {
            require_once "models/libro.php";
            $libro = new Libro();
            $libro->setIsbn($info["ISBN"]);
            $rows=$libro->infoLibro();
            $librosInfo = array();
            foreach ($rows as $libroInfo) {
                array_push($librosInfo,$info["ISBN"],$libroInfo["titulo"],$libroInfo["autor"],$libroInfo["editorial"],$libroInfo["descripcion"],$libroInfo["foto"],$libroInfo["stock"],$libroInfo["precioUni"],$libroInfo["idCategoria"]);
            }
            //acavar de rellenar objeto detalles de pedido
            array_push($librosInfo,$info["cantidad"]);
            array_push($arrayLibros,$librosInfo);
        }
        array_push($arrayPedido,$arrayLibros);
        return($arrayPedido);
    }
    //muestra formulario para cambiar el estado 
    public function cambiarEstado(){
        //crear objeto pedido
        require_once "models/pedido.php";
        $pedido = new Pedido();
        $pedido->setId($_GET["idPedido"]);
        $rows=$pedido->mostrarPedido();
        foreach ($rows as $info) {
            $pedido->setidCliente($info["idCliente"]);
            $pedido->setEstado($info["estado"]);
            $pedido->setFechaCompra($info["fechaPeticion"]);
            $pedido->setImporte($info["ImporteTotal"]);
        }
        //mostrar formulario
        require_once "views/admin/pedidos/cambiarEstado.php";
    }
    //confirma y cambia el estado del pedido
    public function confirmarEstado(){
        if(isset($_POST["confirmacion"])){
            if($_POST["confirmacion"]=="si"){
                require_once "models/pedido.php";
                $pedido = new Pedido();
                $pedido->setId($_POST["idPedido"]);
                if($_POST["estadoPedido"]=="pendiente"){
                    $pedido->cambiarEstadoPedido("enviado");
                }else{
                    $pedido->cambiarEstadoPedido("pendiente");
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=index.php?controller=pedido&action=mostrarReservas" />';
        }
    }

}
?>