<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('Username', 'text',  array('attr'=> array('class'=>'form-group')) )
		->add('email', 'email' ,  array('attr'=> array('class'=>'form-group')))
		->add('password', 'repeated', array(
			'type' => 'password',
			'invalid_message' => 'The password fields must match.',
			'options' => array('attr' => array('class' => 'password-field')),
			'required' => true,
			'first_options'  => array('label' => 'Password'),
			'second_options' => array('label' => 'Repeat Password'),
			'attr'=> array('class'=>'form-group'),
			))
		->add('FirstName', 'text',  array('attr'=> array('class'=>'form-group')))
		->add('LastName', 'text',  array('attr'=> array('class'=>'form-group')));

	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\User'
			));
	}

	public function getName()
	{
		return 'user';
	}
}