<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Platos;
use App\Repository\PlatosRepository;
    /**
     * @Route("/platos", name="platos.")
     */
class PlatosController extends AbstractController
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
    	$plato= new Platos();
    	$plato->setNombre($nombre);
    	$plato->setDescripcion($descripcion);
    	$plato->setPrecio($precio);
    	$plato->setImagen($imagen);
    	//Conectamos con la bbdd y acceso a la misma:
        $em=$this->getDoctrine()->getManager();
        //Insertarmos una noticia
        $em->persist($plato);
        $em->flush();

        return $this->redirect('listar');
    }

    /**
     * @Route("/listar", name="listar")
     */
    public function listar(PlatosRepository $pr)
    {
    	$platos=$pr->findAll();

        return $this->render('gastro/platos.html.twig', [
            'controller_name' => 'PlatosController',
            'platos'=>$platos
        ]);
    }

        /**
     * @Route("/mostrar {id}", name="mostrar")
     */
    public function mostrar($id, PlatosRepository $pr)
    {
    	$plato=$pr->find($id);

        return $this->render('platos/plato.html.twig', [
            'controller_name' => 'PlatosController',
            'plato'=>$plato
        ]);
    }

        /**
     * @Route("/formPlatos", name="formPlatos")
     */
    public function formPlatos()
    {
        return $this->render('platos/formPlatos.html.twig', [
            'controller_name' => 'PlatosController',
        ]);
    }
            /**
     * @Route("/eliminar {id}", name="eliminar")
     */
    public function eliminar($id, PlatosRepository $pr)
    {
        $plato=$pr->find($id);

        $em=$this->getDoctrine()->getManager();

        $em->remove($plato);

        $em->flush();


        return $this->redirect($this->generateUrl('platos.listar'));
    }

                /**
     * @Route("/editar {id}", name="editar")
     */
    public function editar($id, PlatosRepository $pr)
    {
        $plato=$pr->find($id);
        return $this->render('platos/formEditarPlato.html.twig', [
            'controller_name' => 'PlatosController',
            'plato'=>$plato
        ]);

    }

       /**
     * @Route("/editarPlato", name="editarPlato")
     */
    public function editarPlato(Request $request, PlatosRepository $pr)
    {
        $id=$request->get('txtId');
        $plato=$pr->find($id);
        $plato->setNombre($request->get('txtNombre'));
        $plato->setDescripcion($request->get('txtDescripcion'));
        $plato->setPrecio($request->get('txtPrecio'));
        $plato->setImagen($request->get('txtImagen'));

        //Conectamos con la bbdd y acceso a la misma:
        $em=$this->getDoctrine()->getManager();
        //Insertarmos una noticia
        $em->persist($plato);
        $em->flush();


        return $this->redirect($this->generateUrl('platos.listar'));
    }




}
