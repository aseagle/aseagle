<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyVerifying
 *
 * @ORM\Table(name="company_Verifying")
 * @ORM\Entity
 */
class CompanyVerifying
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
     * @ORM\Column(name="contact_person", type="string", length=255, nullable=true)
     */
    private $contact_person = null;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=255, nullable=true)
     */
    private $contact_email = null;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone", type="string", length=20, nullable=true)
     */
    private $contact_phone = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_profile_id", type="integer")
     */
    private $company_profile_id;

    /**
     * @ORM\OneToOne(targetEntity="CompanyProfile", inversedBy="verify_request")
     * @ORM\JoinColumn(name="company_profile_id", referencedColumnName="id")
     */
    protected $company;

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
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return CompanyVerifying
     */
    public function setContactPerson($contactPerson)
    {
        $this->contact_person = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return CompanyVerifying
     */
    public function setContactEmail($contactEmail)
    {
        $this->contact_email = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * Set contactPhone
     *
     * @param string $contactPhone
     *
     * @return CompanyVerifying
     */
    public function setContactPhone($contactPhone)
    {
        $this->contact_phone = $contactPhone;

        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * Set companyProfileId
     *
     * @param integer $companyProfileId
     *
     * @return CompanyVerifying
     */
    public function setCompanyProfileId($companyProfileId)
    {
        $this->company_profile_id = $companyProfileId;

        return $this;
    }

    /**
     * Get companyProfileId
     *
     * @return integer
     */
    public function getCompanyProfileId()
    {
        return $this->company_profile_id;
    }

    /**
     * Set company
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $company
     *
     * @return CompanyVerifying
     */
    public function setCompany(\WebPlatform\AseagleBundle\Entity\CompanyProfile $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \WebPlatform\AseagleBundle\Entity\CompanyProfile
     */
    public function getCompany()
    {
        return $this->company;
    }
}
