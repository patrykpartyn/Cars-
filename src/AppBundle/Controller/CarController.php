<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-05
 * Time: 11:38
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Controller\Form\OrderType;
use AppBundle\Controller\Form\CommentType;
use AppBundle\Entity\Comment;
use AppBundle\Entity\User;
use AppBundle\Entity\Orders;
use AppBundle\Entity\Cars;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CarController extends Controller
{
    /**
     * @Route("/car/{id}", name="show_car")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function showCar(Request $request, Cars $car){
        $car=$this->getDoctrine()
            ->getRepository('AppBundle\Entity\Cars')
            ->find($car);
        if(!$car){
            throw $this->createNotFoundException('no cars in database');
        }



            $user=$this->getUser();
            $comment = new Comment();
            $comment->setCar($car);
            $comment->setUser($user);
            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
            }


            $order=new Orders();
            $order->setCarOrder($car);
            $order->setUser($user);
            $formOrder=$this->createForm(OrderType::class,$order);
            $formOrder->handleRequest($request);
            if($formOrder->isSubmitted() && $formOrder->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($order);
                $em->flush();
            }






        return $this->render('default/show_car.html.twig', [
            //'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'car'=>$car,
          //  'form'=>$form->createView()
            'form'=> is_null($form) ? $form : $form->createView(),
            'formOrder'=>$formOrder->createView()
        ]);
    }

    public function createOrder(){





    }

}