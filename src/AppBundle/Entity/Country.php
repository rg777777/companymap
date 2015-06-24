<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Country
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CountryRepository")
 * @UniqueEntity("countryname")
 */
class Country
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="countryname", type="string", length=255)
     */
    private $countryname;

    /**
     * @var float
     *
     * @ORM\Column(name="countrylat", type="float")
     */
    private $countrylat;

    /**
     * @var float
     *
     * @ORM\Column(name="countrylng", type="float")
     */
    private $countrylng;

            /**
     * @ORM\OneToMany(targetEntity="Staff", mappedBy="Country")
     */
      private $staffscountries;


      public function __construct()
    {
        $this->staffscountries = new \Doctrine\Common\Collections\ArrayCollection();
    }


    

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
     * Set countryname
     *
     * @param string $countryname
     * @return Country
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
     * @return Country
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
     * @return Country
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
     * Add staffscountries
     *
     * @param \AppBundle\Entity\Staff $staffscountries
     * @return Country
     */
    public function addStaffscountry(\AppBundle\Entity\Staff $staffscountries)
    {
        $this->staffscountries[] = $staffscountries;

        return $this;
    }

    /**
     * Remove staffscountries
     *
     * @param \AppBundle\Entity\Staff $staffscountries
     */
    public function removeStaffscountry(\AppBundle\Entity\Staff $staffscountries)
    {
        $this->staffscountries->removeElement($staffscountries);
    }

    /**
     * Get staffscountries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStaffscountries()
    {
        return $this->staffscountries;
    }
}
