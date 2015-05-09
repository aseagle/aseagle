<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDetailDefaultValue
 *
 * @ORM\Table(name="product_detail_default_value")
 * @ORM\Entity
 */
class ProductDetailDefaultValue
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
     * @ORM\Column(name="product_detail_id", type="integer")
     */
    private $productDetailId;

    /**
     * @var string
     *
     * @ORM\Column(name="default_value", type="string", length=255, nullable=true)
     */
    private $defaultValue = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer", nullable=true)
     */
    private $count = null;


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
     * Set productDetailId
     *
     * @param integer $productDetailId
     * @return ProductDetailDefaultValue
     */
    public function setProductDetailId($productDetailId)
    {
        $this->productDetailId = $productDetailId;

        return $this;
    }

    /**
     * Get productDetailId
     *
     * @return integer 
     */
    public function getProductDetailId()
    {
        return $this->productDetailId;
    }

    /**
     * Set defaultValue
     *
     * @param string $defaultValue
     * @return ProductDetailDefaultValue
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * Get defaultValue
     *
     * @return string 
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return ProductDetailDefaultValue
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
}
