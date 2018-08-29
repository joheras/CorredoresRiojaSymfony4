<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Domain\Repository;
use App\CorredoresRioja\Domain\Model\Corredor;
/**
 *
 * @author joheras
 */
interface ICorredorRepository {
    
    
    function registrarCorredor(Corredor $corredor);
    function actualizarCorredor(Corredor $corredor);
    function eliminarCorredor(Corredor $corredor);
    function buscarCorredorPorDNI($dni);
    function listarCorredores();
    
}
