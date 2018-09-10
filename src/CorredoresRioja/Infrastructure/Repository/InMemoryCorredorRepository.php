<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Infrastructure\Repository;
use App\CorredoresRioja\Domain\Repository\ICorredorRepository;
use App\CorredoresRioja\Domain\Model\Corredor;
/**
 * Description of InMemoryCorredorRepository
 *
 * @author joheras
 */
class InMemoryCorredorRepository implements ICorredorRepository {
    
    private $corredores;
    
    public function __construct() {
        $this->corredores[] = new Corredor(1, "Pepe", "Perez", "pepe.perez@gmail.com", '1234', "C. Falsa", new \DateTime("15-08-1985"));
        $this->corredores[] = new Corredor(2, "Maria", "Lopez", "maria.lopez@gmail.com", '5678', "C. Falsa", new \DateTime("10-08-1985"));
    }

    
    
    public function actualizarCorredor(Corredor $corredor) {
        $i=0;
        foreach($this->corredores as $c) {
            if($c->getDni()==$corredor->getDni()){
               $this->corredores[i]=$corredor;
               return;
            }
            $i++;
        }
    }

    public function buscarCorredorPorDNI($dni) {
        
        foreach($this->corredores as $corredor){
            if($corredor->getDni()==$dni){
                return $corredor;
            }
        }
        return false;
        
    }

    public function eliminarCorredor(Corredor $corredor) {
        $i=0;
        foreach($this->corredores as $c) {
            if($c->getDni()==$corredor->getDni()){
               unset($this->corredores[i]);
               return;
            }
            $i++;
        }
    }

    public function listarCorredores() {
        return $this->corredores;
    }

    public function registrarCorredor(Corredor $corredor) {
        $this->corredores[]=$corredor;
    }

}
