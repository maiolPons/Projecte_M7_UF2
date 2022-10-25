<?php
require_once 'ModeloBase.php';

class Pedidos extends ModeloBase{
    //atributos
    private $id;
    private $correoElectronico;
    private $isbn;
    private $estado;
    private $fechaCompra;
    private $fechaEnvio;
    private $fechaEntrega;
    //constructor
    public function __construct() {
		parent::__construct();
	}
    //gets y sets
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }
 
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;

        return $this;
    }

    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }
}

?>