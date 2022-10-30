<?php
require_once 'config/database.php';

class Pedido extends Database{
    //atributos
    private $id;
    private $idCliente;
    private $estado;
    private $fechaCompra;
    //private $fechaEnvio;
    //private $fechaEntrega;
    private $importe;
    //atributo array
    private $libros=[];
    private $cantidades=[];

    //gets y sets
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }
 
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getFechaCompra(){
        return $this->fechaCompra;
    }
    
    public function setFechaCompra($fechaCompra){
        $this->fechaCompra = $fechaCompra;
    }
    /*
    public function getFechaEnvio(){
        return $this->fechaEnvio;
    }
    public function setFechaEnvio($fechaEnvio){
        $this->fechaEnvio = $fechaEnvio;
    }
    public function getFechaEntrega(){
        return $this->fechaEntrega;
    }
    public function setFechaEntrega($fechaEntrega){
        $this->fechaEntrega = $fechaEntrega;
    }
    */
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    //Array de libros
    public function getLibros(){
        return $this->libros;
    }

    public function setLibros($libros){
        $this->libros = $libros;
    }
    //Array cantidad de libros
    public function getCantidades(){
        return $this->cantidades;
    }

    public function setCantidades($cantidades){
        $this->cantidades = $cantidades;
    }
    //metodos
    //muestra todos los pedidos
    public function mostrarTodosPedidos(){
        $sql = "SELECT * FROM pedidos INNER JOIN lineapedidos ON id = idPedido";
        $rows = $this->db->query($sql);
        return $rows;
    }
    public function mostrarDetallesPedidos(){
        $sql = "SELECT * FROM pedidos INNER JOIN lineapedidos ON id = idPedido WHERE id='".$this->getId()."'";
        $rows = $this->db->query($sql);
        foreach ($rows as $info) {
            $this->setidCliente($info["idCliente"]);
            $this->setEstado($info["estado"]);
            $this->setFechaCompra($info["fechaPeticion"]);
            //$this->setFechaEnvio($info[]);
            //$this->setFechaEntrega($info[]);
            $this->setImporte($info["ImporteTotal"]);
            //$this->getLibros();
            //$this->getCantidades();
        }
    }
}

?>