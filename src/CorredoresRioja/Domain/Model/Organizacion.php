<?php
namespace App\CorredoresRioja\Domain\Model;

use App\CorredoresRioja\Utils\Utils;

class Organizacion
{
    private $id;
    private $nombre;
    private $descripcion;
    private $email;
    private $password;
    private $salt;
    private $slug;
    
    
    
    function __construct($id, $nombre, $descripcion, $email, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->email = $email;
        $this->password = $password;
        $this->slug = Utils::getSlug($nombre);
        $this->salt="";
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function getSlug() {
        return $this->slug;
    }

    public function __toString() {
        return $this->nombre;
    }

    
}

