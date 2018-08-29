<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Domain\Model;

/**
 * Description of Participante
 *
 * @author joheras
 */
class Participante {
    private $corredor;
    private $carrera;
    private $dorsal;
    private $tiempo;
    
    function __construct($corredor, $carrera, $dorsal) {
        $this->corredor = $corredor;
        $this->carrera = $carrera;
        $this->dorsal = $dorsal;
    }

    function getCorredor() {
        return $this->corredor;
    }

    function getCarrera() {
        return $this->carrera;
    }

    function getDorsal() {
        return $this->dorsal;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function asignarMarca($tiempo){
        $this->tiempo=$tiempo;
    }
    
}
