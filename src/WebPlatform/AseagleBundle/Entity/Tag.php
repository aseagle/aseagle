<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\OneToMany(targetEntity="ProductTag", mappedBy="tag")
     */
    protected $product_tags;

    public function __construct()
    {
        $this->product_tags = new ArrayCollection();

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
     * Set name
     *
     * @param string $name
     * @return Tag
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
     * Add product_tags
     *
     * @param \WebPlatform\AseagleBundle\Entity\ProductTag $productTags
     * @return Tag
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
}
