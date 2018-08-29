<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Infrastructure\Repository;
use App\CorredoresRioja\Domain\Model\Participante;
use App\CorredoresRioja\Domain\Model\Corredor;
use App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Repository\IParticipanteRepository;


class InMemoryParticipanteRepository implements IParticipanteRepository{
   
  
    public function actualizarTiempoCorredorCarrera(Corredor $corredor, Carrera $carrera, $tiempo) {
        
    }

    public function comprobarCorredorInscritoCarrera(Corredor $corredor, Carrera $carrera) {
        
    }

    public function eliminarParticipacion(Participante $participante) {
        
    }

    public function inscribirCorredorEnCarrera(Corredor $corredor, Carrera $carrera) {
        
    }

    public function listarCarrerasDisputadasPorCorredor(Corredor $corredor) {
        
    }

    public function listarCarrerasPorDisputarPorCorredor(Corredor $corredor) {
        
    }

    public function listarParticipantesCarrera(Carrera $carrera) {
        
    }

}
