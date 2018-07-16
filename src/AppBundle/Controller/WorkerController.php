<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-16
 * Time: 09:25
 */

namespace AppBundle\Controller;


use AppBundle\Controller\Form\AcceptedOrderType;
use AppBundle\Entity\AcceptedOrder;
use AppBundle\Entity\Orders;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WorkerController extends Controller
{

    /**
     * @Route("/worker")
     * @param Request $request
     * @param Orders $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function showOrders(Request $request){


        $orders=$this->getDoctrine()
            ->getRepository('AppBundle:Orders')
            ->findAll();





        return $this->render('default/orders_worker.html.twig', [

            'orders'=>$orders
//

        ]);
    }



}