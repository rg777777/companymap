<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Form\Type\RegistrationType;
use AppBundle\Form\Type\RegistrCompanyType;
use AppBundle\Form\Model\Registration;
use AppBundle\Form\Model\RegistrCompany;
use Symfony\Component\HttpFoundation\Request;


class AccountController extends Controller
{
    public function registerAction()
    {
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AppBundle:Account:register.html.php',
            array('form' => $form->createView())
        );
    }


     public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();


            $plainPassword = $registration->getUser()->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($registration->getUser(), $plainPassword);
            $registration->getUser()->setPassword($encoded);
            $em->persist($registration->getUser());
            $em->flush();

            return $this->redirectToRoute('company_index');
        }

        return $this->render(
            'AppBundle:Account:register.html.php',
            array('form' => $form->createView())
            );
    }

}


