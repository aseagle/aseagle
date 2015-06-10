<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * CompanyProfile
 *
 * @ORM\Table(name="company_profile")
 * @ORM\Entity
 */
class CompanyProfile
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
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo = null;

    /**
     * @var string
     *
     * @ORM\Column(name="detail_introduction", type="string", length=4096)
     */
    private $detail_introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=500, nullable=true)
     */
    private $picture = null;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_address", type="string", length=255)
     */
    private $reg_address;

    /**
     * @var integer
     *
     * @ORM\Column(name="reg_country_id", type="integer")
     */
    private $reg_country_id;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_address", type="string", length=255)
     */
    private $ops_address;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_city", type="string", length=255)
     */
    private $ops_city;

    /**
     * @var integer
     *
     * @ORM\Column(name="ops_country_id", type="integer")
     */
    private $ops_country_id;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_zip", type="string", length=16)
     */
    private $ops_zip;

    /**
     * @var string
     *
     * @ORM\Column(name="main_products", type="string", length=4096)
     */
    private $main_products;

    /**
     * @var string
     *
     * @ORM\Column(name="others_selling", type="string", length=4096)
     */
    private $others_selling;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_year", type="date")
     */
    private $reg_year;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_employee", type="integer")
     */
    private $total_employee;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=128)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="legal_owner", type="string", length=255)
     */
    private $legal_owner;

    /**
     * @var integer
     *
     * @ORM\Column(name="office_site", type="integer")
     */
    private $office_site;

    /**
     * @var string
     *
     * @ORM\Column(name="company_advantage", type="string", length=1024)
     */
    private $company_advantage;

    /**
     * @var string
     *
     * @ORM\Column(name="total_sale_volumn", type="string", length=255)
     */
    private $totalSale_volumn;

    /**
     * @var string
     *
     * @ORM\Column(name="export_percentage", type="string", length=255)
     */
    private $export_percentage;

    /**
     * @var string
     *
     * @ORM\Column(name="main_markets_distribution", type="string", length=255)
     */
    private $main_markets_distribution;

    /**
     * @var integer
     *
     * @ORM\Column(name="year_start_export", type="integer")
     */
    private $year_start_export;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_trade_staff", type="integer")
     */
    private $total_trade_staff;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_rnd_staff", type="integer")
     */
    private $total_rnd_staff;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_qc_staff", type="integer")
     */
    private $total_qc_staff;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_port", type="string", length=255)
     */
    private $nearest_port;

    /**
     * @var integer
     *
     * @ORM\Column(name="average_lead_time", type="integer")
     */
    private $average_lead_time;

    /**
     * @var string
     *
     * @ORM\Column(name="deliver_term", type="string", length=255)
     */
    private $deliver_term;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_type", type="string", length=255)
     */
    private $payment_type;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="representative_id", type="integer", nullable=true)
     */
    private $representative_id = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_type", type="integer", nullable=true)
     */
    private $member_type = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_verified", type="boolean", nullable=true)
     */
    private $is_verified = null;

    /**
     * @ORM\OneToMany(targetEntity="CompanyCustomer", mappedBy="company")
     */
    protected $company_customers;

    /**
     * @ORM\OneToMany(targetEntity="CompanyOverseaOffice", mappedBy="company")
     */
    protected $oversea_offices;

    /**
     * @ORM\OneToMany(targetEntity="CompanyFactory", mappedBy="company")
     */
    protected $company_factories;

    /**
     * @ORM\OneToMany(targetEntity="CompanyCertification", mappedBy="company")
     */
    protected $company_certifications;

    /**
     * @ORM\OneToMany(targetEntity="CompanyHonorAward", mappedBy="company")
     */
    protected $company_honor_awards;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPatent", mappedBy="company")
     */
    protected $company_patents;

    /**
     * @ORM\OneToMany(targetEntity="CompanyTrademark", mappedBy="company")
     */
    protected $company_trademarks;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="company")
     */
    protected $staffs;

    /**
     * @ORM\OneToMany(targetEntity="SupplierCategory", mappedBy="company")
     */
    protected $company_categories;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="reg_companies")
     * @ORM\JoinColumn(name="reg_country_id", referencedColumnName="id")
     */
    protected $reg_country;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="ops_companies")
     * @ORM\JoinColumn(name="ops_country_id", referencedColumnName="id")
     */
    protected $ops_country;

    /**
     * @ORM\OneToMany(targetEntity="PurchaseManagement", mappedBy="company")
     */
    protected $purchase_managements;

    public function __construct()
    {
        $this->company_customers = new ArrayCollection();
        $this->oversea_offices = new ArrayCollection();
        $this->company_factories = new ArrayCollection();
        $this->company_certifications = new ArrayCollection();
        $this->company_honor_awards = new ArrayCollection();
        $this->company_patents = new ArrayCollection();
        $this->company_trademarks = new ArrayCollection();
        $this->staffs = new ArrayCollection();
        $this->company_categories = new ArrayCollection();
        $this->purchase_managements = new ArrayCollection();
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
     * Set logo
     *
     * @param string $logo
     * @return CompanyProfile
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set detail_introduction
     *
     * @param string $detailIntroduction
     * @return CompanyProfile
     */
    public function setDetailIntroduction($detailIntroduction)
    {
        $this->detail_introduction = $detailIntroduction;

        return $this;
    }

    /**
     * Get detail_introduction
     *
     * @return string 
     */
    public function getDetailIntroduction()
    {
        return $this->detail_introduction;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CompanyProfile
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
     * Set reg_address
     *
     * @param string $regAddress
     * @return CompanyProfile
     */
    public function setRegAddress($regAddress)
    {
        $this->reg_address = $regAddress;

        return $this;
    }

    /**
     * Get reg_address
     *
     * @return string 
     */
    public function getRegAddress()
    {
        return $this->reg_address;
    }

    /**
     * Set reg_country_id
     *
     * @param integer $regCountryId
     * @return CompanyProfile
     */
    public function setRegCountryId($regCountryId)
    {
        $this->reg_country_id = $regCountryId;

        return $this;
    }

    /**
     * Get reg_country_id
     *
     * @return integer 
     */
    public function getRegCountryId()
    {
        return $this->reg_country_id;
    }

    /**
     * Set ops_address
     *
     * @param string $opsAddress
     * @return CompanyProfile
     */
    public function setOpsAddress($opsAddress)
    {
        $this->ops_address = $opsAddress;

        return $this;
    }

    /**
     * Get ops_address
     *
     * @return string 
     */
    public function getOpsAddress()
    {
        return $this->ops_address;
    }

    /**
     * Set ops_city
     *
     * @param string $opsCity
     * @return CompanyProfile
     */
    public function setOpsCity($opsCity)
    {
        $this->ops_city = $opsCity;

        return $this;
    }

    /**
     * Get ops_city
     *
     * @return string 
     */
    public function getOpsCity()
    {
        return $this->ops_city;
    }

    /**
     * Set ops_country_id
     *
     * @param integer $opsCountryId
     * @return CompanyProfile
     */
    public function setOpsCountryId($opsCountryId)
    {
        $this->ops_country_id = $opsCountryId;

        return $this;
    }

    /**
     * Get ops_country_id
     *
     * @return integer 
     */
    public function getOpsCountryId()
    {
        return $this->ops_country_id;
    }

    /**
     * Set ops_zip
     *
     * @param string $opsZip
     * @return CompanyProfile
     */
    public function setOpsZip($opsZip)
    {
        $this->ops_zip = $opsZip;

        return $this;
    }

    /**
     * Get ops_zip
     *
     * @return string 
     */
    public function getOpsZip()
    {
        return $this->ops_zip;
    }

    /**
     * Set main_products
     *
     * @param string $mainProducts
     * @return CompanyProfile
     */
    public function setMainProducts($mainProducts)
    {
        $this->main_products = $mainProducts;

        return $this;
    }

    /**
     * Get main_products
     *
     * @return string 
     */
    public function getMainProducts()
    {
        return $this->main_products;
    }

    /**
     * Set others_selling
     *
     * @param string $othersSelling
     * @return CompanyProfile
     */
    public function setOthersSelling($othersSelling)
    {
        $this->others_selling = $othersSelling;

        return $this;
    }

    /**
     * Get others_selling
     *
     * @return string 
     */
    public function getOthersSelling()
    {
        return $this->others_selling;
    }

    /**
     * Set reg_year
     *
     * @param \DateTime $regYear
     * @return CompanyProfile
     */
    public function setRegYear($regYear)
    {
        $this->reg_year = $regYear;

        return $this;
    }

    /**
     * Get reg_year
     *
     * @return \DateTime 
     */
    public function getRegYear()
    {
        return $this->reg_year;
    }

    /**
     * Set total_employee
     *
     * @param integer $totalEmployee
     * @return CompanyProfile
     */
    public function setTotalEmployee($totalEmployee)
    {
        $this->total_employee = $totalEmployee;

        return $this;
    }

    /**
     * Get total_employee
     *
     * @return integer 
     */
    public function getTotalEmployee()
    {
        return $this->total_employee;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return CompanyProfile
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set legal_owner
     *
     * @param string $legalOwner
     * @return CompanyProfile
     */
    public function setLegalOwner($legalOwner)
    {
        $this->legal_owner = $legalOwner;

        return $this;
    }

    /**
     * Get legal_owner
     *
     * @return string 
     */
    public function getLegalOwner()
    {
        return $this->legal_owner;
    }

    /**
     * Set office_site
     *
     * @param integer $officeSite
     * @return CompanyProfile
     */
    public function setOfficeSite($officeSite)
    {
        $this->office_site = $officeSite;

        return $this;
    }

    /**
     * Get office_site
     *
     * @return integer 
     */
    public function getOfficeSite()
    {
        return $this->office_site;
    }

    /**
     * Set company_advantage
     *
     * @param string $companyAdvantage
     * @return CompanyProfile
     */
    public function setCompanyAdvantage($companyAdvantage)
    {
        $this->company_advantage = $companyAdvantage;

        return $this;
    }

    /**
     * Get company_advantage
     *
     * @return string 
     */
    public function getCompanyAdvantage()
    {
        return $this->company_advantage;
    }

    /**
     * Set totalSale_volumn
     *
     * @param string $totalSaleVolumn
     * @return CompanyProfile
     */
    public function setTotalSaleVolumn($totalSaleVolumn)
    {
        $this->totalSale_volumn = $totalSaleVolumn;

        return $this;
    }

    /**
     * Get totalSale_volumn
     *
     * @return string 
     */
    public function getTotalSaleVolumn()
    {
        return $this->totalSale_volumn;
    }

    /**
     * Set export_percentage
     *
     * @param string $exportPercentage
     * @return CompanyProfile
     */
    public function setExportPercentage($exportPercentage)
    {
        $this->export_percentage = $exportPercentage;

        return $this;
    }

    /**
     * Get export_percentage
     *
     * @return string 
     */
    public function getExportPercentage()
    {
        return $this->export_percentage;
    }

    /**
     * Set main_markets_distribution
     *
     * @param string $mainMarketsDistribution
     * @return CompanyProfile
     */
    public function setMainMarketsDistribution($mainMarketsDistribution)
    {
        $this->main_markets_distribution = $mainMarketsDistribution;

        return $this;
    }

    /**
     * Get main_markets_distribution
     *
     * @return string 
     */
    public function getMainMarketsDistribution()
    {
        return $this->main_markets_distribution;
    }

    /**
     * Set year_start_export
     *
     * @param integer $yearStartExport
     * @return CompanyProfile
     */
    public function setYearStartExport($yearStartExport)
    {
        $this->year_start_export = $yearStartExport;

        return $this;
    }

    /**
     * Get year_start_export
     *
     * @return integer 
     */
    public function getYearStartExport()
    {
        return $this->year_start_export;
    }

    /**
     * Set total_trade_staff
     *
     * @param integer $totalTradeStaff
     * @return CompanyProfile
     */
    public function setTotalTradeStaff($totalTradeStaff)
    {
        $this->total_trade_staff = $totalTradeStaff;

        return $this;
    }

    /**
     * Get total_trade_staff
     *
     * @return integer 
     */
    public function getTotalTradeStaff()
    {
        return $this->total_trade_staff;
    }

    /**
     * Set total_rnd_staff
     *
     * @param integer $totalRndStaff
     * @return CompanyProfile
     */
    public function setTotalRndStaff($totalRndStaff)
    {
        $this->total_rnd_staff = $totalRndStaff;

        return $this;
    }

    /**
     * Get total_rnd_staff
     *
     * @return integer 
     */
    public function getTotalRndStaff()
    {
        return $this->total_rnd_staff;
    }

    /**
     * Set total_qc_staff
     *
     * @param integer $totalQcStaff
     * @return CompanyProfile
     */
    public function setTotalQcStaff($totalQcStaff)
    {
        $this->total_qc_staff = $totalQcStaff;

        return $this;
    }

    /**
     * Get total_qc_staff
     *
     * @return integer 
     */
    public function getTotalQcStaff()
    {
        return $this->total_qc_staff;
    }

    /**
     * Set nearest_port
     *
     * @param string $nearestPort
     * @return CompanyProfile
     */
    public function setNearestPort($nearestPort)
    {
        $this->nearest_port = $nearestPort;

        return $this;
    }

    /**
     * Get nearest_port
     *
     * @return string 
     */
    public function getNearestPort()
    {
        return $this->nearest_port;
    }

    /**
     * Set average_lead_time
     *
     * @param integer $averageLeadTime
     * @return CompanyProfile
     */
    public function setAverageLeadTime($averageLeadTime)
    {
        $this->average_lead_time = $averageLeadTime;

        return $this;
    }

    /**
     * Get average_lead_time
     *
     * @return integer 
     */
    public function getAverageLeadTime()
    {
        return $this->average_lead_time;
    }

    /**
     * Set deliver_term
     *
     * @param string $deliverTerm
     * @return CompanyProfile
     */
    public function setDeliverTerm($deliverTerm)
    {
        $this->deliver_term = $deliverTerm;

        return $this;
    }

    /**
     * Get deliver_term
     *
     * @return string 
     */
    public function getDeliverTerm()
    {
        return $this->deliver_term;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return CompanyProfile
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set payment_type
     *
     * @param string $paymentType
     * @return CompanyProfile
     */
    public function setPaymentType($paymentType)
    {
        $this->payment_type = $paymentType;

        return $this;
    }

    /**
     * Get payment_type
     *
     * @return string 
     */
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return CompanyProfile
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set representative_id
     *
     * @param integer $representativeId
     * @return CompanyProfile
     */
    public function setRepresentativeId($representativeId)
    {
        $this->representative_id = $representativeId;

        return $this;
    }

    /**
     * Get representative_id
     *
     * @return integer 
     */
    public function getRepresentativeId()
    {
        return $this->representative_id;
    }

    /**
     * Set member_type
     *
     * @param integer $memberType
     * @return CompanyProfile
     */
    public function setMemberType($memberType)
    {
        $this->member_type = $memberType;

        return $this;
    }

    /**
     * Get member_type
     *
     * @return integer 
     */
    public function getMemberType()
    {
        return $this->member_type;
    }

    /**
     * Set is_verified
     *
     * @param boolean $isVerified
     * @return CompanyProfile
     */
    public function setIsVerified($isVerified)
    {
        $this->is_verified = $isVerified;

        return $this;
    }

    /**
     * Get is_verified
     *
     * @return boolean 
     */
    public function getIsVerified()
    {
        return $this->is_verified;
    }

    /**
     * Add company_customers
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomers
     * @return CompanyProfile
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
     * Add oversea_offices
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffices
     * @return CompanyProfile
     */
    public function addOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffices)
    {
        $this->oversea_offices[] = $overseaOffices;

        return $this;
    }

    /**
     * Remove oversea_offices
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffices
     */
    public function removeOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffices)
    {
        $this->oversea_offices->removeElement($overseaOffices);
    }

    /**
     * Get oversea_offices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOverseaOffices()
    {
        return $this->oversea_offices;
    }

    /**
     * Add company_factories
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactories
     * @return CompanyProfile
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
     * Add company_certifications
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertifications
     * @return CompanyProfile
     */
    public function addCompanyCertification(\WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertifications)
    {
        $this->company_certifications[] = $companyCertifications;

        return $this;
    }

    /**
     * Remove company_certifications
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertifications
     */
    public function removeCompanyCertification(\WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertifications)
    {
        $this->company_certifications->removeElement($companyCertifications);
    }

    /**
     * Get company_certifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyCertifications()
    {
        return $this->company_certifications;
    }

    /**
     * Add company_honor_awards
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAwards
     * @return CompanyProfile
     */
    public function addCompanyHonorAward(\WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAwards)
    {
        $this->company_honor_awards[] = $companyHonorAwards;

        return $this;
    }

    /**
     * Remove company_honor_awards
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAwards
     */
    public function removeCompanyHonorAward(\WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAwards)
    {
        $this->company_honor_awards->removeElement($companyHonorAwards);
    }

    /**
     * Get company_honor_awards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyHonorAwards()
    {
        return $this->company_honor_awards;
    }

    /**
     * Add company_patents
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatents
     * @return CompanyProfile
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
     * Add company_trademarks
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademarks
     * @return CompanyProfile
     */
    public function addCompanyTrademark(\WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademarks)
    {
        $this->company_trademarks[] = $companyTrademarks;

        return $this;
    }

    /**
     * Remove company_trademarks
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademarks
     */
    public function removeCompanyTrademark(\WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademarks)
    {
        $this->company_trademarks->removeElement($companyTrademarks);
    }

    /**
     * Get company_trademarks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyTrademarks()
    {
        return $this->company_trademarks;
    }

    /**
     * Add staffs
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $staffs
     * @return CompanyProfile
     */
    public function addStaff(\WebPlatform\AseagleBundle\Entity\User $staffs)
    {
        $this->staffs[] = $staffs;

        return $this;
    }

    /**
     * Remove staffs
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $staffs
     */
    public function removeStaff(\WebPlatform\AseagleBundle\Entity\User $staffs)
    {
        $this->staffs->removeElement($staffs);
    }

    /**
     * Get staffs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStaffs()
    {
        return $this->staffs;
    }

    /**
     * Add company_categories
     *
     * @param \WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategories
     * @return CompanyProfile
     */
    public function addCompanyCategory(\WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategories)
    {
        $this->company_categories[] = $companyCategories;

        return $this;
    }

    /**
     * Remove company_categories
     *
     * @param \WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategories
     */
    public function removeCompanyCategory(\WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategories)
    {
        $this->company_categories->removeElement($companyCategories);
    }

    /**
     * Get company_categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanyCategories()
    {
        return $this->company_categories;
    }

    /**
     * Set reg_country
     *
     * @param \WebPlatform\AseagleBundle\Entity\Country $regCountry
     * @return CompanyProfile
     */
    public function setRegCountry(\WebPlatform\AseagleBundle\Entity\Country $regCountry = null)
    {
        $this->reg_country = $regCountry;

        return $this;
    }

    /**
     * Get reg_country
     *
     * @return \WebPlatform\AseagleBundle\Entity\Country 
     */
    public function getRegCountry()
    {
        return $this->reg_country;
    }

    /**
     * Set ops_country
     *
     * @param \WebPlatform\AseagleBundle\Entity\Country $opsCountry
     * @return CompanyProfile
     */
    public function setOpsCountry(\WebPlatform\AseagleBundle\Entity\Country $opsCountry = null)
    {
        $this->ops_country = $opsCountry;

        return $this;
    }

    /**
     * Get ops_country
     *
     * @return \WebPlatform\AseagleBundle\Entity\Country 
     */
    public function getOpsCountry()
    {
        return $this->ops_country;
    }

    /**
     * Add purchase_managements
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagements
     * @return CompanyProfile
     */
    public function addPurchaseManagement(\WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagements)
    {
        $this->purchase_managements[] = $purchaseManagements;

        return $this;
    }

    /**
     * Remove purchase_managements
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagements
     */
    public function removePurchaseManagement(\WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagements)
    {
        $this->purchase_managements->removeElement($purchaseManagements);
    }

    /**
     * Get purchase_managements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPurchaseManagements()
    {
        return $this->purchase_managements;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return CompanyProfile
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
