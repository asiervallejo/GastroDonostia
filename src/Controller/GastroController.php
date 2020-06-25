<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GastroController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->render('gastro/inicio.html.twig', [
            'controller_name' => 'GastroController',
        ]);
    }

	/**
     * @Route("/platos", name="platos")
     */
    public function platos()
    {
        return $this->render('gastro/platos.html.twig', [
            'controller_name' => 'GastroController',
        ]);
    }
    /**
     * @Route("/bebidas", name="bebidas")
     */
    public function bebidas()
    {
        return $this->render('gastro/bebidas.html.twig', [
            'controller_name' => 'GastroController',
        ]);
    }    

    /**
     * @Route("/noticias", name="noticias")
     */
    public function noticias()
    {
        return $this->render('gastro/noticias.html.twig', [
            'controller_name' => 'GastroController',
        ]);
    }    

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto()
    {
        return $this->render('gastro/contacto.html.twig', [
            'controller_name' => 'GastroController',
        ]);
    }        
}
