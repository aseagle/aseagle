<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity
 */
class Transaction
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
     * @ORM\Column(name="buyer_id", type="integer")
     */
    private $buyerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="seller_id", type="integer")
     */
    private $sellerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="buyer_ask_quantity", type="integer", nullable=true)
     */
    private $buyerAskQuantity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="seller_quotation", type="string", length=500, nullable=true)
     */
    private $sellerQuotation = null;

    /**
     * @var string
     *
     * @ORM\Column(name="negotiation", type="text", nullable=true)
     */
    private $negotiation = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = null;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="transactions")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="buyer_transactions")
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     */
    protected $buyer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="seller_transactions")
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
     * Set buyerId
     *
     * @param integer $buyerId
     * @return Transaction
     */
    public function setBuyerId($buyerId)
    {
        $this->buyerId = $buyerId;

        return $this;
    }

    /**
     * Get buyerId
     *
     * @return integer 
     */
    public function getBuyerId()
    {
        return $this->buyerId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return Transaction
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set sellerId
     *
     * @param integer $sellerId
     * @return Transaction
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;

        return $this;
    }

    /**
     * Get sellerId
     *
     * @return integer 
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * Set buyerAskQuantity
     *
     * @param integer $buyerAskQuantity
     * @return Transaction
     */
    public function setBuyerAskQuantity($buyerAskQuantity)
    {
        $this->buyerAskQuantity = $buyerAskQuantity;

        return $this;
    }

    /**
     * Get buyerAskQuantity
     *
     * @return integer 
     */
    public function getBuyerAskQuantity()
    {
        return $this->buyerAskQuantity;
    }

    /**
     * Set sellerQuotation
     *
     * @param string $sellerQuotation
     * @return Transaction
     */
    public function setSellerQuotation($sellerQuotation)
    {
        $this->sellerQuotation = $sellerQuotation;

        return $this;
    }

    /**
     * Get sellerQuotation
     *
     * @return string 
     */
    public function getSellerQuotation()
    {
        return $this->sellerQuotation;
    }

    /**
     * Set negotiation
     *
     * @param string $negotiation
     * @return Transaction
     */
    public function setNegotiation($negotiation)
    {
        $this->negotiation = $negotiation;

        return $this;
    }

    /**
     * Get negotiation
     *
     * @return string 
     */
    public function getNegotiation()
    {
        return $this->negotiation;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Transaction
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
     * Set product
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $product
     * @return Transaction
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
     * Set buyer
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $buyer
     * @return Transaction
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
     * Set seller
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $seller
     * @return Transaction
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
