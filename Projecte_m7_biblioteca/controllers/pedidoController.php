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
    public function mostrarDetalles(){
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
        //Crear objeto cliente
        require_once "models/cliente.php";
        $cliente = new Cliente();
        $cliente->setId($pedido->getIdCliente());
        $rows=$cliente->mostrarCliente();
        foreach ($rows as $info) {
            $cliente->setEmail($info["email"]);
            $cliente->setNombre($info["nombre"]);
            $cliente->setApellido($info["apellido"]);
            $cliente->setDni($info["direccion"]);
            $cliente->setDireccion($info["dni"]);
        }
        //crear objeto detalles de pedido
        require_once "models/detallesPedido.php";
        $detallesPedido = new DetallesPedido();
        $rows=$detallesPedido->cogerDetallesPedido($_GET["idPedido"]);
        //Crear objeto libro
        foreach ($rows as $info) {
            require_once "models/libro.php";
            $libro = new Libro();
            $libro->setIsbn($info["ISBN"]);
            $rows=$libro->infoLibro();
            foreach ($rows as $libroInfo) {
                $libro->setTitulo($libroInfo["titulo"]);
                $libro->setAutor($libroInfo["autor"]);
                $libro->setEditorial($libroInfo["editorial"]);
                $libro->setDescripcion($libroInfo["descripcion"]);
                $libro->setFoto($libroInfo["foto"]);
                $libro->setStock($libroInfo["stock"]);
                $libro->setPrecioUni($libroInfo["precioUni"]);
                $libro->setCategoria($libroInfo["idCategoria"]);
                $libro->setDestacado($libroInfo["destacado"]);
                $libro->setNovedades($libroInfo["novedades"]);
            }
            //acavar de rellenar objeto detalles de pedido
            $detallesPedido = new DetallesPedido();
            $detallesPedido->setIdPedido($_GET["idPedido"]);
            $detallesPedido->setLibro($libro);
            $detallesPedido->setCantidad($info["cantidad"]);
            array_push($pedido->getDetallesPedido(), $detallesPedido);
        }
        //mostrar resultado
        require_once "views/admin/pedidos/mostrarDetalles.php";
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
            echo '<meta http-equiv="refresh" content="0;url=index.php?controller=pedido&action=mostrarDetalles&idPedido='. $_POST["idPedido"] .'" />';
        }
    }

}
?>