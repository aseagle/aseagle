<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyFactory
 *
 * @ORM\Table(name="company_factory")
 * @ORM\Entity
 */
class CompanyFactory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer")
     */
    private $country_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year_cooperation", type="date")
     */
    private $year_cooperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_transaction", type="integer")
     */
    private $total_transaction;

    /**
     * @var string
     *
     * @ORM\Column(name="product_capacity", type="string", length=500)
     */
    private $product_capacity;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="company_factories")
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
     * Set name
     *
     * @param string $name
     * @return CompanyFactory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="company_factories")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * Set year_cooperation
     *
     * @param \DateTime $yearCooperation
     * @return CompanyFactory
     */
    public function setYearCooperation($yearCooperation)
    {
        $this->year_cooperation = $yearCooperation;

        return $this;
    }

    /**
     * Get year_cooperation
     *
     * @return \DateTime 
     */
    public function getYearCooperation()
    {
        return $this->year_cooperation;
    }

    /**
     * Set total_transaction
     *
     * @param integer $totalTransaction
     * @return CompanyFactory
     */
    public function setTotalTransaction($totalTransaction)
    {
        $this->total_transaction = $totalTransaction;

        return $this;
    }

    /**
     * Get total_transaction
     *
     * @return integer 
     */
    public function getTotalTransaction()
    {
        return $this->total_transaction;
    }

    /**
     * Set product_capacity
     *
     * @param string $productCapacity
     * @return CompanyFactory
     */
    public function setProductCapacity($productCapacity)
    {
        $this->product_capacity = $productCapacity;

        return $this;
    }

    /**
     * Get product_capacity
     *
     * @return string 
     */
    public function getProductCapacity()
    {
        return $this->product_capacity;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return CompanyFactory
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
     * @return CompanyFactory
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
     * @return CompanyFactory
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
     * @return CompanyFactory
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
}
