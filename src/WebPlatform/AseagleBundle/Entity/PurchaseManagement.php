<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PurchaseManagement
 *
 * @ORM\Table(name="purchase_management")
 * @ORM\Entity
 */
class PurchaseManagement
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
     * @ORM\Column(name="company_id", type="integer")
     */
    private $company_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="buying_request_id", type="integer")
     */
    private $buying_request_id;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="purchase_managements")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * @ORM\ManyToOne(targetEntity="BuyingRequest", inversedBy="purchase_managements")
     * @ORM\JoinColumn(name="buying_request_id", referencedColumnName="id")
     */
    protected $buying_request;

    /**
     * @ORM\OneToOne(targetEntity="Quotation", mappedBy="purchase_management")
     */
    protected $quotation;

    public function __construct()
    {

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
     * Set company_id
     *
     * @param integer $companyId
     * @return PurchaseManagement
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
     * Set buying_request_id
     *
     * @param integer $buyingRequestId
     * @return PurchaseManagement
     */
    public function setBuyingRequestId($buyingRequestId)
    {
        $this->buying_request_id = $buyingRequestId;

        return $this;
    }

    /**
     * Get buying_request_id
     *
     * @return integer 
     */
    public function getBuyingRequestId()
    {
        return $this->buying_request_id;
    }

    /**
     * Set company
     *
     * @param \WebPlatform\AseagleBundle\Entity\CompanyProfile $company
     * @return PurchaseManagement
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
     * Set buying_request
     *
     * @param \WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequest
     * @return PurchaseManagement
     */
    public function setBuyingRequest(\WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequest = null)
    {
        $this->buying_request = $buyingRequest;

        return $this;
    }

    /**
     * Get buying_request
     *
     * @return \WebPlatform\AseagleBundle\Entity\BuyingRequest 
     */
    public function getBuyingRequest()
    {
        return $this->buying_request;
    }

    /**
     * Set quotation
     *
     * @param \WebPlatform\AseagleBundle\Entity\Quotation $quotation
     * @return PurchaseManagement
     */
    public function setQuotation(\WebPlatform\AseagleBundle\Entity\Quotation $quotation = null)
    {
        $this->quotation = $quotation;

        return $this;
    }

    /**
     * Get quotation
     *
     * @return \WebPlatform\AseagleBundle\Entity\Quotation 
     */
    public function getQuotation()
    {
        return $this->quotation;
    }
}
