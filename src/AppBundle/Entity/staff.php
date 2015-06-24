<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Table(name="app_staff")
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Entity\StaffRepository")
 * 
 */
class Staff
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

/**
     * 
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="Staff")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * 
     */

    private $country_id;

   
    /**
     * @ORM\Column(type="string")
     */
    private $staff_count;

  /**
     * 
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="Staff")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * 
     */
    private $company_id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Staff
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set staff_count
     *
     * @param string $staffCount
     * @return Staff
     */
    public function setStaffCount($staffCount)
    {
        $this->staff_count = $staffCount;

        return $this;
    }

    /**
     * Get staff_count
     *
     * @return string 
     */
    public function getStaffCount()
    {
        return $this->staff_count;
    }

    /**
     * Set creator_id
     *
     * @param integer $creatorId
     * @return Staff
     */
    public function setCreatorId($creatorId)
    {
        $this->creator_id = $creatorId;

        return $this;
    }

    /**
     * Get creator_id
     *
     * @return integer 
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Set company_id
     *
     * @param \AppBundle\Entity\Company $companyId
     * @return Staff
     */
    public function setCompanyId(\AppBundle\Entity\Company $companyId = null)
    {
        $this->company_id = $companyId;

        return $this;
    }

    /**
     * Get company_id
     *
     * @return \AppBundle\Entity\Company 
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Set countryname
     *
     * @param string $countryname
     * @return Staff
     */
    public function setCountryname($countryname)
    {
        $this->countryname = $countryname;

        return $this;
    }

    /**
     * Get countryname
     *
     * @return string 
     */
    public function getCountryname()
    {
        return $this->countryname;
    }

    /**
     * Set countrylat
     *
     * @param float $countrylat
     * @return Staff
     */
    public function setCountrylat($countrylat)
    {
        $this->countrylat = $countrylat;

        return $this;
    }

    /**
     * Get countrylat
     *
     * @return float 
     */
    public function getCountrylat()
    {
        return $this->countrylat;
    }

    /**
     * Set countrylng
     *
     * @param float $countrylng
     * @return Staff
     */
    public function setCountrylng($countrylng)
    {
        $this->countrylng = $countrylng;

        return $this;
    }

    /**
     * Get countrylng
     *
     * @return float 
     */
    public function getCountrylng()
    {
        return $this->countrylng;
    }

    /**
     * Set country_id
     *
     * @param \AppBundle\Entity\Country $countryId
     * @return Staff
     */
    public function setCountryId(\AppBundle\Entity\Country $countryId = null)
    {
        $this->country_id = $countryId;

        return $this;
    }

    /**
     * Get country_id
     *
     * @return \AppBundle\Entity\Country 
     */
    public function getCountryId()
    {
        return $this->country_id;
    }
}
