<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-16
 * Time: 09:33
 */

namespace AppBundle\Controller\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;

class AcceptedOrderType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('save', SubmitType::class, array('label' => 'zaakceptuj zamówienie'));
    }

}