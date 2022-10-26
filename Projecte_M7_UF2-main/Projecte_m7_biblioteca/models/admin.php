<?php
require_once '../config/database.php';

class Admin extends Database{
    //atributos
    private $nomUsuari;
    private $contrasenya;
    private $logeado;
    //gets y sets
    //nom d'usuari
    public function getNomUsuari(){
        return $this->nomUsuari;
    }

    public function setNomUsuari($nomUsuari){
        $this->nomUsuari = $nomUsuari;
    }
    //contrasenya
    public function getContrasenya(){
        return $this->contrasenya;
    }

    public function setContrasenya($contrasenya){
        $this->contrasenya = $contrasenya;
    }
    //logedo
    public function getLogeado(){
        return $this->logeado;
    }

    public function setLogeado($logeado){
        $this->logeado = $logeado;
    }
    //metodos
}
?>