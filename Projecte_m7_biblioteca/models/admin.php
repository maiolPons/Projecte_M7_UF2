<?php
require_once 'config/database.php';
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
    //logeado
    public function getLogeado(){
        return $this->logeado;
    }

    public function setLogeado($logeado){
        $this->logeado = $logeado;
    }

    //----------------------Metodos--------------
    public function existeAdmin( $user, $pass){
        $sql = "SELECT * FROM administrador WHERE nombreUsuario = '$user' and contraseña='$pass'";
        $ejecutar = $this->db->query($sql);
        $filas = $ejecutar->rowCount();
		//Si el numero de filas es > 0 
        if ($filas>0){
            $existeAdmin = true;
        }
        else{
            $existeAdmin = false;
        }
        return $existeAdmin;
    }

    
    public function salir(){
        session_start();
        session_destroy();
    }

    


}
?>