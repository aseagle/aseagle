<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyTrademark
 *
 * @ORM\Table(name="company_trademark")
 * @ORM\Entity
 */
class CompanyTrademark
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
     * @ORM\Column(name="registration_number", type="string", length=32)
     */
    private $registration_number;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $start_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date")
     */
    private $end_date;

    /**
     * @var string
     *
     * @ORM\Column(name="approved_goods", type="string", length=1024)
     */
    private $approved_goods;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="company_trademarks")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
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
     * Set name
     *
     * @param string $name
     * @return CompanyTrademark
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
     * Set registration_number
     *
     * @param string $registrationNumber
     * @return CompanyTrademark
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registration_number = $registrationNumber;

        return $this;
    }

    /**
     * Get registration_number
     *
     * @return string 
     */
    public function getRegistrationNumber()
    {
        return $this->registration_number;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return CompanyTrademark
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return CompanyTrademark
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set approved_goods
     *
     * @param string $approvedGoods
     * @return CompanyTrademark
     */
    public function setApprovedGoods($approvedGoods)
    {
        $this->approved_goods = $approvedGoods;

        return $this;
    }

    /**
     * Get approved_goods
     *
     * @return string 
     */
    public function getApprovedGoods()
    {
        return $this->approved_goods;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return CompanyTrademark
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
     * @return CompanyTrademark
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
