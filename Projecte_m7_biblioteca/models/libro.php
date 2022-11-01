<?php
require_once 'config/database.php';

class Libro extends Database{
    //atributos
    private $isbn;
    private $titulo;
    private $autor;
    private $editorial;
    private $descripcion;
    private $foto;
    private $stock;
    private $precioUni;
    private $categoria;
    private $destacado;
    private $novedades;
    //gets y sets
    //isbn libro
    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }
    //titulo libro
    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    //autor libro
    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }
    //editorial libro
    public function getEditorial(){
        return $this->editorial;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }
    //descripcion libro
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    //foto libro
    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
    }
    //stock libro
    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }
    //libro precio por unidad 
    public function getPrecioUni(){
        return $this->precioUni;
    }

    public function setPrecioUni($precioUni){
        $this->precioUni = $precioUni;
    }
    //libro categoria
    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    //libro destacado
    public function getDestacado(){
        return $this->destacado;
    }

    public function setDestacado($destacado){
        $this->destacado = $destacado;
    }
    //novedades libro
    public function getNovedades(){
        return $this->novedades;
    }

    public function setNovedades($novedades){
        $this->novedades = $novedades;
    }
    //metodos

    public function mostrarLibros(){
        $sql = "SELECT * FROM libros";
        $rows = $this->db->query($sql);
        return $rows;
    }

    public function infoLibro(){
        $sql = "SELECT * FROM libros INNER JOIN categorias ON idCategoria = id WHERE ISBN = '".$this ->getIsbn()."'";
        $rows = $this->db->query($sql);
        return $rows;
    }
    public function insertar(){
        $sql = "INSERT INTO libros(ISBN,titulo,autor,editorial,descripcion,foto,stock,precioUni,idCategoria,destacado,novedades) VALUES ('".$this->getIsbn()."','".$this->getTitulo()."','".$this->getAutor()."','".$this->getEditorial()."','".$this->getDescripcion()."','".$this->getFoto()."','".$this->getStock()."','".$this->getPrecioUni()."','".$this->getCategoria()."','".$this->getDestacado()."','".$this->getNovedades()."')";
        $rows = $this->db->query($sql);
    }

    public function modificar(){
        $sql = "UPDATE libros SET titulo='".$this->getTitulo()."',autor='".$this->getAutor()."',editorial='".$this->getEditorial()."',descripcion='".$this->getDescripcion()."',stock='".$this->getStock()."',precioUni='".$this->getPrecioUni()."',idCategoria='".$this->getCategoria()."',destacado='".$this->getDestacado()."' WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }

    public function modificarFoto(){
        $sql = "UPDATE libros SET foto='".$this->getFoto()."' WHERE ISBN='".$this->getIsbn()."'";
        $rows = $this->db->query($sql);
    }
}
?>
