<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactList
 *
 * @ORM\Table(name="contact_list")
 * @ORM\Entity
 */
class ContactList
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
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="contact_id", type="integer")
     */
    private $contact_id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_company", type="boolean")
     */
    private $is_company = false;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="contact_list")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

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
     * Set user_id
     *
     * @param integer $userId
     * @return ContactList
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set contact_id
     *
     * @param integer $contactId
     * @return ContactList
     */
    public function setContactId($contactId)
    {
        $this->contact_id = $contactId;

        return $this;
    }

    /**
     * Get contact_id
     *
     * @return integer 
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set is_company
     *
     * @param boolean $isCompany
     * @return ContactList
     */
    public function setIsCompany($isCompany)
    {
        $this->is_company = $isCompany;

        return $this;
    }

    /**
     * Get is_company
     *
     * @return boolean 
     */
    public function getIsCompany()
    {
        return $this->is_company;
    }

    /**
     * Set user
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $user
     * @return ContactList
     */
    public function setUser(\WebPlatform\AseagleBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
