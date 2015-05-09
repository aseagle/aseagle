<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * BuyingRequest
 *
 * @ORM\Table(name="buying_request")
 * @ORM\Entity
 */
class BuyingRequest
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
     * @ORM\Column(name="group_id", type="integer", nullable=true)
     */
    private $group_id = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="buyer_id", type="integer")
     */
    private $buyer_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $category_id = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $product_id = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=true)
     */
    private $company_id = null;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="buying_request_message", type="text")
     */
    private $buying_request_message;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity_type", type="string", length=255)
     */
    private $quantity_type;

    /**
     * @var datetime
     *
     * @ORM\Column(name="expired_date", type="datetime")
     */
    private $expired_date;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="buying_requests")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="buying_requests")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     */
    protected $buyer;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="buying_requests")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\OneToMany(targetEntity="PurchaseManagement", mappedBy="buying_request")
     */
    protected $purchase_managements;


    public function __construct()
    {
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
     * Set group_id
     *
     * @param integer $groupId
     * @return BuyingRequest
     */
    public function setGroupId($groupId)
    {
        $this->group_id = $groupId;

        return $this;
    }

    /**
     * Get group_id
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set buyer_id
     *
     * @param integer $buyerId
     * @return BuyingRequest
     */
    public function setBuyerId($buyerId)
    {
        $this->buyer_id = $buyerId;

        return $this;
    }

    /**
     * Get buyer_id
     *
     * @return integer 
     */
    public function getBuyerId()
    {
        return $this->buyer_id;
    }

    /**
     * Set category_id
     *
     * @param integer $categoryId
     * @return BuyingRequest
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return BuyingRequest
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get product_id
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return BuyingRequest
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
     * Set title
     *
     * @param string $title
     * @return BuyingRequest
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set buying_request_message
     *
     * @param string $buyingRequestMessage
     * @return BuyingRequest
     */
    public function setBuyingRequestMessage($buyingRequestMessage)
    {
        $this->buying_request_message = $buyingRequestMessage;

        return $this;
    }

    /**
     * Get buying_request_message
     *
     * @return string 
     */
    public function getBuyingRequestMessage()
    {
        return $this->buying_request_message;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return BuyingRequest
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity_type
     *
     * @param string $quantityType
     * @return BuyingRequest
     */
    public function setQuantityType($quantityType)
    {
        $this->quantity_type = $quantityType;

        return $this;
    }

    /**
     * Get quantity_type
     *
     * @return string 
     */
    public function getQuantityType()
    {
        return $this->quantity_type;
    }

    /**
     * Set expired_date
     *
     * @param \DateTime $expiredDate
     * @return BuyingRequest
     */
    public function setExpiredDate($expiredDate)
    {
        $this->expired_date = $expiredDate;

        return $this;
    }

    /**
     * Get expired_date
     *
     * @return \DateTime 
     */
    public function getExpiredDate()
    {
        return $this->expired_date;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return BuyingRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set category
     *
     * @param \WebPlatform\AseagleBundle\Entity\Category $category
     * @return BuyingRequest
     */
    public function setCategory(\WebPlatform\AseagleBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \WebPlatform\AseagleBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set buyer
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $buyer
     * @return BuyingRequest
     */
    public function setBuyer(\WebPlatform\AseagleBundle\Entity\User $buyer = null)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set product
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $product
     * @return BuyingRequest
     */
    public function setProduct(\WebPlatform\AseagleBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \WebPlatform\AseagleBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add purchase_managements
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagements
     * @return BuyingRequest
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
}
