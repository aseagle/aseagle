<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Follow
 *
 * @ORM\Table(name="follow")
 * @ORM\Entity(repositoryClass="WebPlatform\AseagleBundle\Entity\FollowRepository")
 */
class Follow
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
     * @ORM\Column(name="follower_id", type="integer")
     */
    private $followerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="followed_trader_id", type="integer")
     */
    private $followedTraderId;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="follower_follows")
     * @ORM\JoinColumn(name="followed_trader_id", referencedColumnName="id")
     */
    protected $followed_trader;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="followed_trader_follows")
     * @ORM\JoinColumn(name="follower_id", referencedColumnName="id")
     */
    protected $follower;

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
     * Set followerId
     *
     * @param integer $followerId
     * @return Follow
     */
    public function setFollowerId($followerId)
    {
        $this->followerId = $followerId;

        return $this;
    }

    /**
     * Get followerId
     *
     * @return integer 
     */
    public function getFollowerId()
    {
        return $this->followerId;
    }

    /**
     * Set followedTraderId
     *
     * @param integer $followedTraderId
     * @return Follow
     */
    public function setFollowedTraderId($followedTraderId)
    {
        $this->followedTraderId = $followedTraderId;

        return $this;
    }

    /**
     * Get followedTraderId
     *
     * @return integer 
     */
    public function getFollowedTraderId()
    {
        return $this->followedTraderId;
    }

    /**
     * Set followed_trader
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $followedTrader
     * @return Follow
     */
    public function setFollowedTrader(\WebPlatform\AseagleBundle\Entity\User $followedTrader = null)
    {
        $this->followed_trader = $followedTrader;

        return $this;
    }

    /**
     * Get followed_trader
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getFollowedTrader()
    {
        return $this->followed_trader;
    }

    /**
     * Set follower
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $follower
     * @return Follow
     */
    public function setFollower(\WebPlatform\AseagleBundle\Entity\User $follower = null)
    {
        $this->follower = $follower;

        return $this;
    }

    /**
     * Get follower
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getFollower()
    {
        return $this->follower;
    }
}
