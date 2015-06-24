<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Company;
use AppBundle\Entity\Staff;
use AppBundle\Entity\Country;
use AppBundle\Entity;




class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $builder->add('country_id', 'entity', array(
            'class' => 'AppBundle:Country',
            'property' => 'countryname',
                'attr' => array('class' => 'form-control')
            ))
        ->add('staff_count' , 'text', array('attr' => array('class' => 'form-control')))
        ->add('Submit', 'submit', array('attr' => array('class' => 'btn btn-default')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Staff',
            ));
    }

    public function getName()
    {
        return 'Staff';
    }
}