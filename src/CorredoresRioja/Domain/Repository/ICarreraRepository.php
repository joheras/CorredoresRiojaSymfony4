<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Domain\Repository;
use App\CorredoresRioja\Domain\Model\Carrera;
use App\CorredoresRioja\Domain\Model\Organizacion;
/**
 * Description of ICarreraRepository
 *
 * @author joheras
 */
interface ICarreraRepository {
    
    
    function anadirCarrera(Carrera $carrera);
    function actualizarCarrera(Carrera $carrera);
    function eliminarCarrera(Carrera $carrera);
    function buscarCarreraPorSlug($slug);
    function listarCarrerasDisputadasOrganizadasPor(Organizacion $organizacion);
    function listarCarrerasPorDisputarOrganizadasPor(Organizacion $organizacion);
    function listarTodasCarreras();
    function listarTodasCarrerasDisputadas();
    function listarTodasCarrerasPorDisputar();
    
    
}
