<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\StaffType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Staff;
use AppBundle\Entity\Company;
use AppBundle\Entity\Country;




class StaffController extends Controller
{

    public function viewAction($compid)
    {
        
        $Staffs = $this->getDoctrine()
        ->getRepository('AppBundle:Staff')
        ->findBy(array('company_id' => $compid));

        $comp_data = new Company();
        $comp_data = $this->getDoctrine()->getRepository('AppBundle:Company');
        $comp_find = $comp_data
        ->find($compid);


        return $this->render('AppBundle:Staff:view.html.php', array('Staffs' => $Staffs, 'compid' => $compid, 'companyname'=> $comp_find->getCompanyname()));
        
    }



    public function addAction($compid, Request $request)
    {

            $register_staff = new Staff();
            $Staff_Type = new StaffType();

        $comp_data = new Company();
        $comp_data = $this->getDoctrine()->getRepository('AppBundle:Company');
        $comp_find = $comp_data->find($compid);
        


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new StaffType());
   
        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();
            $registration->setCompanyId($comp_find);
            //$em->persist($count_data);
            $em->persist($comp_find);
            $em->persist($registration);
            $em->flush();
            return $this->redirectToRoute('staff_view', array('compid' => $compid));
        }

        return $this->render(
            'AppBundle:Staff:add.html.php',
            array('form' => $form->createView(), 'companyname' => $comp_find->getCompanyname() )
            );


    }

        public function removeAction($compid, $staffid)
    {

        $em = $this->getDoctrine()->getManager();
        $remCompnay = $this->getDoctrine()
        ->getRepository('AppBundle:Staff')
        ->findOneBy(array('id' => $staffid));

        $em->remove($remCompnay);
        $em->flush();
        return $this->redirectToRoute('staff_view', array('compid' => $compid));
        
    }



    public function editAction($staffid, $compid, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $updCompany = $this->getDoctrine()
        ->getRepository('AppBundle:Staff')
        ->findOneBy(array('id' => $staffid));

        $form = $this->createFormBuilder($updCompany)
        ->add('country_id', 'entity', array(
            'class' => 'AppBundle:Country',
            'property' => 'countryname'))
        ->add('staff_count' , 'text' , array('attr' => array('class' => 'form-control')))
        ->add('update', 'submit' , array('attr' => array('class' => 'btn btn-default')))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('staff_view', array('compid' => $compid));
        }
        $build['form'] = $form->createView();

        return $this->render('AppBundle:Staff:edit.html.php', $build);
 
    }


    


}