<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;


class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $builder->add('companyname', 'text',array('attr' => array('class' => 'form-control')));
        //$builder->add('CreatedDate', 'datetime');
        $builder->add($builder->create('CreatedDate', 'hidden')
        ->addViewTransformer(new DateTimeToStringTransformer()));
        // $builder->add('CreatedDate', 'datetime', array('input'  => 'datetime'))
        // ->addViewTransformer(new DateTimeToStringTransformer());
        $builder->add('creator_id', 'hidden')
        ->add('Create', 'submit' , array('attr' => array('class' => 'btn btn-default')));
       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Company',
            
        ));
    }

    public function getName()
    {
        return 'company';
    }
}