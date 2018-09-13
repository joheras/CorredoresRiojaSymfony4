<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Tests;

/**
 * Description of CargaPaginasTest
 *
 * @author joheras
 */
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CargaPaginasTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client =  static::createClient();
        $crawler = $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/corredores/carreras'),
            array('/corredores/carrera/carrera-ur'),
            array('/corredores/organizacion/matute'),
            array('/corredores/login'),
            array('/corredores/registro'),
        );
    }
}

