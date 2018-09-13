<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Tests;

use App\CorredoresRioja\Domain\Model\Organizacion;
use App\CorredoresRioja\Domain\Model\Carrera;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
/**
 * Description of CarreraRepositoryTest
 *
 * @author joheras
 */
class CarreraRepositoryTest extends KernelTestCase {

    private $repository;
    
     protected function setUp(){

        static::bootKernel();
        $this->repository = static::$kernel->getContainer()->get('icarrerarepository');
        
    }
    
    public function testAnadirCarrera() {
        $org1 = new Organizacion("Ayuntamiento Matute", "El ayuntamiento de matute", "matute@gmail.com", "matute",1234);
        $carrera = new Carrera(3, "Carrera Montes Anguiano", "Primera carrera por los montes de Anguiano", new \DateTime("2015-06-15"), "10 km", new \DateTime("2015-06-14"), 50, "anguiano.jpg", $org1);
        $this->repository->anadirCarrera($carrera);
        
        $this->assertNotNull($this->repository->buscarCarreraPorSlug('carrera-montes-anguiano'));
        
    }

     public function testCarrerasPorDisputar() {
        $carrerasNoDisputadas = $this->repository->listarTodasCarrerasPorDisputar();
        foreach ($carrerasNoDisputadas as $carrera) {
            $this->assertTrue($carrera->getFechacelebracion()->format("Y-m-d")> (new \DateTime('now'))->format("Y-m-d"));
        }
    }



    public function testCarrerasEsCarrerasDisputadasYNoDisputadas() {
        $carreras = $this->repository->listarTodasCarreras();
        $carrerasNoDisputadas = $this->repository->listarTodasCarrerasDisputadas();
        $carrerasDisputadas = $this->repository->listarTodasCarrerasPorDisputar();

        foreach ($carrerasDisputadas as $carrera) {
            $this->assertContains($carrera, $carreras);
        }
        foreach ($carrerasNoDisputadas as $carrera) {
            $this->assertContains($carrera, $carreras);
        }
    }

}
