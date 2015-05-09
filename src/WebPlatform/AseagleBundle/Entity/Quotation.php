<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quotation
 *
 * @ORM\Table(name="quotation")
 * @ORM\Entity
 */
class Quotation
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
     * @ORM\Column(name="purchase_management_id", type="integer")
     */
    private $purchase_management_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="seller_id", type="integer")
     */
    private $seller_id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_archived", type="boolean")
     */
    private $is_archived;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $product_id;

    /**
     * @var string
     *
     * @ORM\Column(name="quote_message", type="text")
     */
    private $quote_message;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255, nullable=true)
     */
    private $currency = null;

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
     * @var string
     *
     * @ORM\Column(name="payment_term", type="string", length=255)
     */
    private $payment_term;

    /**
     * @var string
     *
     * @ORM\Column(name="deliver_time", type="string", length=255)
     */
    private $deliver_time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expired_date", type="datetime")
     */
    private $expired_date;

    /**
     * @ORM\OneToOne(targetEntity="PurchaseManagement", inversedBy="quotation")
     * @ORM\JoinColumn(name="purchase_management_id", referencedColumnName="id")
     */
    protected $purchase_management;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="quotations")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="quotations")
     * @ORM\JoinColumn(name="seller_id", referencedColumnName="id")
     */
    protected $seller;





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
     * Set purchase_management_id
     *
     * @param integer $purchaseManagementId
     * @return Quotation
     */
    public function setPurchaseManagementId($purchaseManagementId)
    {
        $this->purchase_management_id = $purchaseManagementId;

        return $this;
    }

    /**
     * Get purchase_management_id
     *
     * @return integer 
     */
    public function getPurchaseManagementId()
    {
        return $this->purchase_management_id;
    }

    /**
     * Set seller_id
     *
     * @param integer $sellerId
     * @return Quotation
     */
    public function setSellerId($sellerId)
    {
        $this->seller_id = $sellerId;

        return $this;
    }

    /**
     * Get seller_id
     *
     * @return integer 
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * Set is_archived
     *
     * @param boolean $isArchived
     * @return Quotation
     */
    public function setIsArchived($isArchived)
    {
        $this->is_archived = $isArchived;

        return $this;
    }

    /**
     * Get is_archived
     *
     * @return boolean 
     */
    public function getIsArchived()
    {
        return $this->is_archived;
    }

    /**
     * Set product_id
     *
     * @param integer $productId
     * @return Quotation
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
     * Set quote_message
     *
     * @param string $quoteMessage
     * @return Quotation
     */
    public function setQuoteMessage($quoteMessage)
    {
        $this->quote_message = $quoteMessage;

        return $this;
    }

    /**
     * Get quote_message
     *
     * @return string 
     */
    public function getQuoteMessage()
    {
        return $this->quote_message;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Quotation
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Quotation
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Quotation
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
     * @return Quotation
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
     * Set payment_term
     *
     * @param string $paymentTerm
     * @return Quotation
     */
    public function setPaymentTerm($paymentTerm)
    {
        $this->payment_term = $paymentTerm;

        return $this;
    }

    /**
     * Get payment_term
     *
     * @return string 
     */
    public function getPaymentTerm()
    {
        return $this->payment_term;
    }

    /**
     * Set deliver_time
     *
     * @param string $deliverTime
     * @return Quotation
     */
    public function setDeliverTime($deliverTime)
    {
        $this->deliver_time = $deliverTime;

        return $this;
    }

    /**
     * Get deliver_time
     *
     * @return string 
     */
    public function getDeliverTime()
    {
        return $this->deliver_time;
    }

    /**
     * Set expired_date
     *
     * @param \DateTime $expiredDate
     * @return Quotation
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
     * Set purchase_management
     *
     * @param \WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement
     * @return Quotation
     */
    public function setPurchaseManagement(\WebPlatform\AseagleBundle\Entity\PurchaseManagement $purchaseManagement = null)
    {
        $this->purchase_management = $purchaseManagement;

        return $this;
    }

    /**
     * Get purchase_management
     *
     * @return \WebPlatform\AseagleBundle\Entity\PurchaseManagement 
     */
    public function getPurchaseManagement()
    {
        return $this->purchase_management;
    }

    /**
     * Set product
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $product
     * @return Quotation
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
     * Set seller
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $seller
     * @return Quotation
     */
    public function setSeller(\WebPlatform\AseagleBundle\Entity\User $seller = null)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Get seller
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getSeller()
    {
        return $this->seller;
    }
}
