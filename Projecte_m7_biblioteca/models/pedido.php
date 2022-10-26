<?php
require_once '../config/database.php';

class Pedido extends Database{
    //atributos
    private $id;
    private $correoElectronico;
    private $isbn;
    private $estado;
    private $fechaCompra;
    private $fechaEnvio;
    private $fechaEntrega;

    //gets y sets
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCorreoElectronico(){
        return $this->correoElectronico;
    }
 
    public function setCorreoElectronico($correoElectronico){
        $this->correoElectronico = $correoElectronico;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
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
}

?>