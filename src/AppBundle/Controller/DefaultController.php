<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\RegistrationType;
use AppBundle\Form\Model\Registration;


class DefaultController extends Controller
{
    
    public function homeAction()
    {
    	$registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AppBundle:Default:home.html.twig',
            array('form' => $form->createView())
        );






    }



    public function adminAction()
    {
    	return new Response('Admin page!');
    }
	

}
