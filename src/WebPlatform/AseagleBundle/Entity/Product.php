<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="title", type="string", length=500)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="brief_description", type="string", length=1000, nullable=true)
     */
    private $brief_description = null;

    /**
     * @var string
     *
     * @ORM\Column(name="specification", type="text", nullable=true)
     */
    private $specification = null;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=500, nullable=true)
     */
    private $picture = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $category_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="integer")
     */
    private $owner_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_order", type="integer", nullable=true)
     */
    private $min_order = null;

    /**
     * @var string
     *
     * @ORM\Column(name="min_order_unit_type", type="string", nullable=true)
     */
    private $min_order_unit_type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="price_currency", type="string", nullable=true)
     */
    private $price_currency = null;

    /**
     * @var float
     *
     * @ORM\Column(name="price_origin", type="float", nullable=true)
     */
    private $price_origin = null;

    /**
     * @var float
     *
     * @ORM\Column(name="price_origin_min_usd", type="float", nullable=true)
     */
    private $price_origin_min_usd = null;

    /**
     * @var float
     *
     * @ORM\Column(name="price_origin_max_usd", type="float", nullable=true)
     */
    private $price_origin_max_usd = null;

    /**
     * @var string
     *
     * @ORM\Column(name="price_unit_type", type="string", nullable=true)
     */
    private $price_unit_type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="port", type="string", nullable=true)
     */
    private $port = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="place_of_origin", type="integer", nullable=true)
     */
    private $place_of_origin = null;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="supply_ability", type="integer", nullable=true)
     */
    private $supply_ability = null;

    /**
     * @var string
     *
     * @ORM\Column(name="supply_ability_unit", type="string", nullable=true)
     */
    private $supply_ability_unit = null;

    /**
     * @var string
     *
     * @ORM\Column(name="supply_ability_per_time", type="string", nullable=true)
     */
    private $supply_ability_per_time = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_terms", type="string", nullable=true)
     */
    private $payment_terms = null;

    /**
     * @var string
     *
     * @ORM\Column(name="deliver_time", type="string", nullable=true)
     */
    private $deliver_time = null;

    /**
     * @var string
     *
     * @ORM\Column(name="packaging", type="string", nullable=true)
     */
    private $packaging = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pub_date", type="datetime", nullable=true)
     */
    private $pub_date = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $create_date = null;

     /**
     * @var string
     *
     * @ORM\Column(name="product_detail_1", type="string", nullable=true)
     */
    private $product_detail_1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_2", type="string", nullable=true)
     */
    private $product_detail_2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_3", type="string", nullable=true)
     */
    private $product_detail_3 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_4", type="string", nullable=true)
     */
    private $product_detail_4 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_5", type="string", nullable=true)
     */
    private $product_detail_5 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_6", type="string", nullable=true)
     */
    private $product_detail_6 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_7", type="string", nullable=true)
     */
    private $product_detail_7 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_8", type="string", nullable=true)
     */
    private $product_detail_8 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_9", type="string", nullable=true)
     */
    private $product_detail_9 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_10", type="string", nullable=true)
     */
    private $product_detail_10 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_11", type="string", nullable=true)
     */
    private $product_detail_11 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_12", type="string", nullable=true)
     */
    private $product_detail_12 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_13", type="string", nullable=true)
     */
    private $product_detail_13 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_14", type="string", nullable=true)
     */
    private $product_detail_14 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_15", type="string", nullable=true)
     */
    private $product_detail_15 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_16", type="string", nullable=true)
     */
    private $product_detail_16 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_17", type="string", nullable=true)
     */
    private $product_detail_17 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_18", type="string", nullable=true)
     */
    private $product_detail_18 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_19", type="string", nullable=true)
     */
    private $product_detail_19 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_20", type="string", nullable=true)
     */
    private $product_detail_20 = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_21", type="integer", nullable=true)
     */
    private $product_detail_21;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_22", type="integer", nullable=true)
     */
    private $product_detail_22;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_23", type="integer", nullable=true)
     */
    private $product_detail_23;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_24", type="integer", nullable=true)
     */
    private $product_detail_24;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_25", type="integer", nullable=true)
     */
    private $product_detail_25;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_26", type="integer", nullable=true)
     */
    private $product_detail_26;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_27", type="integer", nullable=true)
     */
    private $product_detail_27;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_28", type="integer", nullable=true)
     */
    private $product_detail_28;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_29", type="integer", nullable=true)
     */
    private $product_detail_29;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_detail_30", type="integer", nullable=true)
     */
    private $product_detail_30;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_31", type="float", nullable=true)
     */
    private $product_detail_31;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_32", type="float", nullable=true)
     */
    private $product_detail_32;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_33", type="float", nullable=true)
     */
    private $product_detail_33;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_34", type="float", nullable=true)
     */
    private $product_detail_34;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_35", type="float", nullable=true)
     */
    private $product_detail_35;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_36", type="float", nullable=true)
     */
    private $product_detail_36;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_37", type="float", nullable=true)
     */
    private $product_detail_37;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_38", type="float", nullable=true)
     */
    private $product_detail_38;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_39", type="float", nullable=true)
     */
    private $product_detail_39;

    /**
     * @var float
     *
     * @ORM\Column(name="product_detail_40", type="float", nullable=true)
     */
    private $product_detail_40;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail_41", type="text", nullable=true)
     */
    private $product_detail_41 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment = null;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    protected $owner;

    /**
     * @ORM\OneToMany(targetEntity="ProductTag", mappedBy="product")
     */
    protected $product_tags;

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="product")
     */
    protected $transactions;

    /**
     * @ORM\OneToMany(targetEntity="BuyingRequest", mappedBy="product")
     */
    protected $buying_requests;

    /**
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="product")
     */
    protected $quotations;

    public function __construct()
    {
        //$this->$product_tags = new ArrayCollection();
        $this->transactions = new ArrayCollection();
        $this->buying_requests = new ArrayCollection();
        $this->quotations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
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
     * Set title
     *
     * @param string $title
     * @return Product
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
     * Set brief_description
     *
     * @param string $briefDescription
     * @return Product
     */
    public function setBriefDescription($briefDescription)
    {
        $this->brief_description = $briefDescription;

        return $this;
    }

    /**
     * Get brief_description
     *
     * @return string
     */
    public function getBriefDescription()
    {
        return $this->brief_description;
    }

    /**
     * Set specification
     *
     * @param string $specification
     * @return Product
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * Get specification
     *
     * @return string
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Product
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
     * Set category_id
     *
     * @param integer $categoryId
     * @return Product
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
     * Set owner_id
     *
     * @param integer $ownerId
     * @return Product
     */
    public function setOwnerId($ownerId)
    {
        $this->owner_id = $ownerId;

        return $this;
    }

    /**
     * Get owner_id
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * Set min_order
     *
     * @param integer $minOrder
     * @return Product
     */
    public function setMinOrder($minOrder)
    {
        $this->min_order = $minOrder;

        return $this;
    }

    /**
     * Get min_order
     *
     * @return integer
     */
    public function getMinOrder()
    {
        return $this->min_order;
    }

    /**
     * Set min_order_unit_type
     *
     * @param string $minOrderUnitType
     * @return Product
     */
    public function setMinOrderUnitType($minOrderUnitType)
    {
        $this->min_order_unit_type = $minOrderUnitType;

        return $this;
    }

    /**
     * Get min_order_unit_type
     *
     * @return string
     */
    public function getMinOrderUnitType()
    {
        return $this->min_order_unit_type;
    }

    /**
     * Set price_currency
     *
     * @param string $priceCurrency
     * @return Product
     */
    public function setPriceCurrency($priceCurrency)
    {
        $this->price_currency = $priceCurrency;

        return $this;
    }

    /**
     * Get price_currency
     *
     * @return string
     */
    public function getPriceCurrency()
    {
        return $this->price_currency;
    }

    /**
     * Set price_origin
     *
     * @param float $priceOrigin
     * @return Product
     */
    public function setPriceOrigin($priceOrigin)
    {
        $this->price_origin = $priceOrigin;

        return $this;
    }

    /**
     * Get price_origin
     *
     * @return float
     */
    public function getPriceOrigin()
    {
        return $this->price_origin;
    }

    /**
     * Set price_origin_min_usd
     *
     * @param float $priceOriginMinUsd
     * @return Product
     */
    public function setPriceOriginMinUsd($priceOriginMinUsd)
    {
        $this->price_origin_min_usd = $priceOriginMinUsd;

        return $this;
    }

    /**
     * Get price_origin_min_usd
     *
     * @return float
     */
    public function getPriceOriginMinUsd()
    {
        return $this->price_origin_min_usd;
    }

    /**
     * Set price_origin_max_usd
     *
     * @param float $priceOriginMaxUsd
     * @return Product
     */
    public function setPriceOriginMaxUsd($priceOriginMaxUsd)
    {
        $this->price_origin_max_usd = $priceOriginMaxUsd;

        return $this;
    }

    /**
     * Get price_origin_max_usd
     *
     * @return float
     */
    public function getPriceOriginMaxUsd()
    {
        return $this->price_origin_max_usd;
    }

    /**
     * Set price_unit_type
     *
     * @param string $priceUnitType
     * @return Product
     */
    public function setPriceUnitType($priceUnitType)
    {
        $this->price_unit_type = $priceUnitType;

        return $this;
    }

    /**
     * Get price_unit_type
     *
     * @return string
     */
    public function getPriceUnitType()
    {
        return $this->price_unit_type;
    }

    /**
     * Set port
     *
     * @param string $port
     * @return Product
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }
    
    /**
     * Set place_of_origin
     *
     * @param integer $place_of_origin
     * @return Product
     */
    public function setPlaceOfOrigin($place_of_origin)
    {
    	$this->place_of_origin = $place_of_origin;
    
    	return $this;
    }
    
    /**
     * Get place_of_origin
     *
     * @return integer
     */
    public function getPlaceOfOrigin()
    {
    	return $this->place_of_origin;
    }
    
    /**
     * Set supply_ability
     *
     * @param integer $supplyAbility
     * @return Product
     */
    public function setSupplyAbility($supplyAbility)
    {
        $this->supply_ability = $supplyAbility;

        return $this;
    }

    /**
     * Get supply_ability
     *
     * @return integer
     */
    public function getSupplyAbility()
    {
        return $this->supply_ability;
    }

    /**
     * Set supply_ability_unit
     *
     * @param string $supplyAbilityUnit
     * @return Product
     */
    public function setSupplyAbilityUnit($supplyAbilityUnit)
    {
        $this->supply_ability_unit = $supplyAbilityUnit;

        return $this;
    }

    /**
     * Get supply_ability_unit
     *
     * @return string
     */
    public function getSupplyAbilityUnit()
    {
        return $this->supply_ability_unit;
    }

    /**
     * Set supply_ability_per_time
     *
     * @param string $supplyAbilityPerTime
     * @return Product
     */
    public function setSupplyAbilityPerTime($supplyAbilityPerTime)
    {
        $this->supply_ability_per_time = $supplyAbilityPerTime;

        return $this;
    }

    /**
     * Get supply_ability_per_time
     *
     * @return string
     */
    public function getSupplyAbilityPerTime()
    {
        return $this->supply_ability_per_time;
    }

    /**
     * Set payment_terms
     *
     * @param string $paymentTerms
     * @return Product
     */
    public function setPaymentTerms($paymentTerms)
    {
        $this->payment_terms = $paymentTerms;

        return $this;
    }

    /**
     * Get payment_terms
     *
     * @return string
     */
    public function getPaymentTerms()
    {
        return $this->payment_terms;
    }

    /**
     * Set deliver_time
     *
     * @param string $deliverTime
     * @return Product
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
     * Set packaging
     *
     * @param string $packaging
     * @return Product
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * Get packaging
     *
     * @return string
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Product
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set product_detail_1
     *
     * @param string $productDetail1
     * @return Product
     */
    public function setProductDetail1($productDetail1)
    {
        $this->product_detail_1 = $productDetail1;

        return $this;
    }

    /**
     * Get product_detail_1
     *
     * @return string
     */
    public function getProductDetail1()
    {
        return $this->product_detail_1;
    }

    /**
     * Set product_detail_2
     *
     * @param string $productDetail2
     * @return Product
     */
    public function setProductDetail2($productDetail2)
    {
        $this->product_detail_2 = $productDetail2;

        return $this;
    }

    /**
     * Get product_detail_2
     *
     * @return string
     */
    public function getProductDetail2()
    {
        return $this->product_detail_2;
    }

    /**
     * Set product_detail_3
     *
     * @param string $productDetail3
     * @return Product
     */
    public function setProductDetail3($productDetail3)
    {
        $this->product_detail_3 = $productDetail3;

        return $this;
    }

    /**
     * Get product_detail_3
     *
     * @return string
     */
    public function getProductDetail3()
    {
        return $this->product_detail_3;
    }

    /**
     * Set product_detail_4
     *
     * @param string $productDetail4
     * @return Product
     */
    public function setProductDetail4($productDetail4)
    {
        $this->product_detail_4 = $productDetail4;

        return $this;
    }

    /**
     * Get product_detail_4
     *
     * @return string
     */
    public function getProductDetail4()
    {
        return $this->product_detail_4;
    }

    /**
     * Set product_detail_5
     *
     * @param string $productDetail5
     * @return Product
     */
    public function setProductDetail5($productDetail5)
    {
        $this->product_detail_5 = $productDetail5;

        return $this;
    }

    /**
     * Get product_detail_5
     *
     * @return string
     */
    public function getProductDetail5()
    {
        return $this->product_detail_5;
    }

    /**
     * Set product_detail_6
     *
     * @param string $productDetail6
     * @return Product
     */
    public function setProductDetail6($productDetail6)
    {
        $this->product_detail_6 = $productDetail6;

        return $this;
    }

    /**
     * Get product_detail_6
     *
     * @return string
     */
    public function getProductDetail6()
    {
        return $this->product_detail_6;
    }

    /**
     * Set product_detail_7
     *
     * @param string $productDetail7
     * @return Product
     */
    public function setProductDetail7($productDetail7)
    {
        $this->product_detail_7 = $productDetail7;

        return $this;
    }

    /**
     * Get product_detail_7
     *
     * @return string
     */
    public function getProductDetail7()
    {
        return $this->product_detail_7;
    }

    /**
     * Set product_detail_8
     *
     * @param string $productDetail8
     * @return Product
     */
    public function setProductDetail8($productDetail8)
    {
        $this->product_detail_8 = $productDetail8;

        return $this;
    }

    /**
     * Get product_detail_8
     *
     * @return string
     */
    public function getProductDetail8()
    {
        return $this->product_detail_8;
    }

    /**
     * Set product_detail_9
     *
     * @param string $productDetail9
     * @return Product
     */
    public function setProductDetail9($productDetail9)
    {
        $this->product_detail_9 = $productDetail9;

        return $this;
    }

    /**
     * Get product_detail_9
     *
     * @return string
     */
    public function getProductDetail9()
    {
        return $this->product_detail_9;
    }

    /**
     * Set product_detail_10
     *
     * @param string $productDetail10
     * @return Product
     */
    public function setProductDetail10($productDetail10)
    {
        $this->product_detail_10 = $productDetail10;

        return $this;
    }

    /**
     * Get product_detail_10
     *
     * @return string
     */
    public function getProductDetail10()
    {
        return $this->product_detail_10;
    }

    /**
     * Set product_detail_11
     *
     * @param string $productDetail11
     * @return Product
     */
    public function setProductDetail11($productDetail11)
    {
        $this->product_detail_11 = $productDetail11;

        return $this;
    }

    /**
     * Get product_detail_11
     *
     * @return string
     */
    public function getProductDetail11()
    {
        return $this->product_detail_11;
    }

    /**
     * Set product_detail_12
     *
     * @param string $productDetail12
     * @return Product
     */
    public function setProductDetail12($productDetail12)
    {
        $this->product_detail_12 = $productDetail12;

        return $this;
    }

    /**
     * Get product_detail_12
     *
     * @return string
     */
    public function getProductDetail12()
    {
        return $this->product_detail_12;
    }

    /**
     * Set product_detail_13
     *
     * @param string $productDetail13
     * @return Product
     */
    public function setProductDetail13($productDetail13)
    {
        $this->product_detail_13 = $productDetail13;

        return $this;
    }

    /**
     * Get product_detail_13
     *
     * @return string
     */
    public function getProductDetail13()
    {
        return $this->product_detail_13;
    }

    /**
     * Set product_detail_14
     *
     * @param string $productDetail14
     * @return Product
     */
    public function setProductDetail14($productDetail14)
    {
        $this->product_detail_14 = $productDetail14;

        return $this;
    }

    /**
     * Get product_detail_14
     *
     * @return string
     */
    public function getProductDetail14()
    {
        return $this->product_detail_14;
    }

    /**
     * Set product_detail_15
     *
     * @param string $productDetail15
     * @return Product
     */
    public function setProductDetail15($productDetail15)
    {
        $this->product_detail_15 = $productDetail15;

        return $this;
    }

    /**
     * Get product_detail_15
     *
     * @return string
     */
    public function getProductDetail15()
    {
        return $this->product_detail_15;
    }

    /**
     * Set product_detail_16
     *
     * @param string $productDetail16
     * @return Product
     */
    public function setProductDetail16($productDetail16)
    {
        $this->product_detail_16 = $productDetail16;

        return $this;
    }

    /**
     * Get product_detail_16
     *
     * @return string
     */
    public function getProductDetail16()
    {
        return $this->product_detail_16;
    }

    /**
     * Set product_detail_17
     *
     * @param string $productDetail17
     * @return Product
     */
    public function setProductDetail17($productDetail17)
    {
        $this->product_detail_17 = $productDetail17;

        return $this;
    }

    /**
     * Get product_detail_17
     *
     * @return string
     */
    public function getProductDetail17()
    {
        return $this->product_detail_17;
    }

    /**
     * Set product_detail_18
     *
     * @param string $productDetail18
     * @return Product
     */
    public function setProductDetail18($productDetail18)
    {
        $this->product_detail_18 = $productDetail18;

        return $this;
    }

    /**
     * Get product_detail_18
     *
     * @return string
     */
    public function getProductDetail18()
    {
        return $this->product_detail_18;
    }

    /**
     * Set product_detail_19
     *
     * @param string $productDetail19
     * @return Product
     */
    public function setProductDetail19($productDetail19)
    {
        $this->product_detail_19 = $productDetail19;

        return $this;
    }

    /**
     * Get product_detail_19
     *
     * @return string
     */
    public function getProductDetail19()
    {
        return $this->product_detail_19;
    }

    /**
     * Set product_detail_20
     *
     * @param string $productDetail20
     * @return Product
     */
    public function setProductDetail20($productDetail20)
    {
        $this->product_detail_20 = $productDetail20;

        return $this;
    }

    /**
     * Get product_detail_20
     *
     * @return string
     */
    public function getProductDetail20()
    {
        return $this->product_detail_20;
    }

    /**
     * Set product_detail_21
     *
     * @param integer $productDetail21
     * @return Product
     */
    public function setProductDetail21($productDetail21)
    {
        $this->product_detail_21 = $productDetail21;

        return $this;
    }

    /**
     * Get product_detail_21
     *
     * @return integer
     */
    public function getProductDetail21()
    {
        return $this->product_detail_21;
    }

    /**
     * Set product_detail_22
     *
     * @param integer $productDetail22
     * @return Product
     */
    public function setProductDetail22($productDetail22)
    {
        $this->product_detail_22 = $productDetail22;

        return $this;
    }

    /**
     * Get product_detail_22
     *
     * @return integer
     */
    public function getProductDetail22()
    {
        return $this->product_detail_22;
    }

    /**
     * Set product_detail_23
     *
     * @param integer $productDetail23
     * @return Product
     */
    public function setProductDetail23($productDetail23)
    {
        $this->product_detail_23 = $productDetail23;

        return $this;
    }

    /**
     * Get product_detail_23
     *
     * @return integer
     */
    public function getProductDetail23()
    {
        return $this->product_detail_23;
    }

    /**
     * Set product_detail_24
     *
     * @param integer $productDetail24
     * @return Product
     */
    public function setProductDetail24($productDetail24)
    {
        $this->product_detail_24 = $productDetail24;

        return $this;
    }

    /**
     * Get product_detail_24
     *
     * @return integer
     */
    public function getProductDetail24()
    {
        return $this->product_detail_24;
    }

    /**
     * Set product_detail_25
     *
     * @param integer $productDetail25
     * @return Product
     */
    public function setProductDetail25($productDetail25)
    {
        $this->product_detail_25 = $productDetail25;

        return $this;
    }

    /**
     * Get product_detail_25
     *
     * @return integer
     */
    public function getProductDetail25()
    {
        return $this->product_detail_25;
    }

    /**
     * Set product_detail_26
     *
     * @param integer $productDetail26
     * @return Product
     */
    public function setProductDetail26($productDetail26)
    {
        $this->product_detail_26 = $productDetail26;

        return $this;
    }

    /**
     * Get product_detail_26
     *
     * @return integer
     */
    public function getProductDetail26()
    {
        return $this->product_detail_26;
    }

    /**
     * Set product_detail_27
     *
     * @param integer $productDetail27
     * @return Product
     */
    public function setProductDetail27($productDetail27)
    {
        $this->product_detail_27 = $productDetail27;

        return $this;
    }

    /**
     * Get product_detail_27
     *
     * @return integer
     */
    public function getProductDetail27()
    {
        return $this->product_detail_27;
    }

    /**
     * Set product_detail_28
     *
     * @param integer $productDetail28
     * @return Product
     */
    public function setProductDetail28($productDetail28)
    {
        $this->product_detail_28 = $productDetail28;

        return $this;
    }

    /**
     * Get product_detail_28
     *
     * @return integer
     */
    public function getProductDetail28()
    {
        return $this->product_detail_28;
    }

    /**
     * Set product_detail_29
     *
     * @param integer $productDetail29
     * @return Product
     */
    public function setProductDetail29($productDetail29)
    {
        $this->product_detail_29 = $productDetail29;

        return $this;
    }

    /**
     * Get product_detail_29
     *
     * @return integer
     */
    public function getProductDetail29()
    {
        return $this->product_detail_29;
    }

    /**
     * Set product_detail_30
     *
     * @param integer $productDetail30
     * @return Product
     */
    public function setProductDetail30($productDetail30)
    {
        $this->product_detail_30 = $productDetail30;

        return $this;
    }

    /**
     * Get product_detail_30
     *
     * @return integer
     */
    public function getProductDetail30()
    {
        return $this->product_detail_30;
    }

    /**
     * Set product_detail_31
     *
     * @param float $productDetail31
     * @return Product
     */
    public function setProductDetail31($productDetail31)
    {
        $this->product_detail_31 = $productDetail31;

        return $this;
    }

    /**
     * Get product_detail_31
     *
     * @return float
     */
    public function getProductDetail31()
    {
        return $this->product_detail_31;
    }

    /**
     * Set product_detail_32
     *
     * @param float $productDetail32
     * @return Product
     */
    public function setProductDetail32($productDetail32)
    {
        $this->product_detail_32 = $productDetail32;

        return $this;
    }

    /**
     * Get product_detail_32
     *
     * @return float
     */
    public function getProductDetail32()
    {
        return $this->product_detail_32;
    }

    /**
     * Set product_detail_33
     *
     * @param float $productDetail33
     * @return Product
     */
    public function setProductDetail33($productDetail33)
    {
        $this->product_detail_33 = $productDetail33;

        return $this;
    }

    /**
     * Get product_detail_33
     *
     * @return float
     */
    public function getProductDetail33()
    {
        return $this->product_detail_33;
    }

    /**
     * Set product_detail_34
     *
     * @param float $productDetail34
     * @return Product
     */
    public function setProductDetail34($productDetail34)
    {
        $this->product_detail_34 = $productDetail34;

        return $this;
    }

    /**
     * Get product_detail_34
     *
     * @return float
     */
    public function getProductDetail34()
    {
        return $this->product_detail_34;
    }

    /**
     * Set product_detail_35
     *
     * @param float $productDetail35
     * @return Product
     */
    public function setProductDetail35($productDetail35)
    {
        $this->product_detail_35 = $productDetail35;

        return $this;
    }

    /**
     * Get product_detail_35
     *
     * @return float
     */
    public function getProductDetail35()
    {
        return $this->product_detail_35;
    }

    /**
     * Set product_detail_36
     *
     * @param float $productDetail36
     * @return Product
     */
    public function setProductDetail36($productDetail36)
    {
        $this->product_detail_36 = $productDetail36;

        return $this;
    }

    /**
     * Get product_detail_36
     *
     * @return float
     */
    public function getProductDetail36()
    {
        return $this->product_detail_36;
    }

    /**
     * Set product_detail_37
     *
     * @param float $productDetail37
     * @return Product
     */
    public function setProductDetail37($productDetail37)
    {
        $this->product_detail_37 = $productDetail37;

        return $this;
    }

    /**
     * Get product_detail_37
     *
     * @return float
     */
    public function getProductDetail37()
    {
        return $this->product_detail_37;
    }

    /**
     * Set product_detail_38
     *
     * @param float $productDetail38
     * @return Product
     */
    public function setProductDetail38($productDetail38)
    {
        $this->product_detail_38 = $productDetail38;

        return $this;
    }

    /**
     * Get product_detail_38
     *
     * @return float
     */
    public function getProductDetail38()
    {
        return $this->product_detail_38;
    }

    /**
     * Set product_detail_39
     *
     * @param float $productDetail39
     * @return Product
     */
    public function setProductDetail39($productDetail39)
    {
        $this->product_detail_39 = $productDetail39;

        return $this;
    }

    /**
     * Get product_detail_39
     *
     * @return float
     */
    public function getProductDetail39()
    {
        return $this->product_detail_39;
    }

    /**
     * Set product_detail_40
     *
     * @param float $productDetail40
     * @return Product
     */
    public function setProductDetail40($productDetail40)
    {
        $this->product_detail_40 = $productDetail40;

        return $this;
    }

    /**
     * Get product_detail_40
     *
     * @return float
     */
    public function getProductDetail40()
    {
        return $this->product_detail_40;
    }

    /**
     * Set product_detail_41
     *
     * @param string $productDetail41
     * @return Product
     */
    public function setProductDetail41($productDetail41)
    {
        $this->product_detail_41 = $productDetail41;

        return $this;
    }

    /**
     * Get product_detail_41
     *
     * @return string
     */
    public function getProductDetail41()
    {
        return $this->product_detail_41;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Product
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set category
     *
     * @param \WebPlatform\AseagleBundle\Entity\Category $category
     * @return Product
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
     * Set owner
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $owner
     * @return Product
     */
    public function setOwner(\WebPlatform\AseagleBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \WebPlatform\AseagleBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add product_tags
     *
     * @param \WebPlatform\AseagleBundle\Entity\ProductTag $productTags
     * @return Product
     */
    public function addProductTag(\WebPlatform\AseagleBundle\Entity\ProductTag $productTags)
    {
        $this->product_tags[] = $productTags;

        return $this;
    }

    /**
     * Remove product_tags
     *
     * @param \WebPlatform\AseagleBundle\Entity\ProductTag $productTags
     */
    public function removeProductTag(\WebPlatform\AseagleBundle\Entity\ProductTag $productTags)
    {
        $this->product_tags->removeElement($productTags);
    }

    /**
     * Get product_tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductTags()
    {
        return $this->product_tags;
    }

    /**
     * Add transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $transactions
     * @return Product
     */
    public function addTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $transactions
     */
    public function removeTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactions()
    {
        return $this->transactions;
    }


    /**
     * Set state
     *
     * @param integer $state
     * @return Product
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set pub_date
     *
     * @param \DateTime $pubDate
     * @return Product
     */
    public function setPubDate($pubDate)
    {
        $this->pub_date = $pubDate;

        return $this;
    }

    /**
     * Get pub_date
     *
     * @return \DateTime 
     */
    public function getPubDate()
    {
        return $this->pub_date;
    }

    /**
     * Set create_date
     *
     * @param \DateTime $createDate
     * @return Product
     */
    public function setCreateDate($createDate)
    {
        $this->create_date = $createDate;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Add buying_requests
     *
     * @param \WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequests
     * @return Product
     */
    public function addBuyingRequest(\WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequests)
    {
        $this->buying_requests[] = $buyingRequests;

        return $this;
    }

    /**
     * Remove buying_requests
     *
     * @param \WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequests
     */
    public function removeBuyingRequest(\WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequests)
    {
        $this->buying_requests->removeElement($buyingRequests);
    }

    /**
     * Get buying_requests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBuyingRequests()
    {
        return $this->buying_requests;
    }

    /**
     * Add quotations
     *
     * @param \WebPlatform\AseagleBundle\Entity\Quotation $quotations
     * @return Product
     */
    public function addQuotation(\WebPlatform\AseagleBundle\Entity\Quotation $quotations)
    {
        $this->quotations[] = $quotations;

        return $this;
    }

    /**
     * Remove quotations
     *
     * @param \WebPlatform\AseagleBundle\Entity\Quotation $quotations
     */
    public function removeQuotation(\WebPlatform\AseagleBundle\Entity\Quotation $quotations)
    {
        $this->quotations->removeElement($quotations);
    }

    /**
     * Get quotations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuotations()
    {
        return $this->quotations;
    }
}
