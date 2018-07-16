<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-05
 * Time: 12:48
 */

namespace AppBundle\Controller\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content',TextareaType::class,array(
                'label' => false,
                'attr'=> array('placeholder'=>'Add something...')
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Comment'));
    }


}