<?php
require_once 'config/database.php';

class Cliente extends Database{
    //atributos
    private $id;
    private $email;
    private $nombre;
    private $apellido;
    private $direccion;
    private $dni;
    private $contrasenya;
    //gets y sets
    //id client
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    //email Client
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    //nombre cliente
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    //Apellido cliente
    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    //direccion cliente
    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    //dni cliente
    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }
    //nom d'usuari
    public function getContrasenya(){
        return $this->contrasenya;
    }

    public function setContrasenya($contrasenya){
        $this->contrasenya = $contrasenya;
    }
    //metodos
}