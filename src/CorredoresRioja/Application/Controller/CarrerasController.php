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
use Twig_Environment;
/**
 * Description of CarreraController
 *
 * @author joheras
 */
class CarrerasController {
    
    private $carrerasRepository;
    private $organizacionesRepository;
    private $twig;
    
    function __construct(ICarreraRepository $carrerasRepository, IOrganizacionRepository $organizacionesRepository, Twig_Environment $twig) {
        $this->carrerasRepository = $carrerasRepository;
        $this->organizacionesRepository = $organizacionesRepository;
        $this->twig = $twig;
    }

    
    function index(){
        $carreras = $this->carrerasRepository->listarTodasCarreras();
        
        return new Response('Bienvenido.<br/> Carreras por disputar:<br/> ' . implode("<br/>",$carreras) );
        
    }
    
    
    function showCarrera($slug){
        $carrera = $this->carrerasRepository->buscarCarreraPorSlug($slug);
        return new Response($this->twig->render('@corredores/carrera.html.twig',
                array('carrera'=>$carrera)));
        
        
    }
    
    
    function showAll(){
        $carrerasDisputadas = $this->carrerasRepository->listarTodasCarrerasDisputadas();
        $carrerasPorDisputar = $this->carrerasRepository->listarTodasCarrerasPorDisputar();
        return new Response($this->twig->render('@corredores/carreras.html.twig',
                array('carreraspordisputar'=>$carrerasPorDisputar,'carrerasdisputadas'=>$carrerasDisputadas)));
    }
    
    function showOrganizacion($slug){
        $organizacion = $this->organizacionesRepository->buscarOrganizacionPorSlug($slug);
        return new Response($this->twig->render('@corredores/organizacion.html.twig',
                array('organizacion'=>$organizacion)));
        
    }
    
    
    
    
    
}
