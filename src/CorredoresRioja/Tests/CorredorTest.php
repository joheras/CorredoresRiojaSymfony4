<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Tests;
use App\CorredoresRioja\Domain\Model\Corredor;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Validator\Validation;

class CorredorTest  extends TestCase{

    private $validator;
    
    protected function setUp(){
        $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }
    
    // Validamos el nombre
    public function testValidarNombre(){
        $corredor = new Corredor(1, "pepe", "perez", "peperez@gmail.com", "pepe", "Calle falsa", new \DateTime('1980-08-08'));
        
        $listaErrores = $this->validator->validate($corredor);
        $this->assertGreaterThan(0,$listaErrores->count(),
                'El nombre no puede coincidir con la contraseña');
        
        $error = $listaErrores[0];
        $this->assertEquals('La contraseña no puede ser la misma que tu nombre',
                $error->getMessage());
    }
}
