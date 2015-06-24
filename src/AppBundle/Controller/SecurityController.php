<?php 

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class SecurityController extends Controller
{ 

public function LoginAction(Request $request)
   {
 $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render(
        'AppBundle:Security:login.html.php',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        )
    );

}


  

 public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }




}