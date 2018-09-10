<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\CorredoresRioja\Form\DTO;
/**
 * Description of RegistroCorredorCommand
 *
 * @author joheras
 */
use Symfony\Component\Validator\Constraints as Assert;

class RegistroCorredorCommand {
    
	/**
 	* @Assert\NotBlank()
 	*/
	public $dni;
	/**
 	* @Assert\NotBlank()
 	*/
	public $nombre;
	/**
 	* @Assert\NotBlank()
 	*/
	public $apellidos;
    
	/**
 	* @Assert\NotBlank()
 	* @Assert\Email()
 	*/
	public $email;
    
	/**
 	* @Assert\NotBlank()
 	*/
	public $password;
	/**
 	* @Assert\NotBlank()
 	* @Assert\Date()
 	*/
	public $fechanacimiento;
    
	/**
 	* @Assert\NotBlank()
 	*/
	public $direccion;

        function getDni() {
            return $this->dni;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getApellidos() {
            return $this->apellidos;
        }

        function getEmail() {
            return $this->email;
        }

        function getPassword() {
            return $this->password;
        }

        function getFechanacimiento() {
            return $this->fechanacimiento;
        }

        function getDireccion() {
            return $this->direccion;
        }

        function setDni($dni) {
            $this->dni = $dni;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setFechanacimiento($fechanacimiento) {
            $this->fechanacimiento = $fechanacimiento;
        }

        function setDireccion($direccion) {
            $this->direccion = $direccion;
        }


        
}
