<?php

namespace WebPlatform\AseagleBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    protected $avatar = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_seller", type="boolean", nullable=true)
     */
    protected $is_seller = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="membership_type", type="integer", nullable=true)
     */
    protected $membership_type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="seller_info_1", type="string", nullable=true)
     */
    protected $seller_info_1 = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=true)
     */
    private $company_id = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_verified_buyer", type="boolean", nullable=true)
     */
    private $is_verified_buyer = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_verified_seller", type="boolean", nullable=true)
     */
    private $is_verified_seller = null;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="owner")
     */
    protected $products;

    /**
     * @ORM\OneToMany(targetEntity="BuyingRequest", mappedBy="buyer")
     */
    protected $buying_requests;

    /**
     * @ORM\OneToMany(targetEntity="UserCategory", mappedBy="seller")
     */
    protected $user_categories;

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="buyer")
     */
    protected $buyer_transactions;

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="seller")
     */
    protected $seller_transactions;

    /**
     * @ORM\OneToMany(targetEntity="Follow", mappedBy="followed_trader")
     */
    protected $follower_follows;

    /**
     * @ORM\OneToMany(targetEntity="Follow", mappedBy="follower")
     */
    protected $followed_trader_follows;

    /**
     * @ORM\OneToMany(targetEntity="SentMessage", mappedBy="sender")
     */
    protected $sent_messages;

    /**
     * @ORM\OneToMany(targetEntity="ReceivedMessage", mappedBy="receiver")
     */
    protected $received_messages;

    /**
     * @ORM\OneToMany(targetEntity="ReceivedMessage", mappedBy="author")
     */
    protected $author_messages;

    /**
     * @ORM\OneToMany(targetEntity="ContactList", mappedBy="user")
     */
    protected $contact_list;

    /**
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="seller")
     */
    protected $quotations;

    /**
     * @ORM\ManyToOne(targetEntity="CompanyProfile", inversedBy="staffs")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected $company;

    public function __construct()
    {
        parent::__construct();
        $this->products = new ArrayCollection();
        $this->buying_requests = new ArrayCollection();
        $this->user_categories = new ArrayCollection();
        $this->buyer_transactions = new ArrayCollection();
        $this->seller_transactions = new ArrayCollection();
        $this->follower_follows = new ArrayCollection();
        $this->followed_trader_follows = new ArrayCollection();
        $this->sent_messages = new ArrayCollection();
        $this->received_messages = new ArrayCollection();
        $this->author_messages = new ArrayCollection();
        $this->contact_list = new ArrayCollection();
        $this->quotations = new ArrayCollection();
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
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set is_seller
     *
     * @param boolean $isSeller
     * @return User
     */
    public function setIsSeller($isSeller)
    {
        $this->is_seller = $isSeller;

        return $this;
    }

    /**
     * Get is_seller
     *
     * @return boolean 
     */
    public function getIsSeller()
    {
        return $this->is_seller;
    }

    /**
     * Set membership_type
     *
     * @param integer $membershipType
     * @return User
     */
    public function setMembershipType($membershipType)
    {
        $this->membership_type = $membershipType;

        return $this;
    }

    /**
     * Get membership_type
     *
     * @return integer 
     */
    public function getMembershipType()
    {
        return $this->membership_type;
    }

    /**
     * Set seller_info_1
     *
     * @param string $sellerInfo1
     * @return User
     */
    public function setSellerInfo1($sellerInfo1)
    {
        $this->seller_info_1 = $sellerInfo1;

        return $this;
    }

    /**
     * Get seller_info_1
     *
     * @return string 
     */
    public function getSellerInfo1()
    {
        return $this->seller_info_1;
    }



    /**
     * Add products
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $products
     * @return User
     */
    public function addProduct(\WebPlatform\AseagleBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \WebPlatform\AseagleBundle\Entity\Product $products
     */
    public function removeProduct(\WebPlatform\AseagleBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    

    /**
     * Add user_categories
     *
     * @param \WebPlatform\AseagleBundle\Entity\UserCategory $userCategories
     * @return User
     */
    public function addUserCategory(\WebPlatform\AseagleBundle\Entity\UserCategory $userCategories)
    {
        $this->user_categories[] = $userCategories;

        return $this;
    }

    /**
     * Remove user_categories
     *
     * @param \WebPlatform\AseagleBundle\Entity\UserCategory $userCategories
     */
    public function removeUserCategory(\WebPlatform\AseagleBundle\Entity\UserCategory $userCategories)
    {
        $this->user_categories->removeElement($userCategories);
    }

    /**
     * Get user_categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserCategories()
    {
        return $this->user_categories;
    }

    /**
     * Add buyer_transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $buyerTransactions
     * @return User
     */
    public function addBuyerTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $buyerTransactions)
    {
        $this->buyer_transactions[] = $buyerTransactions;

        return $this;
    }

    /**
     * Remove buyer_transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $buyerTransactions
     */
    public function removeBuyerTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $buyerTransactions)
    {
        $this->buyer_transactions->removeElement($buyerTransactions);
    }

    /**
     * Get buyer_transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBuyerTransactions()
    {
        return $this->buyer_transactions;
    }

    /**
     * Add seller_transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $sellerTransactions
     * @return User
     */
    public function addSellerTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $sellerTransactions)
    {
        $this->seller_transactions[] = $sellerTransactions;

        return $this;
    }

    /**
     * Remove seller_transactions
     *
     * @param \WebPlatform\AseagleBundle\Entity\Transaction $sellerTransactions
     */
    public function removeSellerTransaction(\WebPlatform\AseagleBundle\Entity\Transaction $sellerTransactions)
    {
        $this->seller_transactions->removeElement($sellerTransactions);
    }

    /**
     * Get seller_transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSellerTransactions()
    {
        return $this->seller_transactions;
    }

    /**
     * Add follower_follows
     *
     * @param \WebPlatform\AseagleBundle\Entity\Follow $followerFollows
     * @return User
     */
    public function addFollowerFollow(\WebPlatform\AseagleBundle\Entity\Follow $followerFollows)
    {
        $this->follower_follows[] = $followerFollows;

        return $this;
    }

    /**
     * Remove follower_follows
     *
     * @param \WebPlatform\AseagleBundle\Entity\Follow $followerFollows
     */
    public function removeFollowerFollow(\WebPlatform\AseagleBundle\Entity\Follow $followerFollows)
    {
        $this->follower_follows->removeElement($followerFollows);
    }

    /**
     * Get follower_follows
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFollowerFollows()
    {
        return $this->follower_follows;
    }

    /**
     * Add followed_trader_follows
     *
     * @param \WebPlatform\AseagleBundle\Entity\Follow $followedTraderFollows
     * @return User
     */
    public function addFollowedTraderFollow(\WebPlatform\AseagleBundle\Entity\Follow $followedTraderFollows)
    {
        $this->followed_trader_follows[] = $followedTraderFollows;

        return $this;
    }

    /**
     * Remove followed_trader_follows
     *
     * @param \WebPlatform\AseagleBundle\Entity\Follow $followedTraderFollows
     */
    public function removeFollowedTraderFollow(\WebPlatform\AseagleBundle\Entity\Follow $followedTraderFollows)
    {
        $this->followed_trader_follows->removeElement($followedTraderFollows);
    }

    /**
     * Get followed_trader_follows
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFollowedTraderFollows()
    {
        return $this->followed_trader_follows;
    }



    /**
     * Add sent_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\SentMessage $sentMessages
     * @return User
     */
    public function addSentMessage(\WebPlatform\AseagleBundle\Entity\SentMessage $sentMessages)
    {
        $this->sent_messages[] = $sentMessages;

        return $this;
    }

    /**
     * Remove sent_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\SentMessage $sentMessages
     */
    public function removeSentMessage(\WebPlatform\AseagleBundle\Entity\SentMessage $sentMessages)
    {
        $this->sent_messages->removeElement($sentMessages);
    }

    /**
     * Get sent_messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSentMessages()
    {
        return $this->sent_messages;
    }

    /**
     * Add received_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\ReceivedMessage $receivedMessages
     * @return User
     */
    public function addReceivedMessage(\WebPlatform\AseagleBundle\Entity\ReceivedMessage $receivedMessages)
    {
        $this->received_messages[] = $receivedMessages;

        return $this;
    }

    /**
     * Remove received_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\ReceivedMessage $receivedMessages
     */
    public function removeReceivedMessage(\WebPlatform\AseagleBundle\Entity\ReceivedMessage $receivedMessages)
    {
        $this->received_messages->removeElement($receivedMessages);
    }

    /**
     * Get received_messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReceivedMessages()
    {
        return $this->received_messages;
    }

    /**
     * Add author_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\ReceivedMessage $authorMessages
     * @return User
     */
    public function addAuthorMessage(\WebPlatform\AseagleBundle\Entity\ReceivedMessage $authorMessages)
    {
        $this->author_messages[] = $authorMessages;

        return $this;
    }

    /**
     * Remove author_messages
     *
     * @param \WebPlatform\AseagleBundle\Entity\ReceivedMessage $authorMessages
     */
    public function removeAuthorMessage(\WebPlatform\AseagleBundle\Entity\ReceivedMessage $authorMessages)
    {
        $this->author_messages->removeElement($authorMessages);
    }

    /**
     * Get author_messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthorMessages()
    {
        return $this->author_messages;
    }

    /**
     * Set company_id
     *
     * @param integer $companyId
     * @return User
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
     * @return User
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
     * Set is_verified_buyer
     *
     * @param boolean $isVerifiedBuyer
     * @return User
     */
    public function setIsVerifiedBuyer($isVerifiedBuyer)
    {
        $this->is_verified_buyer = $isVerifiedBuyer;

        return $this;
    }

    /**
     * Get is_verified_buyer
     *
     * @return boolean 
     */
    public function getIsVerifiedBuyer()
    {
        return $this->is_verified_buyer;
    }

    /**
     * Set is_verified_seller
     *
     * @param boolean $isVerifiedSeller
     * @return User
     */
    public function setIsVerifiedSeller($isVerifiedSeller)
    {
        $this->is_verified_seller = $isVerifiedSeller;

        return $this;
    }

    /**
     * Get is_verified_seller
     *
     * @return boolean 
     */
    public function getIsVerifiedSeller()
    {
        return $this->is_verified_seller;
    }

    /**
     * Add contact_list
     *
     * @param \WebPlatform\AseagleBundle\Entity\ContactList $contactList
     * @return User
     */
    public function addContactList(\WebPlatform\AseagleBundle\Entity\ContactList $contactList)
    {
        $this->contact_list[] = $contactList;

        return $this;
    }

    /**
     * Remove contact_list
     *
     * @param \WebPlatform\AseagleBundle\Entity\ContactList $contactList
     */
    public function removeContactList(\WebPlatform\AseagleBundle\Entity\ContactList $contactList)
    {
        $this->contact_list->removeElement($contactList);
    }

    /**
     * Get contact_list
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactList()
    {
        return $this->contact_list;
    }

    /**
     * Add buying_requests
     *
     * @param \WebPlatform\AseagleBundle\Entity\BuyingRequest $buyingRequests
     * @return User
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
     * @return User
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
