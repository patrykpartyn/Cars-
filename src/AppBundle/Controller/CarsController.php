<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CarsController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function showAll(Request $request)
    {

        $cars=$this->getDoctrine()
            ->getRepository('AppBundle:Cars')
            ->findAll();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $cars, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10
           );



        if(!$cars){
            throw $this->createNotFoundException('no cars in database');
        }




        return $this->render('default/index.html.twig', [
            //'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'cars'=>$cars,
            'cars' => $pagination
        ]);
    }
}
