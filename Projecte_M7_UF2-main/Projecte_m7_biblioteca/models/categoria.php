<?php
require_once '../config/database.php';

class Pedido extends Database{
    //atributos
    private $id;
    private $nombre;
    //gets y sets
    //id categoria
    public function getNomUsuari(){
        return $this->nomUsuari;
    }

    public function setNomUsuari($nomUsuari){
        $this->nomUsuari = $nomUsuari;
    }
    //nombre categoria
    public function getNomUsuari(){
        return $this->nomUsuari;
    }

    public function setNomUsuari($nomUsuari){
        $this->nomUsuari = $nomUsuari;
    }
    //metodos
}