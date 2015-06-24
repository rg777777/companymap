<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Table(name="app_users")
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 * 
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @Assert\NotBlank()
     * 
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=4096)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank()
     * @Assert\email()
     */
    private $email;

   
    /**
     * @ORM\Column(type="string")
     */
    private $FirstName;


    /**
     * @ORM\Column(type="string")
     */

    private $LastName;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    /**
     * @ORM\OneToMany(targetEntity="Company", mappedBy="User")
     */
     private $Company;

     public function __construct()
    {
        
        $this->isActive = true;
    }

   
    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set FirstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;

        return $this;
    }

    /**
     * Get FirstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Set LastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->LastName = $lastName;

        return $this;
    }

    /**
     * Get LastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

   


    /**
     * Add Company
     *
     * @param \AppBundle\Entity\Company $company
     * @return User
     */
    public function addCompany(\AppBundle\Entity\Company $company)
    {
        $this->Company[] = $company;

        return $this;
    }

    /**
     * Remove Company
     *
     * @param \AppBundle\Entity\Company $company
     */
    public function removeCompany(\AppBundle\Entity\Company $company)
    {
        $this->Company->removeElement($company);
    }

    /**
     * Get Company
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompany()
    {
        return $this->Company;
    }
}
