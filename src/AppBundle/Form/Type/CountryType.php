<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Country;
use AppBundle\Entity\Staff;
use AppBundle\Entity;




class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


          
        $builder->add('countryname', 'text' , array('attr' => array('class' => 'form-control')))
        ->add('countrylat' , 'number', array('attr' => array('class' => 'form-control')))
        ->add('countrylng' , 'number', array('attr' => array('class' => 'form-control')))
        ->add('Submit', 'submit', array('attr' => array('class' => 'btn btn-default')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Country',
            ));
    }

    public function getName()
    {
        return 'Country';
    }
}