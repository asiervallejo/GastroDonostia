<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Bebidas;
use App\Repository\BebidasRepository;

/**
* @Route("/bebidas", name="bebidas.")
*/
class BebidasController extends AbstractController
{
    /**
     * @Route("/crear", name="crear")
     */
    public function crear(Request $request)
    {
    	//Recojo los datos del formulario
    	$nombre=$request->get('txtNombre');
    	$descripcion=$request->get('txtDescripcion');
    	$precio=$request->get('txtPrecio');
    	$imagen=$request->get('txtImagen');
    	//Creo un Platos
    	$bebida= new Bebidas();
    	$bebida->setNombre($nombre);
    	$bebida->setDescripcion($descripcion);
    	$bebida->setPrecio($precio);
    	$bebida->setImagen($imagen);
    	//Conectamos con la bbdd y acceso a la misma:
        $em=$this->getDoctrine()->getManager();
        //Insertarmos una noticia
        $em->persist($bebida);
        $em->flush();

        return $this->redirect('listar');
    }

    /**
     * @Route("/listar", name="listar")
     */
    public function listar(BebidasRepository $pr)
    {
    	$bebidas=$pr->findAll();

        return $this->render('gastro/bebidas.html.twig', [
            'controller_name' => 'BebidasController',
            'bebidas'=>$bebidas
        ]);
    }

        /**
     * @Route("/mostrar {id}", name="mostrar")
     */
    public function mostrar($id, BebidasRepository $pr)
    {
    	$bebida=$pr->find($id);

        return $this->render('bebidas/bebida.html.twig', [
            'controller_name' => 'BebidasController',
            'bebida'=>$bebida
        ]);
    }
}
