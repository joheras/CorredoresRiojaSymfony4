<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Infrastructure\Repository;
use App\CorredoresRioja\Domain\Model\Organizacion;
use App\CorredoresRioja\Domain\Repository\IOrganizacionRepository;
/**
 * Description of InMemoryOrganizacionRepository
 *
 * @author joheras
 */
class InMemoryOrganizacionRepository implements IOrganizacionRepository {

    private $organizaciones;
    
    public function __construct() {
        $this->organizaciones[] = new Organizacion(1, "Matute", "Pueblo Matute", "matute@gmail.com", 12345);
        $this->organizaciones[] = new Organizacion(2, "UR", "Servicio deportes UR", "deportes@unirioja.es", 123456);
        
        
    }

    
    
    public function actualizarOrganizacion(Organizacion $organizacion) {
 $i=0;
        foreach($this->organizaciones as $org) {
            if($org->getNombre()==$organizacion->getNombre()){
               $this->organizaciones[i]=$organizacion;
               return;
            }
            $i++;
        }        
    }

    public function buscarOrganizacionPorEmail($email) {
        
        foreach($this->organizaciones as $org){
            if($org->getEmail()===$email){
                return $org;
            }
        }
        return false;
    }

    public function buscarOrganizacionPorSlug($slug) {
    foreach($this->organizaciones as $org){
            if($org->getSlug()===$slug){
                return $org;
            }
        }
        return false;
        
    }

    public function eliminarOrganizacion(Organizacion $organizacion) {
         $i=0;
        foreach($this->organizaciones as $org) {
            if($org->getId()==$organizacion->getId()){
               unset($this->organizaciones[i]);
               return;
            }
            $i++;
        }
    }

    public function listarOrganizaciones() {
        return $this->organizaciones;
    }

    public function registrarOrganizacion(Organizacion $organizacion) {
        $this->organizaciones[]=$organizacion;
    }

}
