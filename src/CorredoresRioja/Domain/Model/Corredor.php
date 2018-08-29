<?php
namespace App\CorredoresRioja\Domain\Model;

class Corredor
{
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $salt;
    private $direccion;
    private $fechaNacimiento;
    
    function __construct($dni, $nombre, $apellidos, $email, $password, $direccion, $fechaNacimiento) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->direccion = $direccion;
        $this->salt="";
        $this->fechaNacimiento = $fechaNacimiento;
    }

        
    
    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    
    public function __toString(){
        return $this->nombre . ' ' . $this->apellidos;        
    }
    
    
    
    
}

