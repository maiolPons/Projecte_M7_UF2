<?php
require_once 'config/database.php';

class Categoria extends Database{
    //atributos
    private $id;
    private $nombre;
    //gets y sets
    //id categoria
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    //nombre categoria
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //metodos
    public function mostrarDatosCategorias(){
        $sql = "SELECT * FROM categorias";
        $rows = $this->db->query($sql);
        return $rows;
    }
}