<?php
require_once 'config/database.php';

class DetallesPedido extends Database{
    //atributos
    private $idPedido;
    private $libro;
    private $cantidad;
    //gets y sets
    public function getIdPedido(){
        return $this->idPedido;
    }
    public function setIdPedido($idPedido){
        $this->libro = $idPedido;
    }
    public function getLibro(){
        return $this->libro;
    }
    public function setLibro($libro){
        $this->libro = $libro;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    //metodos
    public function cogerDetallesPedido($id){
        $sql = "SELECT * FROM pedidos INNER JOIN lineapedidos ON id = idPedido WHERE id='".$id."'";
        $rows = $this->db->query($sql);
        return($rows);
    }
}