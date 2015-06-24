<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\CompanyType;
use AppBundle\Form\Type\UpdateCompanyTape;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Company;
use AppBundle\Entity\Country;
use AppBundle\Entity\Staff;
use AppBundle\Entity\User;
use AppBundle\Entity;




class CompanyController extends Controller
{

    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $Companies = $this->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->findBy(array('creator_id' => $user->getId()));

        return $this->render('AppBundle:Company:index.html.php', array('Companies' => $Companies));
        
    }



    public function addAction()
    {

        $register_comp = new Company();
        $comp_Type = new CompanyType();
        $register_comp -> setCreatedDate(new \DateTime('now'));

        $form = $this->createForm($comp_Type, $register_comp, array(
            'action' => $this->generateUrl('company_create')
            ));
        return $this->render('AppBundle:Company:add.html.php', array(
            'form' => $form->createView()
            ));
    }


    public function createAction(Request $request)
    {

        $userid = $this->container->get('security.context')->getToken()->getUser()->getId();
        $user_data = new User();
        $user_data = $this->getDoctrine()->getRepository('AppBundle:User');
        $user_find = $user_data->find($userid);
        
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CompanyType());
        $form->handleRequest($request);


        if ($form->isValid()) {
            $registration = $form->getData();
            $registration->setCreatorId($user_find);
            $em->persist($user_find);
            $em->persist($registration);
            $em->flush();
            return $this->redirectToRoute('company_index');
        }

    }



    public function editAction($id, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $updCompany = $this->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->findOneBy(array('id' => $id));

        $form = $this->createFormBuilder($updCompany)
        ->add('companyname', 'text', array('attr' => array('class' => 'form-control')))
        ->add('update', 'submit' , array('attr' => array('class' => 'btn btn-default')))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('company_index');
        }
        $build['form'] = $form->createView();

        return $this->render('AppBundle:Company:edit.html.php', $build);

    }



    public function removeAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $remCompnay = $this->getDoctrine()
        ->getRepository('AppBundle:Company')
        ->findOneBy(array('id' => $id));

        $em->remove($remCompnay);
        $em->flush();
        return $this->redirectToRoute('company_index');
        
    }


    public function CompanyOnMapAction($compid, Request $request)

    {

        $data = [];
        $em = $this->getDoctrine()->getManager();
        $Staffs = $this->getDoctrine()
        ->getRepository('AppBundle:Staff')
        ->findBy(array('company_id' => $compid));
        $i=0;
        if ($Staffs){ 
            foreach ($Staffs as $staf) {

              
               
               $staffid = $staf->getCountryId();
               $CountryData = $this->getDoctrine()
               ->getRepository('AppBundle:Country')
               ->findOneBy(array('id' => $staffid));
               

          //$data[$i]['center']= 'new google.maps.LatLng('.$CountryData->getCountrylat().', '.$CountryData->getCountrylng().')';
               $data[$i]['Countryname']= $CountryData->getCountryname();
               $data[$i]['country_lat']= $CountryData->getCountrylat();
               $data[$i]['country_lng']= $CountryData->getCountrylng();
               $data[$i]['population'] = $staf->getStaffCount();
               
               
               
               $i++;
           }
       }

       return $this->render('AppBundle:Company:comp.html.php', array('data' => $data));

   }










}