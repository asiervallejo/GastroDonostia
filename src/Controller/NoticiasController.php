<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Noticias;
use App\Repository\NoticiasRepository;

/**
* @Route("/noticias", name="noticias.")
*/
class NoticiasController extends AbstractController
{
    /**
     * @Route("/crear", name="crear")
     */
    public function crear(Request $request)
    {
    	//Recojo los datos del formulario
    	$titulo=$request->get('txtTitulo');
    	$descripcion=$request->get('txtDescripcion');
    	$imagen=$request->get('txtImagen');
    	//Creo un Platos
    	$noticia= new Noticias();
    	$noticia->setTitulo($titulo);
    	$noticia->setDescripcion($descripcion);
    	$noticia->setImagen($imagen);
    	//Conectamos con la bbdd y acceso a la misma:
        $em=$this->getDoctrine()->getManager();
        //Insertarmos una noticia
        $em->persist($noticia);
        $em->flush();

        return $this->redirect('listar');
    }

    /**
     * @Route("/listar", name="listar")
     */
    public function listar(NoticiasRepository $pr)
    {
    	$noticias=$pr->findAll();

        return $this->render('gastro/noticias.html.twig', [
            'controller_name' => 'NoticiasController',
            'noticias'=>$noticias
        ]);
    }

        /**
     * @Route("/mostrar {id}", name="mostrar")
     */
    public function mostrar($id, NoticiasRepository $pr)
    {
    	$noticia=$pr->find($id);

        return $this->render('noticias/noticia.html.twig', [
            'controller_name' => 'NoticiasController',
            'noticia'=>$noticia
        ]);
    }
}
