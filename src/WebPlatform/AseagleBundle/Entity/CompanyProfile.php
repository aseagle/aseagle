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
     * @ORM\Column(name="detail_introduction", type="string", length=4096, nullable=true)
     */
    private $detail_introduction = null;

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
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_number", type="string", length=255)
     */
    private $registration_number;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=15)
     */
    private $phone_number;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

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
     * @var integer
     *
     * @ORM\Column(name="annual_revenue", type="integer", nullable=true)
     */
    private $annual_revenue = null;

    /**
     * @var string
     *
     * @ORM\Column(name="annual_revenue_currency", type="string", length=10, nullable=true)
     */
    private $annual_revenue_currency = null;

    /**
     * @var string
     *
     * @ORM\Column(name="global_offices", type="string", length=255, nullable=true)
     */
    private $global_offices = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_address", type="string", length=255, nullable=true)
     */
    private $ops_address = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_city", type="string", length=255, nullable=true)
     */
    private $ops_city = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="ops_country_id", type="integer", nullable=true)
     */
    private $ops_country_id = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ops_zip", type="string", length=16, nullable=true)
     */
    private $ops_zip = null;

    /**
     * @var string
     *
     * @ORM\Column(name="main_products", type="string", length=4096, nullable=true)
     */
    private $main_products=null;

    /**
     * @var string
     *
     * @ORM\Column(name="others_selling", type="string", length=4096, nullable=true)
     */
    private $others_selling = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_year", type="date")
     */
    private $reg_year;

    /**
     * @var string
     *
     * @ORM\Column(name="total_employee", type="string", length=20, nullable=true)
     */
    private $total_employee = null;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=128)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="legal_owner", type="string", length=255, nullable=true)
     */
    private $legal_owner = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="office_site", type="integer", nullable=true)
     */
    private $office_site = null;

    /**
     * @var string
     *
     * @ORM\Column(name="company_advantage", type="string", length=1024, nullable=true)
     */
    private $company_advantage = null;

    /**
     * @var string
     *
     * @ORM\Column(name="total_sale_volumn", type="string", length=255, nullable=true)
     */
    private $totalSale_volumn = null;

    /**
     * @var string
     *
     * @ORM\Column(name="export_percentage", type="string", length=255, nullable=true)
     */
    private $export_percentage = null;

    /**
     * @var string
     *
     * @ORM\Column(name="main_markets_distribution", type="string", length=255, nullable=true)
     */
    private $main_markets_distribution = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="year_start_export", type="integer", nullable=true)
     */
    private $year_start_export = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_trade_staff", type="integer", nullable=true)
     */
    private $total_trade_staff = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_rnd_staff", type="integer", nullable=true)
     */
    private $total_rnd_staff = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_qc_staff", type="integer", nullable=true)
     */
    private $total_qc_staff = null;

    /**
     * @var string
     *
     * @ORM\Column(name="nearest_port", type="string", length=255, nullable=true)
     */
    private $nearest_port = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="average_lead_time", type="integer", nullable=true)
     */
    private $average_lead_time = null;

    /**
     * @var string
     *
     * @ORM\Column(name="deliver_term", type="string", length=255, nullable=true)
     */
    private $deliver_term = null;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255, nullable=true)
     */
    private $currency = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_type", type="string", length=255, nullable=true)
     */
    private $payment_type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255, nullable=true)
     */
    private $language = null;

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

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="company")
     */
    protected $products;

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
        $this->products = new ArrayCollection();
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
     *
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
     * Set detailIntroduction
     *
     * @param string $detailIntroduction
     *
     * @return CompanyProfile
     */
    public function setDetailIntroduction($detailIntroduction)
    {
        $this->detail_introduction = $detailIntroduction;

        return $this;
    }

    /**
     * Get detailIntroduction
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
     *
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

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return CompanyProfile
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set registrationNumber
     *
     * @param string $registrationNumber
     *
     * @return CompanyProfile
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registration_number = $registrationNumber;

        return $this;
    }

    /**
     * Get registrationNumber
     *
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registration_number;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return CompanyProfile
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CompanyProfile
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
     * Set regAddress
     *
     * @param string $regAddress
     *
     * @return CompanyProfile
     */
    public function setRegAddress($regAddress)
    {
        $this->reg_address = $regAddress;

        return $this;
    }

    /**
     * Get regAddress
     *
     * @return string
     */
    public function getRegAddress()
    {
        return $this->reg_address;
    }

    /**
     * Set regCountryId
     *
     * @param integer $regCountryId
     *
     * @return CompanyProfile
     */
    public function setRegCountryId($regCountryId)
    {
        $this->reg_country_id = $regCountryId;

        return $this;
    }

    /**
     * Get regCountryId
     *
     * @return integer
     */
    public function getRegCountryId()
    {
        return $this->reg_country_id;
    }

    /**
     * Set annualRevenue
     *
     * @param integer $annualRevenue
     *
     * @return CompanyProfile
     */
    public function setAnnualRevenue($annualRevenue)
    {
        $this->annual_revenue = $annualRevenue;

        return $this;
    }

    /**
     * Get annualRevenue
     *
     * @return integer
     */
    public function getAnnualRevenue()
    {
        return $this->annual_revenue;
    }

    /**
     * Set annualRevenueCurrency
     *
     * @param string $annualRevenueCurrency
     *
     * @return CompanyProfile
     */
    public function setAnnualRevenueCurrency($annualRevenueCurrency)
    {
        $this->annual_revenue_currency = $annualRevenueCurrency;

        return $this;
    }

    /**
     * Get annualRevenueCurrency
     *
     * @return string
     */
    public function getAnnualRevenueCurrency()
    {
        return $this->annual_revenue_currency;
    }

    /**
     * Set globalOffices
     *
     * @param string $globalOffices
     *
     * @return CompanyProfile
     */
    public function setGlobalOffices($globalOffices)
    {
        $this->global_offices = $globalOffices;

        return $this;
    }

    /**
     * Get globalOffices
     *
     * @return string
     */
    public function getGlobalOffices()
    {
        return $this->global_offices;
    }

    /**
     * Set opsAddress
     *
     * @param string $opsAddress
     *
     * @return CompanyProfile
     */
    public function setOpsAddress($opsAddress)
    {
        $this->ops_address = $opsAddress;

        return $this;
    }

    /**
     * Get opsAddress
     *
     * @return string
     */
    public function getOpsAddress()
    {
        return $this->ops_address;
    }

    /**
     * Set opsCity
     *
     * @param string $opsCity
     *
     * @return CompanyProfile
     */
    public function setOpsCity($opsCity)
    {
        $this->ops_city = $opsCity;

        return $this;
    }

    /**
     * Get opsCity
     *
     * @return string
     */
    public function getOpsCity()
    {
        return $this->ops_city;
    }

    /**
     * Set opsCountryId
     *
     * @param integer $opsCountryId
     *
     * @return CompanyProfile
     */
    public function setOpsCountryId($opsCountryId)
    {
        $this->ops_country_id = $opsCountryId;

        return $this;
    }

    /**
     * Get opsCountryId
     *
     * @return integer
     */
    public function getOpsCountryId()
    {
        return $this->ops_country_id;
    }

    /**
     * Set opsZip
     *
     * @param string $opsZip
     *
     * @return CompanyProfile
     */
    public function setOpsZip($opsZip)
    {
        $this->ops_zip = $opsZip;

        return $this;
    }

    /**
     * Get opsZip
     *
     * @return string
     */
    public function getOpsZip()
    {
        return $this->ops_zip;
    }

    /**
     * Set mainProducts
     *
     * @param string $mainProducts
     *
     * @return CompanyProfile
     */
    public function setMainProducts($mainProducts)
    {
        $this->main_products = $mainProducts;

        return $this;
    }

    /**
     * Get mainProducts
     *
     * @return string
     */
    public function getMainProducts()
    {
        return $this->main_products;
    }

    /**
     * Set othersSelling
     *
     * @param string $othersSelling
     *
     * @return CompanyProfile
     */
    public function setOthersSelling($othersSelling)
    {
        $this->others_selling = $othersSelling;

        return $this;
    }

    /**
     * Get othersSelling
     *
     * @return string
     */
    public function getOthersSelling()
    {
        return $this->others_selling;
    }

    /**
     * Set regYear
     *
     * @param \DateTime $regYear
     *
     * @return CompanyProfile
     */
    public function setRegYear($regYear)
    {
        $this->reg_year = $regYear;

        return $this;
    }

    /**
     * Get regYear
     *
     * @return \DateTime
     */
    public function getRegYear()
    {
        return $this->reg_year;
    }

    /**
     * Set totalEmployee
     *
     * @param string $totalEmployee
     *
     * @return CompanyProfile
     */
    public function setTotalEmployee($totalEmployee)
    {
        $this->total_employee = $totalEmployee;

        return $this;
    }

    /**
     * Get totalEmployee
     *
     * @return string
     */
    public function getTotalEmployee()
    {
        return $this->total_employee;
    }

    /**
     * Set website
     *
     * @param string $website
     *
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
     * Set legalOwner
     *
     * @param string $legalOwner
     *
     * @return CompanyProfile
     */
    public function setLegalOwner($legalOwner)
    {
        $this->legal_owner = $legalOwner;

        return $this;
    }

    /**
     * Get legalOwner
     *
     * @return string
     */
    public function getLegalOwner()
    {
        return $this->legal_owner;
    }

    /**
     * Set officeSite
     *
     * @param integer $officeSite
     *
     * @return CompanyProfile
     */
    public function setOfficeSite($officeSite)
    {
        $this->office_site = $officeSite;

        return $this;
    }

    /**
     * Get officeSite
     *
     * @return integer
     */
    public function getOfficeSite()
    {
        return $this->office_site;
    }

    /**
     * Set companyAdvantage
     *
     * @param string $companyAdvantage
     *
     * @return CompanyProfile
     */
    public function setCompanyAdvantage($companyAdvantage)
    {
        $this->company_advantage = $companyAdvantage;

        return $this;
    }

    /**
     * Get companyAdvantage
     *
     * @return string
     */
    public function getCompanyAdvantage()
    {
        return $this->company_advantage;
    }

    /**
     * Set totalSaleVolumn
     *
     * @param string $totalSaleVolumn
     *
     * @return CompanyProfile
     */
    public function setTotalSaleVolumn($totalSaleVolumn)
    {
        $this->totalSale_volumn = $totalSaleVolumn;

        return $this;
    }

    /**
     * Get totalSaleVolumn
     *
     * @return string
     */
    public function getTotalSaleVolumn()
    {
        return $this->totalSale_volumn;
    }

    /**
     * Set exportPercentage
     *
     * @param string $exportPercentage
     *
     * @return CompanyProfile
     */
    public function setExportPercentage($exportPercentage)
    {
        $this->export_percentage = $exportPercentage;

        return $this;
    }

    /**
     * Get exportPercentage
     *
     * @return string
     */
    public function getExportPercentage()
    {
        return $this->export_percentage;
    }

    /**
     * Set mainMarketsDistribution
     *
     * @param string $mainMarketsDistribution
     *
     * @return CompanyProfile
     */
    public function setMainMarketsDistribution($mainMarketsDistribution)
    {
        $this->main_markets_distribution = $mainMarketsDistribution;

        return $this;
    }

    /**
     * Get mainMarketsDistribution
     *
     * @return string
     */
    public function getMainMarketsDistribution()
    {
        return $this->main_markets_distribution;
    }

    /**
     * Set yearStartExport
     *
     * @param integer $yearStartExport
     *
     * @return CompanyProfile
     */
    public function setYearStartExport($yearStartExport)
    {
        $this->year_start_export = $yearStartExport;

        return $this;
    }

    /**
     * Get yearStartExport
     *
     * @return integer
     */
    public function getYearStartExport()
    {
        return $this->year_start_export;
    }

    /**
     * Set totalTradeStaff
     *
     * @param integer $totalTradeStaff
     *
     * @return CompanyProfile
     */
    public function setTotalTradeStaff($totalTradeStaff)
    {
        $this->total_trade_staff = $totalTradeStaff;

        return $this;
    }

    /**
     * Get totalTradeStaff
     *
     * @return integer
     */
    public function getTotalTradeStaff()
    {
        return $this->total_trade_staff;
    }

    /**
     * Set totalRndStaff
     *
     * @param integer $totalRndStaff
     *
     * @return CompanyProfile
     */
    public function setTotalRndStaff($totalRndStaff)
    {
        $this->total_rnd_staff = $totalRndStaff;

        return $this;
    }

    /**
     * Get totalRndStaff
     *
     * @return integer
     */
    public function getTotalRndStaff()
    {
        return $this->total_rnd_staff;
    }

    /**
     * Set totalQcStaff
     *
     * @param integer $totalQcStaff
     *
     * @return CompanyProfile
     */
    public function setTotalQcStaff($totalQcStaff)
    {
        $this->total_qc_staff = $totalQcStaff;

        return $this;
    }

    /**
     * Get totalQcStaff
     *
     * @return integer
     */
    public function getTotalQcStaff()
    {
        return $this->total_qc_staff;
    }

    /**
     * Set nearestPort
     *
     * @param string $nearestPort
     *
     * @return CompanyProfile
     */
    public function setNearestPort($nearestPort)
    {
        $this->nearest_port = $nearestPort;

        return $this;
    }

    /**
     * Get nearestPort
     *
     * @return string
     */
    public function getNearestPort()
    {
        return $this->nearest_port;
    }

    /**
     * Set averageLeadTime
     *
     * @param integer $averageLeadTime
     *
     * @return CompanyProfile
     */
    public function setAverageLeadTime($averageLeadTime)
    {
        $this->average_lead_time = $averageLeadTime;

        return $this;
    }

    /**
     * Get averageLeadTime
     *
     * @return integer
     */
    public function getAverageLeadTime()
    {
        return $this->average_lead_time;
    }

    /**
     * Set deliverTerm
     *
     * @param string $deliverTerm
     *
     * @return CompanyProfile
     */
    public function setDeliverTerm($deliverTerm)
    {
        $this->deliver_term = $deliverTerm;

        return $this;
    }

    /**
     * Get deliverTerm
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
     *
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
     * Set paymentType
     *
     * @param string $paymentType
     *
     * @return CompanyProfile
     */
    public function setPaymentType($paymentType)
    {
        $this->payment_type = $paymentType;

        return $this;
    }

    /**
     * Get paymentType
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
     *
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
     * Set representativeId
     *
     * @param integer $representativeId
     *
     * @return CompanyProfile
     */
    public function setRepresentativeId($representativeId)
    {
        $this->representative_id = $representativeId;

        return $this;
    }

    /**
     * Get representativeId
     *
     * @return integer
     */
    public function getRepresentativeId()
    {
        return $this->representative_id;
    }

    /**
     * Set memberType
     *
     * @param integer $memberType
     *
     * @return CompanyProfile
     */
    public function setMemberType($memberType)
    {
        $this->member_type = $memberType;

        return $this;
    }

    /**
     * Get memberType
     *
     * @return integer
     */
    public function getMemberType()
    {
        return $this->member_type;
    }

    /**
     * Set isVerified
     *
     * @param boolean $isVerified
     *
     * @return CompanyProfile
     */
    public function setIsVerified($isVerified)
    {
        $this->is_verified = $isVerified;

        return $this;
    }

    /**
     * Get isVerified
     *
     * @return boolean
     */
    public function getIsVerified()
    {
        return $this->is_verified;
    }

    /**
     * Add companyCustomer
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomer
     *
     * @return CompanyProfile
     */
    public function addCompanyCustomer(\WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomer)
    {
        $this->company_customers[] = $companyCustomer;

        return $this;
    }

    /**
     * Remove companyCustomer
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomer
     */
    public function removeCompanyCustomer(\WebPlatform\AseagleBundle\Entity\CompanyCustomer $companyCustomer)
    {
        $this->company_customers->removeElement($companyCustomer);
    }

    /**
     * Get companyCustomers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyCustomers()
    {
        return $this->company_customers;
    }

    /**
     * Add overseaOffice
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffice
     *
     * @return CompanyProfile
     */
    public function addOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffice)
    {
        $this->oversea_offices[] = $overseaOffice;

        return $this;
    }

    /**
     * Remove overseaOffice
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffice
     */
    public function removeOverseaOffice(\WebPlatform\AseagleBundle\Entity\CompanyOverseaOffice $overseaOffice)
    {
        $this->oversea_offices->removeElement($overseaOffice);
    }

    /**
     * Get overseaOffices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOverseaOffices()
    {
        return $this->oversea_offices;
    }

    /**
     * Add companyFactory
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactory
     *
     * @return CompanyProfile
     */
    public function addCompanyFactory(\WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactory)
    {
        $this->company_factories[] = $companyFactory;

        return $this;
    }

    /**
     * Remove companyFactory
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactory
     */
    public function removeCompanyFactory(\WebPlatform\AseagleBundle\Entity\CompanyFactory $companyFactory)
    {
        $this->company_factories->removeElement($companyFactory);
    }

    /**
     * Get companyFactories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyFactories()
    {
        return $this->company_factories;
    }

    /**
     * Add companyCertification
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertification
     *
     * @return CompanyProfile
     */
    public function addCompanyCertification(\WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertification)
    {
        $this->company_certifications[] = $companyCertification;

        return $this;
    }

    /**
     * Remove companyCertification
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertification
     */
    public function removeCompanyCertification(\WebPlatform\AseagleBundle\Entity\CompanyCertification $companyCertification)
    {
        $this->company_certifications->removeElement($companyCertification);
    }

    /**
     * Get companyCertifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyCertifications()
    {
        return $this->company_certifications;
    }

    /**
     * Add companyHonorAward
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAward
     *
     * @return CompanyProfile
     */
    public function addCompanyHonorAward(\WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAward)
    {
        $this->company_honor_awards[] = $companyHonorAward;

        return $this;
    }

    /**
     * Remove companyHonorAward
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAward
     */
    public function removeCompanyHonorAward(\WebPlatform\AseagleBundle\Entity\CompanyHonorAward $companyHonorAward)
    {
        $this->company_honor_awards->removeElement($companyHonorAward);
    }

    /**
     * Get companyHonorAwards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyHonorAwards()
    {
        return $this->company_honor_awards;
    }

    /**
     * Add companyPatent
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatent
     *
     * @return CompanyProfile
     */
    public function addCompanyPatent(\WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatent)
    {
        $this->company_patents[] = $companyPatent;

        return $this;
    }

    /**
     * Remove companyPatent
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatent
     */
    public function removeCompanyPatent(\WebPlatform\AseagleBundle\Entity\CompanyPatent $companyPatent)
    {
        $this->company_patents->removeElement($companyPatent);
    }

    /**
     * Get companyPatents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyPatents()
    {
        return $this->company_patents;
    }

    /**
     * Add companyTrademark
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademark
     *
     * @return CompanyProfile
     */
    public function addCompanyTrademark(\WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademark)
    {
        $this->company_trademarks[] = $companyTrademark;

        return $this;
    }

    /**
     * Remove companyTrademark
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademark
     */
    public function removeCompanyTrademark(\WebPlatform\AseagleBundle\Entity\CompanyTrademark $companyTrademark)
    {
        $this->company_trademarks->removeElement($companyTrademark);
    }

    /**
     * Get companyTrademarks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyTrademarks()
    {
        return $this->company_trademarks;
    }

    /**
     * Add staff
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $staff
     *
     * @return CompanyProfile
     */
    public function addStaff(\WebPlatform\AseagleBundle\Entity\User $staff)
    {
        $this->staffs[] = $staff;

        return $this;
    }

    /**
     * Remove staff
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $staff
     */
    public function removeStaff(\WebPlatform\AseagleBundle\Entity\User $staff)
    {
        $this->staffs->removeElement($staff);
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
     * Add companyCategory
     *
     * @param \WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategory
     *
     * @return CompanyProfile
     */
    public function addCompanyCategory(\WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategory)
    {
        $this->company_categories[] = $companyCategory;

        return $this;
    }

    /**
     * Remove companyCategory
     *
     * @param \WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategory
     */
    public function removeCompanyCategory(\WebPlatform\AseagleBundle\Entity\SupplierCategory $companyCategory)
    {
        $this->company_categories->removeElement($companyCategory);
    }

    /**
     * Get companyCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanyCategories()
    {
        return $this->company_categories;
    }

    /**
     * Set regCountry
     *
     * @param \WebPlatform\AseagleBundle\Entity\Country $regCountry
     *
     * @return CompanyProfile
     */
    public function setRegCountry(\WebPlatform\AseagleBundle\Entity\Country $regCountry = null)
    {
        $this->reg_country = $regCountry;

        return $this;
    }

    /**
     * Get regCountry
     *
     * @return \WebPlatform\AseagleBundle\Entity\Country
     */
    public function getRegCountry()
    {
        return $this->reg_country;
    }

    /**
     * Set opsCountry
     *
     * @param \WebPlatform\AseagleBundle\Entity\Country $opsCountry
     *
     * @return CompanyProfile
     */
    public function setOpsCountry(\WebPlatform\AseagleBundle\Entity\Country $opsCountry = null)
    {
        $this->ops_country = $opsCountry;

        return $this;
    }

    /**
     * Get opsCountry
     *
     * @return \WebPlatform\AseagleBundle\Entity\Country
     */
    public function getOpsCountry()
    {
        return $this->ops_country;
    }

    /**
     * Add purchaseManagement
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement
     *
     * @return CompanyProfile
     */
    public function addPurchaseManagement(\WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement)
    {
        $this->purchase_managements[] = $purchaseManagement;

        return $this;
    }

    /**
     * Remove purchaseManagement
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement
     */
    public function removePurchaseManagement(\WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement)
    {
        $this->purchase_managements->removeElement($purchaseManagement);
    }

    /**
     * Get purchaseManagements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPurchaseManagements()
    {
        return $this->purchase_managements;
    }

    /**
     * Add product
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $product
     *
     * @return CompanyProfile
     */
    public function addProduct(\WebPlatform\AseagleBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $product
     */
    public function removeProduct(\WebPlatform\AseagleBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
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
}
