<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehiculo;
use App\Form\VehiculoType;

class VehiculosController extends AbstractController
{
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $vehiculos_repo = $this->getDoctrine()->getRepository(Vehiculo::class);
        $vehiculos = $vehiculos_repo->findAll();
        
        return $this->render('vehiculos/vehiculos.html.twig', [
            'vehiculos' => $vehiculos
        ]);
    }

    public function createVehiculo(Request $request)
    {
        $vehiculo = new Vehiculo();
        $form = $this->createForm(VehiculoType::class, $vehiculo);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiculo);
            $em->flush();

            return $this->redirectToRoute('vehiculos');
        }
        return $this->render('vehiculos/new_vehiculo.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function editVehiculo(Request $request, Vehiculo $vehiculo)
    {
        $form = $this->createForm(VehiculoType::class, $vehiculo);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiculo);
            $em->flush();

            return $this->redirectToRoute('vehiculos');
        }

        return $this->render('vehiculos/new_vehiculo.html.twig',[
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

    public function deleteVehiculo(Vehiculo $vehiculo)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehiculo);
        $em->flush();
        
        return $this->redirectToRoute('vehiculos');
    }
}
