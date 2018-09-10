<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Infrastructure\Repository;

use App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Model\Organizacion;
use App\CorredoresRioja\Domain\Repository\ICarreraRepository;

class InMemoryCarreraRepository implements ICarreraRepository{
    
    private $carreras = [];
    public function __construct() {
        $matuteOrg = new Organizacion(1, "Matute", "Pueblo Matute", "matute@gmail.com", 12345);
        $this->carreras[] = new Carrera(1, "Matutrail", "Carrera Montes Matute", new \DateTime("2018-10-10"), 21, new \DateTime("2018-10-9"),
                500, "matutrail.jpg", $matuteOrg);
        $urOrg = new Organizacion(2, "UR", "Servicio deportes UR", "deportes@unirioja.es", 123456);
        $this->carreras[] = new Carrera(2, "Carrera UR", "Carrera UR", new \DateTime("2018-5-5"), 10, new \DateTime("2018-5-4"),
                1000, "ur.png", $urOrg);
        
    }
    
    
    public function actualizarCarrera(Carrera $carrera) {
        $i=0;
        foreach($this->carreras as $c) {
            if($c->getId()==$carrera->getId()){
               $this->carreras[i]=$carrera;
               return;
            }
            $i++;
        }        
    }

    public function anadirCarrera(Carrera $carrera) {
        $this->carreras[]=$carrera;
    }

    public function buscarCarreraPorSlug($slug) {
        foreach($this->carreras as $c){
            if($c->getSlug()===$slug){
                return $c;
            }
        }
        return false;
    }

    public function eliminarCarrera(Carrera $carrera) {
         $i=0;
        foreach($this->carreras as $c) {
            if($c->getId()==$carrera->getId()){
               unset($this->organizaciones[i]);
               return;
            }
            $i++;
        }
    }

    public function listarCarrerasDisputadasOrganizadasPor(Organizacion $organizacion) {
        $carrerasOrganizadasPor = [];
        foreach($this->carreras as $c) {
            if($c->getOrganizacion()->getId()==$organizacion->getId() &&
                    $c->getFechaCelebracion()<new \DateTime("now")){
               $carrerasOrganizadasPor[]=$c;
            }
        }
        return $carrerasOrganizadasPor;
    }

    public function listarCarrerasPorDisputarOrganizadasPor(Organizacion $organizacion) {
        $carrerasOrganizadasPor =[];
        foreach($this->carreras as $c) {
            if($c->getOrganizacion()->getId()==$organizacion->getId() &&
                    $c->getFechaCelebracion()>new \DateTime("now")){
               $carrerasOrganizadasPor[]=$c;
            }
        }
        return $carrerasOrganizadasPor;
    }

    public function listarTodasCarreras() {
        return $this->carreras;
    }

    public function listarTodasCarrerasDisputadas() {
        $carrerasDisputadas=[];
        foreach($this->carreras as $c) {
            if($c->getFechaCelebracion()<new \DateTime("now")){
               $carrerasDisputadas[]=$c;
            }
        }
        return $carrerasDisputadas;
    }

    public function listarTodasCarrerasPorDisputar() {
        $carrerasPorDisputar=[];
        foreach($this->carreras as $c) {
            if($c->getFechaCelebracion()>new \DateTime("now")){
               $carrerasPorDisputar[]=$c;
            }
        }
        return $carrerasPorDisputar;
    }

}
