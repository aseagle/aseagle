<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanyHonorAward
 *
 * @ORM\Table(name="company_honor_award")
 * @ORM\Entity
 */
class CompanyHonorAward
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
     * @var \DateTime
     *
     * @ORM\Column(name="issued_by", type="date")
     */
    private $issued_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date")
     */
    private $start_date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1040)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="company_honor_awards")
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
     * @return CompanyHonorAward
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
     * Set description
     *
     * @param string $description
     * @return CompanyHonorAward
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set issued_by
     *
     * @param \DateTime $issuedBy
     * @return CompanyHonorAward
     */
    public function setIssuedBy($issuedBy)
    {
        $this->issued_by = $issuedBy;

        return $this;
    }

    /**
     * Get issued_by
     *
     * @return \DateTime 
     */
    public function getIssuedBy()
    {
        return $this->issued_by;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return CompanyHonorAward
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
     * Set company_id
     *
     * @param integer $companyId
     * @return CompanyHonorAward
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
     * @return CompanyHonorAward
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
