<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;
use App\CorredoresRioja\Domain\Repository\ICarreraRepository;
use App\CorredoresRioja\Domain\Repository\IOrganizacionRepository;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of CarreraController
 *
 * @author joheras
 */
class CarrerasController {
    
    private $carrerasRepository;
    private $organizacionesRepository;
    
    
    function __construct(ICarreraRepository $carrerasRepository, IOrganizacionRepository $organizacionesRepository) {
        $this->carrerasRepository = $carrerasRepository;
        $this->organizacionesRepository = $organizacionesRepository;
    }

    
    function index(){
        $carreras = $this->carrerasRepository->listarTodasCarreras();
        
        return new Response('Bienvenido.<br/> Carreras por disputar:<br/> ' . implode("<br/>",$carreras) );
        
    }
    
    
    function showCarrera($slug){
        $carrera = $this->carrerasRepository->buscarCarreraPorSlug($slug);
        return new Response($carrera);
        
        
    }
    
    
    function showAll(){
        $carrerasDisputadas = $this->carrerasRepository->listarTodasCarrerasDisputadas();
        $carrerasPorDisputar = $this->carrerasRepository->listarTodasCarrerasPorDisputar();
        
        return new Response('Carreras Disputadas: ' . implode("<br/>",$carrerasDisputadas) . 
                '<br/>Carreras por Disputar: ' . implode("<br/>",$carrerasPorDisputar) );
    }
    
    function showOrganizacion($slug){
        $organizacion = $this->organizacionesRepository->buscarOrganizacionPorSlug($slug);
        return new Response($organizacion);
        
    }
    
    
    
    
    
}
