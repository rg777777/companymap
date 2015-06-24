<?php 
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Country;
use AppBundle\Form\Type\CountryType;



class CountryController extends Controller
{

        public function indexAction()
    {
        $Countries = $this->getDoctrine()
        ->getRepository('AppBundle:Country')
        ->findAll();

        return $this->render('AppBundle:Country:index.html.php', array('Countries' => $Countries));
        
    }



    public function addAction(Request $request)
    {

 $register_staff = new Country();
            $Staff_Type = new CountryType();

        // $comp_data = new Counrty();
        // $comp_data = $this->getDoctrine()->getRepository('AppBundle:Counrty');
        // $comp_find = $comp_data->find($compid);
        
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new CountryType());
   
        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();
           // $registration->setCompanyId($comp_find);
            //$em->persist($comp_find);
            $em->persist($registration);
            $em->flush();
            return $this->redirectToRoute('country_index');
        }

        return $this->render(
            'AppBundle:Country:add.html.php',
            array('form' => $form->createView())
            );

        
    }

        public function removeAction($Countid)
    {

        $em = $this->getDoctrine()->getManager();
        $remCompnay = $this->getDoctrine()
        ->getRepository('AppBundle:Country')
        ->findOneBy(array('id' => $Countid));

        $em->remove($remCompnay);
        $em->flush();
        return $this->redirectToRoute('country_index');
        
    }



    public function editAction($countid, Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $updCountry = $this->getDoctrine()
        ->getRepository('AppBundle:Country')
        ->findOneBy(array('id' => $countid));

        $form = $this->createFormBuilder($updCountry)
        ->add('countryname', 'text' , array('attr' => array('class' => 'form-control')))
        ->add('countrylat' , 'number', array('attr' => array('class' => 'form-control')))
        ->add('countrylng' , 'number', array('attr' => array('class' => 'form-control')))
        ->add('Submit', 'submit', array('attr' => array('class' => 'btn btn-default')))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('country_index');
        }
        $build['form'] = $form->createView();

        return $this->render('AppBundle:Country:edit.html.php', $build);
 
    }


}