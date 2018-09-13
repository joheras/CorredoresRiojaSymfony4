<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRioja\Application\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\CorredoresRioja\Domain\Repository\ICarreraRepository;
use App\CorredoresRioja\Domain\Repository\IOrganizacionRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\CorredoresRioja\Domain\Repository\ICorredorRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\CorredoresRioja\Form\CorredorType;
use App\CorredoresRioja\Security\User\CorredorUser;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\CorredoresRioja\Domain\Repository\IParticipanteRepository;
/**
 * Description of CarreraController
 *
 * @author joheras
 */
class CarrerasController extends AbstractController {

    private $carrerasRepository;
    private $organizacionesRepository;
    private $corredoresRepository;
    private $twig;
    private $encoder;
    private $session;
    private $router;
    private $participantesRepository;
    
    

    

    function __construct(IParticipanteRepository $participantesRepository, ICarreraRepository $carrerasRepository, IOrganizacionRepository $organizacionesRepository, Twig_Environment $twig, UserPasswordEncoderInterface $encoder, SessionInterface $session, ICorredorRepository $corredoresRepository, UrlGeneratorInterface $router) {
        $this->carrerasRepository = $carrerasRepository;
        $this->organizacionesRepository = $organizacionesRepository;
        $this->twig = $twig;
        $this->encoder = $encoder;
        $this->session = $session;
        $this->corredoresRepository = $corredoresRepository;
        $this->router = $router;
        $this->participantesRepository = $participantesRepository;

    }

    function index() {
        $carreras = $this->carrerasRepository->listarTodasCarreras();

        return new Response('Bienvenido.<br/> Carreras por disputar:<br/> ' . implode("<br/>", $carreras));
    }

    function showCarrera($slug) {
        $carrera = $this->carrerasRepository->buscarCarreraPorSlug($slug);
//        return new Response($this->twig->render('@corredores/carrera.html.twig', array('carrera' => $carrera)));
        return $this->render('@corredores/carrera.html.twig', array('carrera' => $carrera));
    }

    function showAll() {
        
        $carrerasDisputadas = $this->carrerasRepository->listarTodasCarrerasDisputadas();
        $carrerasPorDisputar = $this->carrerasRepository->listarTodasCarrerasPorDisputar();
        return new Response($this->twig->render('@corredores/carreras.html.twig', array('carreraspordisputar' => $carrerasPorDisputar, 'carrerasdisputadas' => $carrerasDisputadas)));
    }

    function showOrganizacion($slug) {
        $organizacion = $this->organizacionesRepository->buscarOrganizacionPorSlug($slug);
        return new Response($this->twig->render('@corredores/organizacion.html.twig', array('organizacion' => $organizacion)));
    }

    public function registro(Request $peticion) {
        $form = $this->createForm(CorredorType::class);
        $form->handleRequest($peticion);
        if ($form->isSubmitted() && $form->isValid()) {
// Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
            $corredorUser = new CorredorUser("", "", "");
// Codificamos la contraseña del corredor
            $password = $this->encoder->encodePassword($corredorUser, $corredor->getPassword());
            $corredor->saveEncodedPassword($password);
// Lo almacenamos en nuestro repositorio de corredores
            $this->corredoresRepository->registrarCorredor($corredor);
// Creamos un mensaje flash para mostrar al usuario que 
// se ha registrado correctamente
            $this->session->getFlashBag()->add('info', '¡Enhorabuena, ' .
                    $corredor->getNombre() . ' te has registrado en CorredoresPorLaRioja!');
// Reedirigimos al usuario a la portada 
            return $this->redirect($this->router->generate('index'));
        }
        return $this->render("@corredores/registro.html.twig", array('formulario' => $form->createView()));
    }

    public function misCarreras() {

        $corredor = $this->getUser();
        $carrerasDisputadas = $this->participantesRepository->listarCarrerasDisputadasPorCorredor($corredor->getUsername());
        $carrerasPorDisputar = $this->participantesRepository->listarCarrerasPorDisputarPorCorredor($corredor->getUsername());
        return new Response($this->twig->render('@corredores/miscarreras.html.twig', array('carreraspordisputar' => $carrerasPorDisputar, 'carrerasdisputadas' => $carrerasDisputadas)));
    }

    public function login(AuthenticationUtils $authenticationUtils) {

// get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

// last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
                        '@corredores/login.html.twig', array(
// last username entered by the user
                    'last_username' => $lastUsername,
                    'error' => $error,
                        )
        );
    }

    public function perfil(Request $peticion) {
        $corredorUser = $this->getUser();
        $corredor = $this->corredoresRepository->buscarCorredorPorDNI($corredorUser->getUsername());


        $form = $this->createForm(CorredorType::class, $corredor);
        $form->handleRequest($peticion);
        if ($form->isSubmitted() && $form->isValid()) {
// Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
            $corredorUser = new CorredorUser("", "", "");
// Codificamos la contraseña del corredor
            $password = $this->encoder->encodePassword($corredorUser, $corredor->getPassword());
            $corredor->saveEncodedPassword($password);
// Lo almacenamos en nuestro repositorio de corredores
            $this->corredoresRepository->actualizarCorredor($corredor);
        }
        
        return $this->render("@corredores/perfil.html.twig", array('formulario' => $form->createView()));
    }

}
