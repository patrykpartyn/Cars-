<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-16
 * Time: 10:39
 */

namespace AppBundle\Controller;


use AppBundle\Controller\Form\AcceptedOrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Orders;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\AcceptedOrder;

class WorkerController2 extends Controller
{

    /**
     * @Route("/order/{id}", name="show_order")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function showOrder(Request $request, Orders $order){

        $order=$this->getDoctrine()
            ->getRepository('AppBundle\Entity\Orders')
            ->find($order);
        if(!$order){
            throw $this->createNotFoundException('no cars in database');
        }



        $worker=$this->getUser()->getId();
       $userId=$order->getUser()->getId();
        $carId=$order->getCarOrder()->getId();
        $orderAccp=new AcceptedOrder();
        $orderAccp->setWorker($worker);
        $orderAccp->setCarId($carId);
       $orderAccp->setUserId($userId);
        $formOrder=$this->createForm(AcceptedOrderType::class,$orderAccp);
        $formOrder->handleRequest($request);
        if($formOrder->isSubmitted() && $formOrder->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($orderAccp);
            $em->flush();

            $em=$this->getDoctrine()->getManager();
            $em->remove($order);
            $em->flush();

            return $this->redirectToRoute('app_worker_showorders');
        }





        return $this->render('default/one_order_worker.html.twig', [
            //'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'order'=>$order,
            'formOrder'=>$formOrder->createView()

        ]);




    }

}