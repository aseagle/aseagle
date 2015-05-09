<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDetailNameMapping
 *
 * @ORM\Table(name="product_detail_name_mapping")
 * @ORM\Entity
 */
class ProductDetailNameMapping
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
     * @ORM\Column(name="cat_id", type="integer")
     */
    private $catId;

    /**
     * @var integer
     *
     * @ORM\Column(name="col_id", type="integer", nullable=true)
     */
    private $colId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required = null;

    /**
     * @var string
     *
     * @ORM\Column(name="restriction", type="text", nullable=true)
     */
    private $restriction = null;


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
     * Set catId
     *
     * @param integer $catId
     * @return ProductDetailNameMapping
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;

        return $this;
    }

    /**
     * Get catId
     *
     * @return integer 
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * Set colId
     *
     * @param integer $colId
     * @return ProductDetailNameMapping
     */
    public function setColId($colId)
    {
        $this->colId = $colId;

        return $this;
    }

    /**
     * Get colId
     *
     * @return integer 
     */
    public function getColId()
    {
        return $this->colId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProductDetailNameMapping
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
     * Set required
     *
     * @param boolean $required
     * @return ProductDetailNameMapping
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set restriction
     *
     * @param string $restriction
     * @return ProductDetailNameMapping
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;

        return $this;
    }

    /**
     * Get restriction
     *
     * @return string 
     */
    public function getRestriction()
    {
        return $this->restriction;
    }
}
