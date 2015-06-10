<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyOverseaOffice
 *
 * @ORM\Table(name="company_oversea_office")
 * @ORM\Entity
 */
class CompanyOverseaOffice
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
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer")
     */
    private $country_id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=500)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="dutires", type="string", length=255)
     */
    private $dutires;

    /**
     * @var string
     *
     * @ORM\Column(name="person_in_charge", type="string", length=255)
     */
    private $person_in_charge;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="oversea_offices")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="company_oversea_offices")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;


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
     * Set city
     *
     * @param string $city
     * @return CompanyOverseaOffice
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return CompanyOverseaOffice
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return CompanyOverseaOffice
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set dutires
     *
     * @param string $dutires
     * @return CompanyOverseaOffice
     */
    public function setDutires($dutires)
    {
        $this->dutires = $dutires;

        return $this;
    }

    /**
     * Get dutires
     *
     * @return string 
     */
    public function getDutires()
    {
        return $this->dutires;
    }



    /**
     * Set person_in_charge
     *
     * @param string $personInCharge
     * @return CompanyOverseaOffice
     */
    public function setPersonInCharge($personInCharge)
    {
        $this->person_in_charge = $personInCharge;

        return $this;
    }

    /**
     * Get person_in_charge
     *
     * @return string 
     */
    public function getPersonInCharge()
    {
        return $this->person_in_charge;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return CompanyOverseaOffice
     */
    public function setCompanyId($companyId)
    {
        $this->company_id = $companyId;

        return $this;
    }

    /**
     * Get company_id
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Set company
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $company
     * @return CompanyOverseaOffice
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

    /**
     * Set country_id
     *
     * @param integer $countryId
     * @return CompanyOverseaOffice
     */
    public function setCountryId($countryId)
    {
        $this->country_id = $countryId;

        return $this;
    }

    /**
     * Get country_id
     *
     * @return integer 
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set country
     *
     * @param \WebPlatform\AseagleBundle\Entity\Country $country
     * @return CompanyOverseaOffice
     */
    public function setCountry(\WebPlatform\AseagleBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \WebPlatform\AseagleBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return CompanyOverseaOffice
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
