<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-13
 * Time: 11:23
 */

namespace AppBundle\Controller\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder ->add('save', SubmitType::class, array('label' => 'złóż zamówienie'));


    }

}