<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="region_id", type="string", nullable=true)
     */
    private $region_id = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="country_of_origin")
     */
    protected $products;

    /**
     * @ORM\OneToMany(targetEntity="CompanyProfile", mappedBy="reg_country")
     */
    protected $reg_companies;

    /**
     * @ORM\OneToMany(targetEntity="CompanyProfile", mappedBy="ops_country")
     */
    protected $ops_companies;

    /**
     * @ORM\OneToMany(targetEntity="CompanyCustomer", mappedBy="country")
     */
    protected $company_customers;

    /**
     * @ORM\OneToMany(targetEntity="CompanyOverseaOffice", mappedBy="country")
     */
    protected $company_oversea_offices;

    /**
     * @ORM\OneToMany(targetEntity="CompanyFactory", mappedBy="country")
     */
    protected $company_factories;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPatent", mappedBy="country")
     */
    protected $company_patents;

    public function __construct()
    {
        $this->$products = new ArrayCollection();
        $this->$reg_companies = new ArrayCollection();
        $this->$ops_companies = new ArrayCollection();
        $this->$company_customers = new ArrayCollection();
        $this->$company_oversea_offices = new ArrayCollection();
        $this->$company_factories = new ArrayCollection();
        $this->$company_patents = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Region
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
     * Set count
     *
     * @param integer $count
     * @return Region
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Add products
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $products
     * @return Region
     */
    public function addProduct(\WebPlatform\AseagleBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $products
     */
    public function removeProduct(\WebPlatform\AseagleBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }


    /**
     * Add reg_companies
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $regCompanies
     * @return Country
     */
    public function addRegCompany(\WebPlatform\AseagleBundle\Entity\CompanyProfile $regCompanies)
    {
        $this->reg_companies[] = $regCompanies;

        return $this;
    }

    /**
     * Remove reg_companies
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $regCompanies
     */
    public function removeRegCompany(\WebPlatform\AseagleBundle\Entity\CompanyProfile $regCompanies)
    {
        $this->reg_companies->removeElement($regCompanies);
    }

    /**
     * Get reg_companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegCompanies()
    {
        return $this->reg_companies;
    }

    /**
     * Add ops_companies
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $opsCompanies
     * @return Country
     */
    public function addOpsCompany(\WebPlatform\AseagleBundle\Entity\CompanyProfile $opsCompanies)
    {
        $this->ops_companies[] = $opsCompanies;

        return $this;
    }

    /**
     * Remove ops_companies
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $opsCompanies
     */
    public function removeOpsCompany(\WebPlatform\AseagleBundle\Entity\CompanyProfile $opsCompanies)
    {
        $this->ops_companies->removeElement($opsCompanies);
    }

    /**
     * Get ops_companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOpsCompanies()
    {
        return $this->ops_companies;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Add company_customers
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomers
     * @return Country
     */
    public function addCompanyCustomer(\WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomers)
    {
        $this->company_customers[] = $companyCustomers;

        return $this;
    }

    /**
     * Remove company_customers
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomers
     */
    public function removeCompanyCustomer(\WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomers)
    {
        $this->company_customers->removeElement($companyCustomers);
    }

    /**
     * Get company_customers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyCustomers()
    {
        return $this->company_customers;
    }

    /**
     * Add company_oversea_offices
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $companyOverseaOffices
     * @return Country
     */
    public function addCompanyOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $companyOverseaOffices)
    {
        $this->company_oversea_offices[] = $companyOverseaOffices;

        return $this;
    }

    /**
     * Remove company_oversea_offices
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $companyOverseaOffices
     */
    public function removeCompanyOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $companyOverseaOffices)
    {
        $this->company_oversea_offices->removeElement($companyOverseaOffices);
    }

    /**
     * Get company_oversea_offices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyOverseaOffices()
    {
        return $this->company_oversea_offices;
    }

    /**
     * Add company_factories
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactories
     * @return Country
     */
    public function addCompanyFactory(\WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactories)
    {
        $this->company_factories[] = $companyFactories;

        return $this;
    }

    /**
     * Remove company_factories
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactories
     */
    public function removeCompanyFactory(\WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactories)
    {
        $this->company_factories->removeElement($companyFactories);
    }

    /**
     * Get company_factories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyFactories()
    {
        return $this->company_factories;
    }

    /**
     * Add company_patents
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatents
     * @return Country
     */
    public function addCompanyPatent(\WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatents)
    {
        $this->company_patents[] = $companyPatents;

        return $this;
    }

    /**
     * Remove company_patents
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatents
     */
    public function removeCompanyPatent(\WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatents)
    {
        $this->company_patents->removeElement($companyPatents);
    }

    /**
     * Get company_patents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyPatents()
    {
        return $this->company_patents;
    }

    /**
     * Set regionId
     *
     * @param string $regionId
     *
     * @return Country
     */
    public function setRegionId($regionId)
    {
        $this->region_id = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return string
     */
    public function getRegionId()
    {
        return $this->region_id;
    }
}
