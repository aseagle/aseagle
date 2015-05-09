<?php

namespace WebPlatform\AseagleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sender
 *
 * @ORM\Table(name="sent_message")
 * @ORM\Entity
 */
class SentMessage
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user_id;

    /**
     * @var string
     *
     * @ORM\Column(name="receiver_ids", type="string", length=500)
     */
    private $receiver_ids;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=500)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_draft", type="boolean")
     */
    private $is_draft;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sent_messages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $sender;


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
     * Set user_id
     *
     * @param integer $userId
     * @return SentMessage
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set receiver_ids
     *
     * @param string $receiverIds
     * @return SentMessage
     */
    public function setReceiverIds($receiverIds)
    {
        $this->receiver_ids = $receiverIds;

        return $this;
    }

    /**
     * Get receiver_ids
     *
     * @return string 
     */
    public function getReceiverIds()
    {
        return $this->receiver_ids;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return SentMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return SentMessage
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SentMessage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set sender
     *
     * @param \WebPlatform\AseagleBundle\Entity\User $sender
     * @return SentMessage
     */
    public function setSender(\WebPlatform\AseagleBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \WebPlatform\AseagleBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set is_draft
     *
     * @param boolean $isDraft
     * @return SentMessage
     */
    public function setIsDraft($isDraft)
    {
        $this->is_draft = $isDraft;

        return $this;
    }

    /**
     * Get is_draft
     *
     * @return boolean 
     */
    public function getIsDraft()
    {
        return $this->is_draft;
    }
}
