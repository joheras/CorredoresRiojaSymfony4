<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Domain\Repository;
use App\CorredoresRioja\Domain\Model\Participante;
use App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Model\Corredor;
/**
 *
 * @author joheras
 */
interface IParticipanteRepository {
    
    function inscribirCorredorEnCarrera(Corredor $corredor, Carrera $carrera);
    function listarParticipantesCarrera(Carrera $carrera);
    function listarCarrerasDisputadasPorCorredor($username);
    function listarCarrerasPorDisputarPorCorredor($username);
    function comprobarCorredorInscritoCarrera(Corredor $corredor, Carrera $carrera);
    function actualizarTiempoCorredorCarrera(Corredor $corredor, Carrera $carrera, $tiempo);
    function eliminarParticipacion(Participante $participante);
    
    
}
