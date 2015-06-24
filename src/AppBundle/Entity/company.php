<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Table(name="app_company")
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CompanyRepository")
 * 
 */
class Company
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * 
     */
    private $companyname;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Company")
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id")
     * 
     */
    private $creator_id;


      /**
     * @ORM\OneToMany(targetEntity="Staff", mappedBy="Company")
     */
      private $Staffs;


    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Staffs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set companyname
     *
     * @param string $companyname
     * @return Company
     */
    public function setCompanyname($companyname)
    {
        $this->companyname = $companyname;

        return $this;
    }

    /**
     * Get companyname
     *
     * @return string 
     */
    public function getCompanyname()
    {
        return $this->companyname;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return Company
     */
    public function setCreatedDate($createdDate)
    {
        $this->created_date = $createdDate;

        return $this;
    }

    /**
     * Get created_date
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Set creator_id
     *
     * @param \AppBundle\Entity\User $creatorId
     * @return Company
     */
    public function setCreatorId(\AppBundle\Entity\User $creatorId = null)
    {
        $this->creator_id = $creatorId;

        return $this;
    }

    /**
     * Get creator_id
     *
     * @return \AppBundle\Entity\User 
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Add Staffs
     *
     * @param \AppBundle\Entity\Staff $staffs
     * @return Company
     */
    public function addStaff(\AppBundle\Entity\Staff $staffs)
    {
        $this->Staffs[] = $staffs;

        return $this;
    }

    /**
     * Remove Staffs
     *
     * @param \AppBundle\Entity\Staff $staffs
     */
    public function removeStaff(\AppBundle\Entity\Staff $staffs)
    {
        $this->Staffs->removeElement($staffs);
    }

    /**
     * Get Staffs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStaffs()
    {
        return $this->Staffs;
    }
}
