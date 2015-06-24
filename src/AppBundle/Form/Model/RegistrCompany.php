<?php
namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Entity\Company;

class Registrcompany
{
    /**
     * @Assert\Type(type="AppBundle\Entity\Company")
     * @Assert\Valid()
     */
    protected $company;

 

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }



}